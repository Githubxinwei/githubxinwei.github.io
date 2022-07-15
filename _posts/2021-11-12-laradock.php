---
layout: post
title: mac apple chip机器上的laradock环境搭建
date: 2021-11-12
categories: laradock
tags: [laradock,docker]
description: mac apple chip机器上的laradock环境搭建
---

<pre>
    <code>
        1.目前docker已经有mac apple chip的版本了哦，首先我们在官网上将此应用下载下来;修改镜像为阿里云镜像：https://cr.console.aliyun.com/cn-hangzhou/instances/mirrors。
        2.把laradock克隆下来：git clone https://github.com/Laradock/laradock.git。
        3.进入laradock目录运行：cp .env.example .env。
        4.运行容器：docker-compose up -d nginx mysql phpmyadmin redis workspace 。
          注意mac apple chip机器上需要单独安装mysql：
            通过homebrew安装
            brew install mysql@5.7
            配置环境变量
            echo 'export PATH="/opt/homebrew/opt/mysql@5.7/bin:$PATH"' >> ~/.zshrc
            source ~/.zshrc
            安装成功之后查看版本
            mysql --version
            登录数据库并设置初始密码 第一次登录不需要密码，直接回车就可以了。
            mysql -uroot -p
            mysql> set password for 'root'@'localhost'=password('你自己的密码');
        5.在.env文件中切换成需要的php版本：比如切换成php7.2 修改PHP_VERSION=7.2即可
        6.运行docker-compose build php-fpm（此处较慢，打开.env文件 设置 CHANGE_SOURCE=true 会好点）。
        7.运行docker-compose build workspace。
        8.进入laradock/nginx/sites目录 复制并修改conf文件：
            location ~ \.php$ {
                # try_files $uri /index.php =404;
                fastcgi_pass php-upstream;
                fastcgi_index index.php;
                fastcgi_buffers 16 16k;
                fastcgi_buffer_size 32k;
                fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
                #fixes timeouts
                fastcgi_read_timeout 600;
                include fastcgi_params;
            }
            //此处是ci框架的路由
            location /admin.php {
                fastcgi_pass php-upstream;
                fastcgi_param SCRIPT_FILENAME /var/www/your_directionary/admin.php;
                fastcgi_param PATH_INFO $fastcgi_path_info;
                fastcgi_split_path_info ^(.+\.php)(.*)$;
                fastcgi_param PATH_TRANSLATED $document_root$fastcgi_path_info;
                include fastcgi_params;
            }
        9.docker-compose up - nignx php-fpm workspace(重启容器)。
        10.打开docker应该 在laradock目录下重启nginx php-fpm workspace。
    </code>
</pre>
