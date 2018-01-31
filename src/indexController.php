<?php
/**
 * Created by IntelliJ IDEA.
 * User: BBUGGE
 * Date: 2018-01-07
 * Time: 오전 12:31
 */


error_reporting(E_ALL);
ini_set("display_errors", 1);

require_once '/param.php';
require_once '/config/DB.php';

class indexController
{
    public $title="";
    public $param;

    public function indexController(){
        //debugger_connect();
        //debugger_get_server_start_time();
        //debugger_start_debug();
        $this->param = new param;
    }
    public function index() {

    }



}

?>