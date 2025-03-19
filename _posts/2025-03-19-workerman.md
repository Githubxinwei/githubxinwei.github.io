---
layout: post
title: Workerman5.0 如何实现 一对一聊天
date: 2025-03-19
categories: Workerman
tags: [http]
description: Workerman5.0 如何实现 一对一聊天
---

## 要实现一对一聊天功能，使用 Workerman 5.0 作为后端，前端可以使用 WebSocket 进行通信。以下是实现步骤和代码示例。

    安装 Workerman
    首先，确保你已经安装了 Workerman。可以通过 Composer 安装：
    
    composer require workerman/workerman (生成后隐藏在vendor目录中)
    后端代码
    创建一个 PHP 文件（例如 chat_server.php并和vendor目录同级），用于处理 WebSocket 连接和消息传递。
    
    <?php
    require_once __DIR__ . '/vendor/autoload.php';
    
    use Workerman\Worker;
    use Workerman\Connection\TcpConnection;
    
    // 创建一个 WebSocket 服务器
    $ws_worker = new Worker("websocket://0.0.0.0:2346");
    
    // 保存用户连接的数组
    $users = [];
    
    // 当有客户端连接时
    $ws_worker->onConnect = function(TcpConnection $connection) use (&$users) {
        echo "New connection\n";
    };
    
    // 当有客户端发送消息时
    $ws_worker->onMessage = function(TcpConnection $connection, $data) use (&$users) {
        $message = json_decode($data, true);
    
        if (isset($message['type'])) {
            switch ($message['type']) {
                case 'login':
                    // 用户登录，保存连接
                    $users[$message['user_id']] = $connection;
                    $connection->user_id = $message['user_id'];
                    echo "User {$message['user_id']} logged in\n";
                    break;
    
                case 'chat':
                    // 一对一聊天
                    if (isset($users[$message['to_user_id']])) {
                        $users[$message['to_user_id']]->send(json_encode([
                            'type' => 'chat',
                            'from_user_id' => $connection->user_id,
                            'message' => $message['message']
                        ));
                    }
                    break;
            }
        }
    };
    
    // 当客户端断开连接时
    $ws_worker->onClose = function(TcpConnection $connection) use (&$users) {
        if (isset($connection->user_id)) {
            unset($users[$connection->user_id]);
            echo "User {$connection->user_id} disconnected\n";
        }
    };
    
    // 运行 worker
    Worker::runAll();
    前端代码
    在前端，使用 WebSocket 连接到服务器，并实现登录和发送消息的功能。
    
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>WebSocket Chat</title>
    </head>
    <body>
        <div>
            <input type="text" id="user_id" placeholder="Your User ID">
            <button onclick="login()">Login</button>
        </div>
        <div>
            <input type="text" id="to_user_id" placeholder="To User ID">
            <input type="text" id="message" placeholder="Message">
            <button onclick="sendMessage()">Send</button>
        </div>
        <div id="chat"></div>
    
        <script>
            let ws;
            let user_id;
    
            function login() {
                user_id = document.getElementById('user_id').value;
                ws = new WebSocket('ws://127.0.0.1:2346');
    
                ws.onopen = function() {
                    ws.send(JSON.stringify({
                        type: 'login',
                        user_id: user_id
                    }));
                };
    
                ws.onmessage = function(event) {
                    const message = JSON.parse(event.data);
                    if (message.type === 'chat') {
                        document.getElementById('chat').innerHTML += `<p>From ${message.from_user_id}: ${message.message}</p>`;
                    }
                };
            }
    
            function sendMessage() {
                const to_user_id = document.getElementById('to_user_id').value;
                const message = document.getElementById('message').value;
                ws.send(JSON.stringify({
                    type: 'chat',
                    to_user_id: to_user_id,
                    message: message
                }));
            }
        </script>
    </body>
    </html>
    运行服务器
    在终端中运行 PHP 文件启动 WebSocket 服务器：
    
    php chat_server.php start
    5. 测试
    打开两个浏览器窗口，分别输入不同的用户 ID 并登录。
    在一个窗口中输入目标用户 ID 和消息，点击发送。
    另一个窗口应该会收到消息并显示在页面上。
    总结
    通过以上步骤，你可以实现一个简单的一对一聊天系统。Workerman 作为后端处理 WebSocket 连接和消息传递，前端通过 WebSocket 与服务器通信，实现实时聊天功能。

