<?php
/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2015/01/11
 * Time: 21:34
 */

namespace Chatbox\Database\Eloquent;

class User extends \Illuminate\Database\Eloquent\Model implements \Chatbox\UserInterface{

    protected $table = 'cb_user';

    protected $fillable = ['srug'];

    public function getId()
    {
        return $this->id;
    }

    public function setProp(){
        $this->prop = json_encode($this->attributes);
    }
    public function setEnterKey(){
        $this->enter_key = sha1(mt_rand());
    }

    public function auth($cred){
        $user = static::where("enter_key","=",$cred)->firstOrFail();
        return $user;
    }
}

User::saving(function($room){
    $room->setProp();
});

User::creating(function($room){
    $room->setEnterKey();
});