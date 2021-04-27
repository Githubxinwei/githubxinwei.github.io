---
layout: post
title: 配置phpstorm完美支持Codeigniter(CI)代码自动完成(代码提示)
date: 2021-04-27
categories: CI
tags: [CI]
description: Codeigniter(CI)代码自动完成
---
配置CI代码提示

<1>下载代码提示项目：
https://github.com/topdown/phpStorm-CC-Helpers
<2>拷贝提示片段：
将CI_phpStorm.php，DB_active_rec.php（改名为DB_query_builder.php），my_models.php拷贝到网站根目录，即index.php同目录下。

<3>将CI核心类设为纯文本：
将system里面的core/Controller.php，core/Model.php，database/DB_query_builder.php右键设为plain text。

现在已经有代码完成功能了。

<4>实现model提示功能：
把Model类在my_models.php的注释里添加，注意把类名首字母大写改为小写。这样Model就能提示了。

<5>实现view提示：
<h2><?php
    /**
     * @see News::index()
     * @var News $title
     * @var News $news
     */
    echo $title;
    ?></h2>
相应的controller类需要实现__toString()方法，就可以了。

按住ctrl+鼠标左键，就可以看到他来自于哪个类（ctrl+q显示注释），如果点击函数名则可以导航到那个函数。

<6>model子文件夹
在model再创建文件夹，比如创建这样一个model类：mod/Test1_model.php。

同样是在my_models.php里添加注释，但是忽略mod文件夹，当这个文件夹不存在一样：

@property test1_model      $test1_model
但是在代码load的时候，这个文件夹要体现出来，这样体现出来也不会影响这个代码提示的：

$this->load->model('mod/test1_model');
$data['news2'] = $this->test1_model->getData();
<7>实现library自定义类提示功能
自定义代码会放在libraries里面，并且会放在一个单独的子文件夹里。因为这个代码可能会重用，这个子文件夹会单独做为一个git，而其他的代码则重用的可能性不大、紧扣本网站的独特业务逻辑，不考虑重用问题。那么这种自定义代码如何做代码提示？跟model是一样的：

@property Testzphp         $testzphp

然后在controller里：
$this->load->library('zphp/Testzphp');
$data['zphp'] = $this->testzphp->test(235);
<8>自定义变量代码提示
由于不能指定类型，变量往往不能直接使用自定义类的方法，我们可以给他添加代码提示。

注意：代码提示只是代码提示，并不是真的完成类型转换。

全局变量的代码提示添加在变量的上方，比如：

/**
* @var CommonOrderInfo $orderInfo
*/
private $orderInfo = null;

如果是在函数内的局部变量，那么在函数外定义这个代码提示是不对的，因为他的作用范围不在那里，正确的做法仍然是添加在变量上方。如果for循环则可以添加在循环的上方，或者在循环内部再次用到变量的时候添加在变量的上方。
/**
* @var CommonOrderItem $item
*/
foreach ($this->orderItems as $item)
{}


3、git配置
将.idea添加到忽略清单。

4、拼写检查去掉
project settings ---> inspections ---> spelling ---> Typo的勾去掉
5、快捷键
<1>快速导航
当通过代码导航到对应的类-方法查看源代码之后，需要能快速的返回回来：ctrl+alt+左箭头/右箭头
————————————————
