<?php


abstract class Rout
{
    /**
     * this method catch GET data , and called relevant action in Main object
     */
    static public function init(){
        $action = 'index';
        if (isset($_GET['action'])){
            $action = $_GET['action'];
        }
        $main = new Main();
        if (!method_exists($main, $action)){
            self::statusNotFound();
        }
        $main->$action();

    }

    static public function statusNotFound(){
        http_response_code(404);
        exit();
    }

    /**
     * generate url by action name
     * @param string $action
     * @return string
     */
    static public function url(string $action = 'index', string $message = ''){
        $paramsString = '';
        if (isset($message)){
            $paramsString = "&mess=$message";
        }
        return '/index.php?action='.$action. $paramsString;
    }

    static public function redirect(string $url){
        header("location: $url");
    }
}