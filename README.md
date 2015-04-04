## chatbox - chatting framework


## Outline

ROOM: 会話のまとまりで複数のmessageからなる
MESSAGE: 一つのメッセージ。


## Usage

````
use Chatbox\Chatbox;

$chatbox = new Chatbox;

$room = $chatbox->createRoom();
$room->join($user);
$room->message($user,$message);
$room->getList();
$room->out();

$room = $chatbox->findRoom();
````

