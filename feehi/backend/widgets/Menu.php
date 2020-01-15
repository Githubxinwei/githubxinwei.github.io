<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2019-05-07 11:21
 */

namespace backend\widgets;

use Yii;
use backend\models\Menu as BackendMenuModel;
use yii\base\InvalidArgumentException;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

class Menu extends \yii\base\Widget
{
    public $firstLevelLiTemplate = '<li><a class="{class}" href="{url}"><i class="fa {icon}"></i><span class="nav-label">{name}</span><span class="fa {arrow}"></span></a>{submenu}</li>';
    public $liTemplate = '<li><a class="J_menuItem" href="{url}" data-index="{data-index}">{name}<span class="fa {arrow}"></span></a>{lis}</li>';
    public $ulTemplate = '<ul class="nav nav-{level}-level {collapse}">{lis}</ul>';

    public function run()
    {
        parent::run(); // TODO: Change the autogenerated stub
        $menus = $this->getMenus();
        $lis = "";
        foreach ($menus as $menu){
            if( intval($menu['parent_id']) !== 0 ) continue;
            $url = $this->getMenuUrl($menu);
            $arrow = '';
            $class = "J_menuItem";
            $submenu = $this->getSubmenu($menu['id'], $menus);
            if ($submenu) {//有子菜单
                $arrow = ' arrow';
                $class = '';
            }
            $lis .= str_replace(["{class}", "{url}", "{icon}", "{name}", "{arrow}", "{submenu}"], [$class, $url, $menu['icon'], Yii::t('menu', $menu['name']), $arrow, $submenu], $this->firstLevelLiTemplate);
        }
        return $lis;
    }

    private function getSubmenu($curId, $menus, $times=2)
    {
        $array = ['2' => 'second', '3' => 'third', '4' => 'fourth', '5' => 'fifth', '6' => 'six'];
        if( isset($arry[$times]) ) throw new InvalidArgumentException("Backend menu support max 6 levels");
        $level = $array[$times];
        $collapse = '';
        if ($times > 2) {
            $collapse = "collapse";
        }
        $times++;
        $lis = "";
        static $i = 1;
        foreach ($menus as $menu) {
            if ($menu['parent_id'] != $curId) {
                continue;
            }
            $subSubmenu = $this->getSubmenu($menu['id'], $menus, $times);
            $arrow = 'arrow';
            $url = '';
            if ($subSubmenu == '') {
                $arrow = '';
                $url = $this->getMenuUrl($menu);
            }
            $i++;
            $lis .= str_replace(['{url}', '{data-index}', '{name}', '{arrow}', "{lis}"], [$url, $i, Yii::t('menu', $menu['name']), $arrow, $subSubmenu], $this->liTemplate);
        }
        $subMenu = "";
        if ($lis !== "") {
            $subMenu = str_replace(["{level}", "{collapse}", "{lis}"], [$level, $collapse, $lis], $this->ulTemplate);
        }
        return $subMenu;
    }

    public function getMenuUrl($menu)
    {
        $url = "";
        if( !$menu['is_absolute_url'] ) {
            if( strlen($menu['url']) > 0 ){
                $firstCharacter = $menu['url'][0];
                if( in_array($firstCharacter, ['[', '{']) ){
                    $temp = @json_decode($menu['url'], true);
                    if( $temp === null ){
                        Yii::error("app", "Menu id ({$menu['id']}) url is incorrect json format");
                    }
                    $url = Url::to($temp);
                }else{
                    $url = Url::to([$menu['url']]);
                }
            }
        }else{
            $url = $menu['url'];
        }
        return $url;
    }

    public function getMenus()
    {
        $menus = BackendMenuModel::find()->where(['is_display' => BackendMenuModel::DISPLAY_YES, 'type' => BackendMenuModel::BACKEND_TYPE])->orderBy("sort asc")->all();
        $permissions = Yii::$app->getAuthManager()->getPermissionsByUser(Yii::$app->getUser()->getId());
        $permissions = array_keys($permissions);

        if (!in_array(Yii::$app->getUser()->getId(), Yii::$app->getBehavior('access')->superAdminUserIds)) {
            $newMenu = [];
            foreach ($menus as $menu) {
                /** @var BackendMenuModel $menu */
                $url = $menu->url;
                $temp = @json_decode($menu->url, true);
                if ($temp !== null) {
                    $url = $temp[0];
                }
                if (strpos($url, '/') !== 0) $url = '/' . $url;
                $url = $url . ':GET';
                if (in_array($url, $permissions)) {
                    $menu = BackendMenuModel::getAncectorsByMenuId($menu->id) + [$menu];
                    $newMenu = array_merge($newMenu, $menu);
                }
            }

            $menus = [];
            foreach ($newMenu as $v) {
                $menus[$v['id']] = $v;
            }
            ArrayHelper::multisort($menus, 'sort', SORT_ASC);
            return $menus;
        }
        return $menus;
    }
}