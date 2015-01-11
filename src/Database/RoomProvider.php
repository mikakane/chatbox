<?php
/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2015/01/11
 * Time: 21:28
 */

namespace Chatbox\Database;

use Chatbox\Database\Eloquent\Room;

class RoomProvider implements \Chatbox\RoomProviderInterface{
    /**
     * @param array $data
     * @return \Chatbox\RoomInterface
     */
    public function make(array $data = [])
    {
        $chatbox = new Room($data);
        $chatbox->save();
        return $chatbox;
    }

    /**
     * @param array $cond
     * @return \Chatbox\RoomInterface[]
     */
    public function query(array $cond = [])
    {
        // TODO: Implement query() method.
    }


} 