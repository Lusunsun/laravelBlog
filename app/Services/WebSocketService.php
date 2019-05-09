<?php
namespace App\Services;

use DB;
use GatewayClient\Gateway;

class  WebSocketService {

    public static function onMessage($client_id, $message)
    {
        $response = ['errcode' => 0, 'msg' => 'ok', 'data' => []];
        $message = json_decode($message);

        if (!isset($message->mode)) {
            $response['msg'] = 'missing parameter mode';
            $response['errcode'] = ERROR_CHAT;
            Gateway::sendToClient($client_id, json_encode($response));
            return false;
        }

        switch ($message->mode) {
            case 'say':   #处理发送的聊天
                if (self::authentication($message->order_id, $message->user_id)) {
                    OrderChat::store($message->order_id, $message->type, $message->content, $message->user_id);
                } else {
                    $response['msg'] = 'Authentication failure';
                    $response['errcode'] = ERROR_CHAT;
                }
                break;
            case 'chats':  #获取聊天列表
                $chats = OrderChat::where('order_id', $message->order_id)->get();
                $response['data'] = ['chats' => $chats];
                break;
            default:
                $response['errcode'] = ERROR_CHAT;
                $response['msg'] = 'Undefined';
        }

        Gateway::sendToClient($client_id, json_encode($response));
    }

}