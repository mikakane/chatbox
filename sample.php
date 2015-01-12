<?php
/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2015/01/10
 * Time: 1:56
 */

require __DIR__."/vendor/autoload.php";


$roomProvider = new Chatbox\Database\RoomProvider();
$userProvider = new Chatbox\Database\UserProvider();

$chatbox = \Chatbox\Chatbox::create([
    "srug" => sha1(time()),
    "tags" => [
        "category" => "osaka",
        "topic" => ["warai","honi"]
    ]
],$roomProvider,$userProvider);

var_dump($chatbox);

// fetch messages
$messageList = $chatbox->messages();

// join to room
$user = $chatbox->join([
    "name" => "hogehoge",
]);

//
$chatbox->say($user,$newMessage);

