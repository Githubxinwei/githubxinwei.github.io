---
layout: post
title: 解决 Failed to connect to github.com port 443:connection timed out
date: 2022-01-27
categories: git
tags: [git]
description: 解决 Failed to connect to github.com port 443:connection timed out
---

<pre>
    <code>
        取消全局代理：
        
        git config --global --unset http.proxy

        git config --global --unset https.proxy
    </code>
</pre>