<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2017-03-15 21:16
 */

namespace install\controllers;

use Yii;
use Exception;
use yii\db\Connection;
use yii\helpers\Url;
use backend\models\User;
use common\models\Options;
use yii\web\Response;
use yii\web\ErrorAction;

/**
 * Site controller
 */
class SiteController extends \yii\web\Controller
{

    public $enableCsrfValidation = false;

    public static $installLockFile = '@install/install.lock';

    public function init()
    {
        parent::init(); // TODO: Change the autogenerated stub
        if (self::getIsInstalled()) {
            echo(Yii::t('install', "Has been installed, if you want to reinstall please remove ") . Yii::getAlias(self::$installLockFile) . yii::t('install', ' and try it again'));
            exit();
        }
    }

    public static function getIsInstalled()
    {
        return file_exists(Yii::getAlias(self::$installLockFile));
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => ErrorAction::className(),
            ],
        ];
    }

    public function actionError()
    {
        return $this->render('error');
    }

    public function actionIndex()
    {
        return $this->redirect(['choose-language']);
    }

    public function actionChooseLanguage()
    {
        return $this->render('choose-language');
    }

    public function actionAccept()
    {
        return $this->render('accept');
    }

    public function actionCheckEnvironment()
    {
        if (isset($_SESSION['_install_env_passed']) && $_SESSION['_install_env_passed'] == 1) {
        } else {
            if (! in_array(Yii::$app->getRequest()->headers['referer'], [
                Url::to(['accept'], true),
                Url::to(['check-environment'], true)
            ])
            ) {
                return $this->redirect(['accept']);
            };
        }
        $data = array();
        $data['phpversion'] = @phpversion();
        $data['os'] = PHP_OS;
        $tmp = function_exists('gd_info') ? gd_info() : array();
        $max_execution_time = ini_get('max_execution_time');
        $allow_reference = (ini_get('allow_call_time_pass_reference') ? '<font color=green>[√]On</font>' : '<font color=red>[×]Off</font>');
        $allow_url_fopen = (ini_get('allow_url_fopen') ? '<font color=green>[√]On</font>' : '<font color=red>[×]Off</font>');
        $safe_mode = (ini_get('safe_mode') ? '<font color=red>[×]On</font>' : '<font color=green>[√]Off</font>');

        $err = 0;

        if (! version_compare($data['phpversion'], '5.4', '<')) {
            $data['phpversion'] = '<i class="fa fa-check correct"></i> ' . Yii::t('install', 'Yes') . ' ' . $data['phpversion'];
        } else {
            $data['phpversion'] = '<i class="fa fa-remove error"></i> ' . Yii::t('install', 'No') . ' ' . $data['phpversion'];
            $err++;
        }

        if (empty($tmp['GD Version'])) {
            $gd = '<font color=red>[×]Off</font>';
            $err++;
        } else {
            $gd = '<font color=green>[√]On</font> ' . $tmp['GD Version'];
        }

        if (class_exists('pdo')) {
            $data['pdo'] = '<i class="fa fa-check correct"></i> ' . Yii::t('install', 'Yes');
        } else {
            $data['pdo'] = '<i class="fa fa-remove error"></i> ' . Yii::t('install', 'No');
            $err++;
        }

        if (extension_loaded('pdo_mysql')) {
            $data['pdo_mysql'] = '<i class="fa fa-check correct"></i> ' . Yii::t('install', 'Yes');
        } else {
            $data['pdo_mysql'] = '<i class="fa fa-remove error"></i> ' . Yii::t('install', 'No');
            $err++;
        }

        if (extension_loaded('curl')) {
            $data['curl'] = '<i class="fa fa-check correct"></i> ' . Yii::t('install', 'Yes');
        } else {
            $data['curl'] = '<i class="fa fa-remove error"></i> ' . Yii::t('install', 'No');
            $err++;
        }

        if (extension_loaded('gd')) {
            $data['gd'] = '<i class="fa fa-check correct"></i> ' . Yii::t('install', 'Yes');
        } else {
            $data['gd'] = '<i class="fa fa-remove error"></i> ' . Yii::t('install', 'No');
            if (function_exists('imagettftext')) {
                $data['gd'] .= '<br><i class="fa fa-remove error"></i> FreeType Support ' . Yii::t('install', 'No');
            }
            $err++;
        }

        if (extension_loaded('json')) {
            $data['json'] = '<i class="fa fa-check correct"></i> ' . Yii::t('install', 'Yes');
        } else {
            $data['json'] = '<i class="fa fa-remove error"></i> ' . Yii::t('install', 'No');
            $err++;
        }

        if (extension_loaded('mbstring')) {
            $data['mbstring'] = '<i class="fa fa-check correct"></i> ' . Yii::t('install', 'Yes');
        } else {
            $data['mbstring'] = '<i class="fa fa-remove error"></i> ' . Yii::t('install', 'No');
            $err++;
        }

        if (ini_get('file_uploads')) {
            $data['upload_size'] = '<i class="fa fa-check correct"></i> ' . ini_get('upload_max_filesize');
        } else {
            $data['upload_size'] = '<i class="fa fa-remove error"></i> ' . Yii::t('install', 'Forbidden');
        }

        if (function_exists('session_start')) {
            $data['session'] = '<i class="fa fa-check correct"></i> ' . Yii::t('install', 'Yes');
        } else {
            $data['session'] = '<i class="fa fa-remove error"></i> ' . Yii::t('install', 'No');
            $err++;
        }

        $folders = array(
            '@frontend/runtime',
            '@frontend/web/assets',
            '@backend/runtime',
            '@frontend/web/admin/assets',
        );
        $new_folders = array();
        foreach ($folders as &$dir) {
            $dir = Yii::getAlias($dir);
            if (is_writable($dir)) {
                $new_folders[$dir]['w'] = true;
            } else {
                $new_folders[$dir]['w'] = false;
                $err++;
            }
            if (is_readable($dir)) {
                $new_folders[$dir]['r'] = true;
            } else {
                $new_folders[$dir]['r'] = false;
                $err++;
            }
        }
        $data['folders'] = $new_folders;
        $_SESSION['_install_env_passed'] = 0;
        if ($err == 0) {
            $_SESSION['_install_env_passed'] = 1;
        }
        $data['err'] = $err;
        return $this->render('check-environment', $data);
    }

    public function actionSetinfo()
    {
        set_time_limit(300);
        if (! isset($_SESSION['_install_env_passed']) || $_SESSION['_install_env_passed'] != 1) {
            $url = Url::to(['check-environment']);
            echo "<script>alert('" . Yii::t('install', 'Please check your environment to suite the cms') . Yii::t('install', ' If environment have been suit to the cms please check php session can set correctly') . "');location.href='{$url}';</script>";
            exit;
        }
        if (Yii::$app->getRequest()->getIsPost()) {
            $this->on(self::EVENT_AFTER_ACTION, function () {
                $request = Yii::$app->getRequest();
                Yii::$app->response->format = Response::FORMAT_JSON;
                $dbtype = $request->post('dbtype', 'mysql');
                $dbhost = $request->post('dbhost', 'dbhost');
                $dbuser = $request->post('dbuser', 'root');
                $dbpassword = $request->post('dbpw', '');
                $dbport = $request->post('dbport', '3306');
                $dbname = $request->post('dbname', '');
                $tablePrefix = $request->post("dbprefix", '');
                $dsn = $this->_getDsn($dbtype, $dbhost, $dbport, $dbname);
                $db = new Connection([
                    'dsn' => $dsn,
                    'username' => $dbuser,
                    'password' => $dbpassword,
                    'charset' => 'utf8',
                    'tablePrefix' => $tablePrefix,
                ]);
                Yii::$app->set('db', $db);
                $this->importDb(Yii::$app->db, $tablePrefix);

                //更新配置信息
                $data = [
                    'username' => $request->post('manager', 'admin'),
                    'password_hash' => Yii::$app->security->generatePasswordHash($request->post('manager_pwd')),
                    'email' => $request->post('manager_email'),
                ];
                Yii::$app->getDb()->createCommand()->update(User::tableName(), $data, 'id = 1')->execute();

                $model = Options::findOne(['name' => 'website_title']);
                $model->value = $request->post('sitename', 'Feehi CMS');
                $model->save(false);
                $model = Options::findOne(['name' => 'website_url']);
                $model->value = $request->post('website_url', '');
                $model->save(false);
                $model = Options::findOne(['name' => 'website_url']);
                $model->value = $request->post('siteurl', '');
                $model->save(false);
                $model = Options::findOne(['name' => 'seo_keywords']);
                $model->value = $request->post('sitekeywords', '');
                $model->save(false);
                $model = Options::findOne(['name' => 'seo_description']);
                $model->value = $request->post('siteinfo', '');
                $model->save(false);
                $_SESSION["_install_setinfo"] = 1;
                $configFile = yii::getAlias("@common/config/main-local.php");
                $array = require $configFile;
                $array['components']['db'] = [
                    'class' => yii\db\Connection::className(),
                    'dsn' => $dsn,
                    'username' => $dbuser,
                    'password' => $dbpassword,
                    'charset' => 'utf8',
                    'tablePrefix' => $tablePrefix,
                ];
                $str = "<?php \n return " . var_export($array,true) . ";";
                $str = str_replace('\\\\', '\\', $str);
                if( !file_put_contents($configFile, $str) ){
                    sleep(1);
                    $message = Yii::t("install", "Installed success;but update write config file error.please update common/config/main-local.php components db section.");
                    echo "<script>alert('{$message}');location.href='" . Url::to(['success']) . "';</script>";
                }else {
                    sleep(1);
                    echo "<script>location.href='" . Url::to(['success']) . "';</script>";
                }
                exit;
            });
            $html = $this->render('installing');
            echo $html;
            flush();
            if(ob_get_level() > 0){
                ob_flush();
            }
        } else {
            return $this->render('setinfo');
        }
    }

    public function actionCreateDatabase()
    {
        set_time_limit(0);
        $request = Yii::$app->getRequest();
        Yii::$app->getResponse()->format = Response::FORMAT_JSON;
        $dbtype = $request->post('dbtype', 'mysql');
        $dbhost = $request->post('dbhost', 'dbhost');
        $dbuser = $request->post('dbuser', 'root');
        $dbpassword = $request->post('dbpw', '');
        $dbport = $request->post('dbport', '3306');
        $dbname = $request->post('dbname', '');
        if( in_array($dbtype, ['postgresql', 'mysql']) ){
            $dsn = $this->_getDsn($dbtype, $dbhost, $dbport);
        }else {
            $dsn = $this->_getDsn($dbtype, $dbhost, $dbport, $dbname);
        }
        $db = new Connection([
            'dsn' => $dsn,
            'username' => $dbuser,
            'password' => $dbpassword,
            'charset' => 'utf8',
        ]);

        try {
            $db->createCommand("use $dbname")->execute();//判断用户名密码是否正确
            $this->checkAccountPermission($db, $dbname);
            return ['message' => ''];
        } catch (Exception $e) {
            if( isset($e->errorInfo[1]) && $e->errorInfo[1] === 1049 ) {
                $sql = "CREATE DATABASE IF NOT EXISTS `{$dbname}` DEFAULT CHARACTER SET utf8";
                $result = $db->createCommand($sql)->execute();
                if ($result == 1) {
                    $this->checkAccountPermission($db, $dbname, true);
                    return ['message' => ''];
                } else {
                    throw new Exception(Yii::t('install', 'Create database error, please create yourself and retry'));
                }
            }else{
                throw new Exception($e->getMessage());
            }
        }
    }

    private function _getDsn($dbtype, $dbhost, $dbport, $dbname='')
    {
        $dsn = '';
        switch ($dbtype) {
            case "postgresql":
            case "mysql":
                $dsn = $dbtype . ":host=" . $dbhost . ';port=' . $dbport;
                if( !empty($dbname) ) $dsn .= ";dbname=" . $dbname;
                break;

            case "sqlite":
                $path = Yii::getAlias("@common/config/conf/") . $dbname;
                $dsn = "sqlite:/$path.sq3";
                break;
        }
        return $dsn;
    }

    public function actionSuccess()
    {
        if (isset($_SESSION["_install_setinfo"]) && $_SESSION["_install_setinfo"] == 1) {
            if( !touch(Yii::getAlias(self::$installLockFile)) ){
                $message = Yii::t("install", "Touch install lock file " . self::$installLockFile . " failed,please touch file handled" );
                echo "<script>alert('{$message}')</script>";
            }
            session_destroy();
            return $this->render("success");
        } else {
            return $this->redirect(['setinfo']);
        }


    }

    public function actionLanguage()
    {
        $language = Yii::$app->request->get('lang');//echo $language;die;
        if (isset($language)) {
            Yii::$app->session['language'] = $language;
        }
        return $this->redirect(['accept']);
    }

    private function importDb(Connection $db, $tablepre)
    {
        //读取SQL文件
        $sql = file_get_contents(Yii::getAlias("@install/sql/data.sql"));
        $sql = str_replace("\r", "\n", $sql);
        $sql = explode(";\n", $sql);
        //var_dump($sql);die;
        //替换表前缀
        $default_tablepre = "%__prefix__%";
        $sql = str_replace("{$default_tablepre}", "{$tablepre}", $sql);
        //开始安装
        //sp_show_msg('开始安装数据库...');
        Yii::$app->getResponse()->getHeaders()->set("Content-Encoding", "none");
        ob_start();
        foreach ($sql as $item) {
            $item = trim($item);
            if (empty($item)) {
                continue;
            }
            preg_match('/CREATE TABLE `([^ ]*)`/', $item, $matches);
            try {
                if ($matches) {
                    $table_name = $matches[1];
                    $msg = Yii::t('install', 'Create table ') . "{$table_name}";
                    if (false !== $db->createCommand($item)->execute()) {
                        $this->sp_show_msg($msg . ' ' . Yii::t('install', 'finished'));
                    } else {
                        $this->sp_show_msg($msg . ' ' . Yii::t('install', 'error '), 'error');
                    }
                } else {
                    $db->createCommand($item)->execute();
                }
            }catch (Exception $exception){
                echo "数据库执行sql报错(通常是由于重复安装造成，新建一个数据库或者清空数据库所有的表再次安装即可):" . $exception->getMessage();
                exit;
            }

        }
        ob_end_flush();
    }

    private function sp_show_msg($msg, $class = '')
    {
        echo str_repeat(" ", 1024 * 64 * 99);
        echo "<script type=\"text/javascript\">showmsg(\"{$msg}\", \"{$class}\")</script>";
        ob_flush();
        flush();
    }

    private function checkAccountPermission(Connection $db, $dbname, $afterAutoCreate=false)
    {
        $db->createCommand("use $dbname")->execute();
        $db->createCommand("create table test(id integer)")->execute();
        $db->createCommand("insert test values(1)")->execute();
        $result = $db->createCommand("select * from test where id=1")->queryOne();
        if( $result === false ){//失败
            if( $afterAutoCreate ){
                throw new Exception(Yii::t('install', 'Create database `{database}` success.But no permission to use it', ['database' => $dbname]));
            }else {
                throw new Exception(Yii::t('install', 'Access to database `{database}` error.Maybe permission denied', ['database' => $dbname]));
            }
        }
        try {
            $db->createCommand("use $dbname")->execute();
            $db->createCommand("drop table test")->execute();
        }catch (Exception $exception){

        }

    }

    public function actionD(){
        $array = require yii::getAlias("@common/config/main-local.php");
        echo var_export($array,true);
    }
}
