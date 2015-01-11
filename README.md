## chatbox - chatting framework


## SettingUp

````
use Chatbox\Chatbox;

// setting up with database
$chatbox = Chatbox::database([
    "database" => "url"
]);


// or custum construction
$room = new Custom\Room();
$user = new Custom\User();

$chatbox = new Chatbox($room,$user);
````


## Room Object

````
$room = $chatbox->room->create($param); // create new room
$room = $chatbox->room->fetch($roomSrug); // or fetch existing room

//get Messages
$messages = $room->read();
````

## User Object

````

use Chatbox\User

// fetch existing user
$user = $chatbox->user->fetch($userName);

// create new user
$user = $chatbox->user->create($userName)->asGuest();

if($user->join($room)){
    $user->say($message);
}
//one user object can only one room




````