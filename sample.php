<?php
/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2015/01/10
 * Time: 1:56
 */

require __DIR__."/vendor/autoload.php";

use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;

$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => '127.0.0.1',
    'database'  => 'misaki',
    'username'  => 'root',
    'password'  => '',
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
]);

// Set the event dispatcher used by Eloquent models... (optional)
use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container;
$capsule->setEventDispatcher(new Dispatcher(new Container));

// Make this Capsule instance available globally via static methods... (optional)
$capsule->setAsGlobal();

// Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
$capsule->bootEloquent();

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

