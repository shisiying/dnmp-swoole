<?php
/**
 * Created by PhpStorm.
 * User: shisiying
 * Date: 2019-04-06
 * Time: 17:29
 */


//创建server对象，监听9051端口
$serv = new swoole_server('0.0.0.0',9051);

$serv->on('connect',function ($serv,$fd){
    echo "有新的客户端连接,连接标示为$fd".PHP_EOL;
});

$serv->on('receive',function ($serv,$fd,$from_id,$data){
   $serv->send($fd,"服务器给你发送消息了：".$data);
});

$serv->on("close",function ($serv,$fd){
    echo "编号为{$fd}的客户端已经关闭".PHP_EOL;
});

//启动服务器
$serv->start();

