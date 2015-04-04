<?php
/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2015/04/04
 * Time: 14:22
 */
namespace Chatbox\Chatbox\Schema;
use Chatbox\Migrate\Schema\Column;

class ChatboxMember extends Base{


    public function configure()
    {
        parent::configure();
        $column = [];
        $column[] = $this->colId("id",true);
        $column[] = $this->colId("room_id");
        $column[] = $this->colId("user_id");
        $column[] = $this->colBool("is_kicked");
        $column[] = $this->colDatetime("created_at");
        $column[] = $this->colDatetime("updated_at");
        foreach($column as $col){
            $this->addColumn($col);
        }
    }


}