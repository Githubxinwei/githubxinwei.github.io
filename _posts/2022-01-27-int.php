---
layout: post
title: int(1) 和 int(10) 有什么区别？资深开发竟然都理解错了！
date: 2022-01-27
categories: mysql
tags: [mysql]
description: int(1) 和 int(10) 有什么区别？资深开发竟然都理解错了！
---

<pre>
    <code>
    困惑

    最近遇到个问题，有个表的要加个user_id字段，user_id字段可能很大，于是我提mysql工单alter table xxx ADD user_id int(1)。领导看到我的sql工单，于是说：这int(1)怕是不够用吧，接下来是一通解释。

    其实这不是我第一次遇到这样的问题了，其中不乏有工作5年以上的老司机。包括我经常在也看到同事也一直使用int(10)，感觉用了int(1)，字段的上限就被限制，真实情况肯定不是这样。

    数据说话

    我们知道在mysql中 int占4个字节，那么对于无符号的int，最大值是2^32-1 = 4294967295，将近40亿，难道用了int(1)，就不能达到这个最大值吗？

    CREATE TABLE `user` (
      `id` int(1) unsigned NOT NULL AUTO_INCREMENT,
       PRIMARY KEY (`id`)
    ) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4;

    id字段为无符号的int(1)，我来插入一个最大值看看。

    mysql> INSERT INTO `user` (`id`) VALUES (4294967295);
    Query OK, 1 row affected (0.00 sec)

    可以看到成功了，说明int后面的数字，不影响int本身支持的大小，int(1)、int(2)...int(10)没什么区别。

    零填充

    一般int后面的数字，配合zerofill一起使用才有效。先看个例子：

    CREATE TABLE `user` (
      `id` int(4) unsigned zerofill NOT NULL AUTO_INCREMENT,
       PRIMARY KEY (`id`)
    ) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4;

    注意int(4)后面加了个zerofill，我们先来插入4条数据。

    mysql> INSERT INTO `user` (`id`) VALUES (1),(10),(100),(1000);
    Query OK, 4 rows affected (0.00 sec)
    Records: 4  Duplicates: 0  Warnings: 0

    分别插入1、10、100、1000 4条数据，然后我们来查询下：

    mysql> select * from user;
    +------+
    | id   |
    +------+
    | 0001 |
    | 0010 |
    | 0100 |
    | 1000 |
    +------+
    4 rows in set (0.00 sec)

    通过数据可以发现 int(4) + zerofill实现了不足4位补0的现象，单单int(4)是没有用的。而且对于0001这种，底层存储的还是1，只是在展示的会补0。

    总结

    int后面的数字不能表示字段的长度，int(num)一般加上zerofill，才有效果。

    zerofill的作用一般可以用在一些编号相关的数字中，比如学生的编号 001 002 ... 999这种，如果mysql没有零填充的功能，但是你又要格式化输出等长的数字编号时，那么你只能自己处理了。
    </code>
</pre>
上文摘自网络，查看原文：<a href="https://mp.weixin.qq.com/s/cOS_DqsMCk1xQdw5Zb3CyQ">请点击此处。</a>