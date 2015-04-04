<?php
/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2015/04/04
 * Time: 14:22
 */
namespace Chatbox\Chatbox\Schema;

use Chatbox\Migrate\Schema\Table;
use Chatbox\Migrate\Schema\Column;
use Chatbox\Migrate\Schema\BasicColumnTrait;

abstract class Base extends Table {

    use BasicColumnTrait;

}