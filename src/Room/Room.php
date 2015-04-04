<?php
/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2015/04/03
 * Time: 15:57
 */

namespace Chatbox\Chatbox\Room;

use Chatbox\Container\ArrayContainerTrait;
use Chatbox\Database\Eloquent\ModelRoom;

class Room {

    use ArrayContainerTrait;

    /**
     * @var RoomMessageList
     */
    protected $messages;

    /**
     * @var RoomMemberList
     */
    protected $members;

    function __construct(array $data = [])
    {
        $this->setData($data);
        $this->members = new RoomMemberList();
        $this->messages = new RoomMessageList();
    }

    /**
     * @return RoomMessageList
     */
    public function getMessages()
    {
        return $this->messages;
    }

    /**
     * @return RoomMemberList
     */
    public function getMembers()
    {
        return $this->members;
    }

    public function getById($id){
        if($model = ModelRoom::where("id",$id)->first()){
            return $this->getByModel($model);
        }else{
            return null;
        }
    }

    public function getByModel(ModelRoom $model){
        $data = json_decode($model->data,true);
        $data["id"] = $model->id;
        return new static($data);
    }

    public function create(){
        $model = ModelRoom::create([
            "data" => json_encode($this->toArray())
        ]);
        return $this->getByModel($model);
    }








}