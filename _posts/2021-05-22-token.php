---
layout: post
title: app接口设计之token的php实现
date: 2021-05-22
categories: php
tags: [php,token]
description: app接口设计之token的php实现
---

<p>app接口设计之token的php实现</p>

<pre><code>
#### app接口设计之token的php实现

1、首先说一句什么是接口：接口简单来说就是服务器端用来返回给其他程序或者客户端数据的桥梁

2、接口的作用：根据固定参数返回固定数据，比如客户端传a=1，那么服务器端返回a的姓名，客户端传a=2，服务器端返回a的性别，而不会返回其他数据。

3、signature签名的作用：保证接口与数据的安全

4、token的作用：和PC登陆的session一样，作为用户进入的唯一票据

例如：app与服务器端的接口、java与php之间不同程序的接口，这些接口一般通过json格式传输数据

所以为了保证移动端和服务端数据传输相对安全，需要对接口进行加密传输

1、token的设计目的：

因为APP端没有和PC端一样的session机制，所以无法判断用户是否登陆，以及无法保持用户状态，所以就需要一种机制来实现session，这就是token的作用，token是用户登陆的唯一票据，只要APP传来的token和服务器端一致，就能证明你已经登陆（就和你去看电影一样，需要买票，拿着票就能进了）

2、token设计时的种类：
（1）第三方登陆型：这种token形如微信的access_token，设计原理是按照OAuth2.0来的，其特点是定时刷新（比如两小时刷新），目的是因为数据源将登陆权限赋予第三方服务器时必须要控制其有效期和权限，要不然第三方服务器可以不经过用户同意，无限期从数据源服务器获取用户任意数据

（2）APP自用登陆型：这种token就是一般的APP用的token，因为不经过第三方，而是用户直接取数据源服务器数据，所以设计比较随意，只需要保证其token的唯一性就行

3、APP自用登陆型token实现步骤：
（1）数据库用户表添加token字段和time_out这个token过期时间字段
（2）用户登陆时（注册时自动登陆也需要）生成一个token和过期时间存入表中
（3）在其他接口调用前，判断token是否正确，正确则继续，错误则让用户重新登陆

4、APP自用登陆型token实现代码（公司自用框架及逻辑，主要看逻辑，不要直接复制代码）：

（1）//下面是用户登陆时把token插入数据库的代码
$logininfo[&#39;token&#39;] = appuser::settoken();
$time_out = strtotime(&quot;+7 days&quot;);
db::setByPk(&#39;u_adver&#39;, array(&#39;token1&#39; =&gt; $logininfo[&#39;token&#39;], &#39;time_out&#39; =&gt; $time_out), $logininfo[&#39;id&#39;]);

（2）//下面是生成token方法代码：
public static function settoken()

{

$str = md5(uniqid(md5(microtime(true)),true));  //生成一个不会重复的字符串

$str = sha1($str);  //加密

return $str;

}

//（3）下面是每个接口都必须调用的token验证代码，验证具体实现是在（4）
$args[&#39;token&#39;] = $_POST[&#39;token&#39;];
$tokencheck = appuser::checktokens($args[&#39;token&#39;], &#39;u_adver&#39;);
if ($tokencheck != 90001)
{
$res[&#39;msg_code&#39;] = $tokencheck;
v_json($res);
}
//（4）token验证方法，db::是数据库操作类，这里设置是token如果七天没被调用则需要重新登陆（也就是说用户7天没有操作APP则需要重新登陆），如果某个接口被调用，则会重新刷新过期时间
public static function checktokens($token, $table)
{
$res = db::getOneForFields($table, &#39;time_out&#39;, &#39;token1 = ?&#39;, array($token));
if (!empty($res))
{
if (time() - $res[&#39;time_out&#39;] &gt; 0)
{
return 90003;  //token长时间未使用而过期，需重新登陆
}
$new_time_out = time() + 604800;//604800是七天
if (db::setWhere($table, array(&#39;time_out&#39; =&gt; $new_time_out), &#39;token1 = ?&#39;, array($token)))
{
return 90001;  //token验证成功，time_out刷新成功，可以获取接口信息
}
}
return 90002;  //token错误验证失败
}
[原文链接](https://www.cnblogs.com/panziwen/p/10562682.html)</code></pre>