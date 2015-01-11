<?php
/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2015/01/11
 * Time: 10:38
 */

namespace Chatbox;


interface UserProviderInterface {

    /**
     * @param array $cred
     * @return UserInterface
     */
    public function make(array $cred);

} 