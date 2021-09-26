---
layout: post
title: phpstudy重启之后出现Nginx报错CreateFile failed
date: 2021-08-20
categories: nginx
tags: [nginx,phpstudy]
description: phpstudy重启之后出现Nginx报错CreateFile failed
mathjax: true
---

<p>phpstudy nginx环境,nginx报错日志如下:</p>

<p>2020/04/13 15:40:33 [error] 7844#14252: *7 CreateFile() &quot;D:/phpstudy_pro/WWW/lvblog/public/error/404.html&quot; failed (3: The system cannot find the path specified), client: 127.0.0.1, server: lvblog, request: &quot;GET /note HTTP/1.1&quot;, host: &quot;lvblog&quot;, referrer: &quot;http://lvblog/&quot;
    在vhost.conf添加配置：（如果请求路径不存在则重写）</p>

<p>if (!-e $request_filename) {
    rewrite ^/(.*)$ /index.php/$1 last;
    }
    修改后的如下：</p>

<p>server {
    listen        80;
    server<em>name  lvblog;
        root   &quot;D:/phpstudy</em>pro/WWW/lvblog/public&quot;;
    location / {
    index index.php index.html error/index.html;
    autoindex  off;
    if (!-e $request_filename) {
    rewrite ^/(.<em>)$ /index.php/$1 last;
        }
        }
        location ~ .php(.</em>)$ {
    fastcgi<em>pass   127.0.0.1:9000;
        fastcgi</em>index  index.php;
    fastcgi<em>split</em>path<em>info  ^((?U).+.php)(/?.+)$;
        fastcgi</em>param  SCRIPT<em>FILENAME  $document</em>root$fastcgi<em>script</em>name;
    fastcgi<em>param  PATH</em>INFO  $fastcgi<em>path</em>info;
    fastcgi<em>param  PATH</em>TRANSLATED  $document<em>root$fastcgi</em>path<em>info;
        include        fastcgi</em>params;
    }
    }
    重启wnmp</p>

<p>&lt;a href=&quot;https://blog.csdn.net/sinat_41818709/article/details/105490289&quot;&gt;本地摘自此处&lt;/a&gt;</p>