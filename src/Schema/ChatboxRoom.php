<?php
/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2015/04/04
 * Time: 14:22
 */
namespace Chatbox\Chatbox\Schema;
use Chatbox\Migrate\Schema\Column;

class ChatboxRoom extends Base{


    public function configure()
    {
        parent::configure();
        $column = [];
        $column[] = $this->colId("id",true);
        $column[] = $this->colText("data");
        $column[] = $this->colDatetime("created_at");
        $column[] = $this->colDatetime("updated_at");
        foreach($column as $col){
            $this->addColumn($col);
        }
    }


}