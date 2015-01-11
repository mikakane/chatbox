<?php
/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2015/01/09
 * Time: 22:57
 */

namespace Chatbox;


class Chatbox {
    /**
     * @var RoomProviderInterface
     */
    static public $defaultRoomProvider;
    /**
     * @var UserProviderInterface
     */
    static public $defaultUserProvider;

    static public function create(array $param = [],RoomProviderInterface $roomProvider=null,UserProviderInterface $userProvider=null)
    {
        $room = $roomProvider->make($param);
        return new static($room,$userProvider);
    }

    static public function query(array $cond=[],RoomProviderInterface $roomProvider=null,UserProviderInterface $userProvider=null)
    {
        $rooms = $roomProvider->query($cond);
        $rtn = [];
        foreach($rooms as $room){
            $rtn[] = new static($room,$userProvider);
        }
        return $rtn;

    }



    /**
     * @var RoomInterface
     */
    public $room;

    /**
     * @var UserInterface[]
     */
    public $users = [];

    /**
     * @var UserProviderInterface
     */
    protected $userProvider;

    function __construct(RoomInterface $room,UserProviderInterface $userProvider)
    {
        $this->room = $room;
    }

    public function join(array $cred = []){
        if($user = $this->userProvider->make($cred)){
            if(!$this->isTenant($user)){
                $this->users[$user->getId()] = $user;
            }
            return $user;
        }else{
            throw new ChatboxOnJoinException("");
        }
    }

    public function isTenant(UserInterface $user){
        return (bool) isset($this->users[$user->getId()]);
    }

    public function messages(array $cond=[]){
        return $this->room->getMessages($cond);
    }

    public function say(UserInterface $user,$message){
        if($this->isTenant($user)){
            return $this->room->sendMessage($user,$message);
        }else{
            throw new ChatboxOnSayException();
        }
    }

    public function clear(){
        $this->room->clearMessages();
    }
}