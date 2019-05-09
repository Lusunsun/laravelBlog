<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GatewayClient\Gateway;
use App\Http\Requests;

class WebSocketController extends Controller
{
    public function __construct()
    {
        Gateway::$registerAddress = '0.0.0.0:2000';
    }


    // 处理客户端连接
    public function onConnect($connection)
    {
        $connection->worker->uidConnections[$connection->getRemoteIp()] = $connection;
        echo "new connection from ip " . $connection->getRemoteIp();
        echo (count($connection->worker->uidConnections));
    }

    // 处理客户端消息
    public function onMessage($connection, $data)
    {
        // 向客户端发送hello $data
        echo '收到客户端信息'.$data;
        $connection->send('Hello, your send message is: ' . $data);
    }

    // 处理客户端断开
    public function onClose($connection)
    {
        echo "connection closed from ip {$connection->getRemoteIp()}\n";
    }

    public function onWorkerStart($worker)
    {
//        Timer::add(1, function () use ($worker) {
//            $time_now = time();
//            foreach ($worker->connections as $connection) {
//                // 有可能该connection还没收到过消息，则lastMessageTime设置为当前时间
//                if (empty($connection->lastMessageTime)) {
//                    $connection->lastMessageTime = $time_now;
//                    continue;
//                }
//                // 上次通讯时间间隔大于心跳间隔，则认为客户端已经下线，关闭连接
//                if ($time_now - $connection->lastMessageTime > HEARTBEAT_TIME) {
//                    echo "Client ip {$connection->getRemoteIp()} timeout!!!\n";
//                    $connection->close();
//                }
//            }
//        });
    }
}
