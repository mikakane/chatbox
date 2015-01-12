<?php
/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2015/01/12
 * Time: 15:58
 */

namespace Chatbox\Http\SimpleAPI;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class Application {

    /**
     * @var \Silex\Application
     */
    public $silex;

    public $routeTable = [
        "room"=>[
            "get" => ["list"],
            "post" => ["create","show","say","kick","hoge"],
        ]
    ];

    public function __construct(array $param = []){
        $this->silex = new \Silex\Application($param);
    }

    public function setUp(){
        foreach($this->routeTable as $category => $methods){
            foreach($methods as $method => $actions){
                foreach($actions as $action){
                    $callable = "Chatbox\\Http\\SimpleAPI\\Controller\\";
                    $callable .= ucfirst($category)."Controller::";
                    $callable .= $method.ucfirst($action);
                    $this->silex->get("$category.$action",$callable);
                }
            }
        }
        $this->setUpErrorHandler();
    }

    public function setUpErrorHandler(){
        $this->silex->error(function (\Exception $e, $code) {
            return new JsonResponse([
                "hoge" => 'We are sorry, but something went terribly wrong.',
                "error" => $e->getMessage(),
                "class" => get_class($e),
                "code" => $e->getCode(),
                "file" => $e->getFile(),
                "file" => $e->getFile(),
                "line" => $e->getLine(),
                "trace" => $e->getTrace(),
            ],500);
        });
    }


    public function run(Request $request = null){
        $this->setUp();
        return $this->silex->run($request);
    }




} 