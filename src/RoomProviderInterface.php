<?php
/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2015/01/11
 * Time: 10:38
 */

namespace Chatbox;


interface RoomProviderInterface {

    /**
     * @param array $data
     * @return RoomInterface
     */
    public function make(array $data=[]);

    /**
     * @param array $cond
     * @return RoomInterface[]
     */
    public function query(array $cond = []);

} 