<?php
/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2015/01/11
 * Time: 21:28
 */

namespace Chatbox\Database;


class UserProvider implements \Chatbox\UserProviderInterface{
    /**
     * @param array $cred
     * @return \Chatbox\UserInterface
     */
    public function make(array $cred)
    {
        if(isset($cred["auth"])){
            $user = User::auth($cred["auth"]);
        }else{
            $user = (new User($cred));
            $user->save();
        }
        return $user;
    }


} 