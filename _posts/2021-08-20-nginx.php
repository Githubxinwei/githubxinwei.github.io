---
layout: post
title: phpstudy重启之后出现Nginx报错CreateFile failed
date: 2021-08-20
categories: nginx
tags: [nginx,phpstudy]
description: phpstudy重启之后出现Nginx报错CreateFile failed
---

* phpstudy nginx环境,nginx报错日志如下:

2020/04/13 15:40:33 [error] 7844#14252: *7 CreateFile() "D:/phpstudy_pro/WWW/lvblog/public/error/404.html" failed (3: The system cannot find the path specified), client: 127.0.0.1, server: lvblog, request: "GET /note HTTP/1.1", host: "lvblog", referrer: "http://lvblog/"
在vhost.conf添加配置：（如果请求路径不存在则重写）

if (!-e $request_filename) {
rewrite ^/(.*)$ /index.php/$1 last;
}
修改后的如下：

server {
listen        80;
server_name  lvblog;
root   "D:/phpstudy_pro/WWW/lvblog/public";
location / {
index index.php index.html error/index.html;
autoindex  off;
if (!-e $request_filename) {
rewrite ^/(.*)$ /index.php/$1 last;
}
}
location ~ \.php(.*)$ {
fastcgi_pass   127.0.0.1:9000;
fastcgi_index  index.php;
fastcgi_split_path_info  ^((?U).+\.php)(/?.+)$;
fastcgi_param  SCRIPT_FILENAME  $document_root$fastcgi_script_name;
fastcgi_param  PATH_INFO  $fastcgi_path_info;
fastcgi_param  PATH_TRANSLATED  $document_root$fastcgi_path_info;
include        fastcgi_params;
}
}
重启wnmp
{:toc}