---
layout: post
title: vue在浏览器的Source隐藏源码
date: 2024-04-18
categories: vue
tags: [vue,source]
description: vue在浏览器的Source隐藏源码
---

<pre>
    <code>
<img src="https://thinkwei.cn/img/source.png" />  

    一，在vue的根部目录下vue.config.js文件，配置productionSourceMap: false,默认是true
<img src="https://thinkwei.cn/img/vue_config_js.png" />
    二，在vue目录下config文件夹下面的index.js文件，配置productionSourceMap: false,默认是true
<img src="https://thinkwei.cn/img/index_js.png" />
    三，如果上面的配置无效，可以尝试在vue.config.js中添加：
        在vue.config.js中添加：
        configureWebpack: config => {
           config.devtool = false;
           ...（默认这里有内容，没有内容把这个点点去掉）
        },
        productionSourceMap: false,
        productionSourceMap: false 和 configureWebpack.devtool 同时设置才生效。
    </code>
</pre>

