<?php
/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2015/01/11
 * Time: 21:34
 */

namespace Chatbox\Database\Eloquent;

class Room extends \Illuminate\Database\Eloquent\Model implements \Chatbox\RoomInterface{

    protected $table = 'cb_room';

    protected $fillable = ['srug'];

    public function getId()
    {
        return $this->id;
    }

    public function setProp(){
        $this->prop = json_encode($this->attributes);
    }

    public function getMessages(array $cond)
    {
        return "hogehoge";
    }

    public function sendMessage(\Chatbox\UserInterface $user, $message)
    {
        return "fugafuga";
    }

    public function clearMessages()
    {
        return "mikemike";
    }
}

Room::saving(function($room){
    $room->setProp();
});