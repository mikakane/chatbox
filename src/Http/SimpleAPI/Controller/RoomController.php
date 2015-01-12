<?php
/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2015/01/12
 * Time: 16:12
 */

namespace Chatbox\Http\SimpleAPI\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;

use \Chatbox\Chatbox;

class RoomController extends BaseController{

    /**
     * @var \Chatbox\Database\RoomProvider
     */
    public $roomProvider;
    /**
     * @var \Chatbox\Database\UserProvider
     */
    public $userProvider;


    public function __construct(){
        $this->roomProvider = new \Chatbox\Database\RoomProvider();
        $this->userProvider = new \Chatbox\Database\UserProvider();


// join to room
        $user = $chatbox->join([
            "name" => "hogehoge",
        ]);

//
        $chatbox->say($user,$newMessage);

    }

    public function postCreate(Request $request){
        $srug = $request->get("srug");
        $chatbox = Chatbox::create([
            "srug" => $srug,
            "tags" => [
                "category" => "osaka",
                "topic" => ["warai","honi"]
            ]
        ],$this->roomProvider,$this->userProvider);
        return JsonResponse::create([
            "room" => $chatbox->room->toArray()
        ]);
    }

    public function postShow(){
        // fetch messages
        $messageList = $chatbox->messages();

    }
    public function actionSay(){
        return JsonResponse::create(["message"=>"this is ".__METHOD__]);
    }
    public function actionKick(){
        return JsonResponse::create(["message"=>"this is ".__METHOD__]);
    }
    public function actionHoge(){
        return JsonResponse::create(["message"=>"this is ".__METHOD__]);
    }

} 