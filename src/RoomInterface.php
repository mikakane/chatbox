<?php
/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2015/01/09
 * Time: 22:30
 */
namespace Chatbox;

interface RoomInterface {

    public function getId();

    public function getMessages(array $cond);

    public function sendMessage(UserInterface $user,$message);

    public function clearMessages();

} 