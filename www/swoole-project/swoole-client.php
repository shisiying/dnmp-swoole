<?php
/**
 * Created by PhpStorm.
 * User: shisiying
 * Date: 2019-04-20
 * Time: 16:47
 */
$client = new swoole_client(SWOOLE_SOCK_TCP);
if (!$client->connect('localhost',9051, -1))
{
    exit("connect failed. Error: {$client->errCode}\n");
}
$client->send("hello world\n");
echo $client->recv();
$client->close();
