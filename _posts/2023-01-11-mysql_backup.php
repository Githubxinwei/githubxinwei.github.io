---
layout: post
title: windows环境下mysql数据库定时备份
date: 2023-01-11
categories: mysql
tags: [mysql]
description: mysql_backup
---

<pre>
    <code>
   1、写MySQL备份bat文件
        @echo off
            set "yMd=%date:~,4%%date:~5,2%%date:~8,2%"
            set "hms=%time:~,2%%time:~3,2%%time:~6,2%"
            "D:\phpstudy_pro\Extensions\MySQL5.7.26\bin\mysqldump.exe" -uroot -proot db_name>D:/mysql_backup_%yMd%-%hms%.sql
        @echo on

   2、打开Windows的任务计划

<img src="./../../../../../img/manage_tool.png" />
<img src="./../../../../../img/plan.png" />
<img src="./../../../../../img/create_plan.png" />
<img src="./../../../../../img/mysql_backup.png" />
<img src="./../../../../../img/set_time.png" />
<img src="./../../../../../img/path.png" />
<img src="./../../../../../img/confirm.png" />
    </code>
</pre>
