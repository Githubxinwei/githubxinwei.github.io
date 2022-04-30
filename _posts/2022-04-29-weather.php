---
layout: post
title: 每日天气
date: 2022-04-30
categories: weather
tags: [weather]
description: 每日天气
---
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <title>每日天气</title>
    <meta http-equiv=X-UA-Compatible content="IE=Edge,chrome=1">
</head>
<body>
<span style="float:right;">
    当前日期：<?php echo date('Y-m-d')?>
    <?php
    $week_array=["星期日","星期一","星期二","星期三","星期四","星期五","星期六"];
    echo $week_array[date("w",time())];
    ?>
</span>
<div>
    <?php
    header("Content-Type:text/html;charset=utf-8");
    // 爬虫核心功能：获取网页源码
    $html = file_get_contents("https://tianqi.qq.com/");
    // 通过 php 的 file_get_contents 函数获取百度首页源码，并传给 $html 变量
    $str = iconv("gb2312", "utf-8//IGNORE", $html);
    echo $str;
    ?>
</div>
</body>
</html>
