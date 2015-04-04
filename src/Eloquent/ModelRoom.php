<?php
/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2015/01/11
 * Time: 21:34
 */

namespace Chatbox\Database\Eloquent;

use Chatbox\Chatbox\Schema\ChatboxRoom;

class ModelRoom extends Base{

    protected $fillable = ['*'];

    public function getSchema()
    {
        return new ChatboxRoom("chatbox_room");
    }


}