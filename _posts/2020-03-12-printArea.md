---
layout: post
title: 打印网页表格分页的问题
date: 2020-03-12
categories: javascript
tags: [easyui,javascript]
description: 网页表格分页。
---
打印网页分页与css和js都有点关系，css中的两个属性
page-break-before: auto;page-break-after: always;
可以影响到分页。如果我们只想打印指定区域，我们可以
使用$("div#myPrintArea").printArea();这种方式来打印，
来打印指定区域id的内容，就是这么简单，哈哈。

