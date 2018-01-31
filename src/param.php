<?php
/**
 * Created by IntelliJ IDEA.
 * User: BBUGGE
 * Date: 2018-01-07
 * Time: 오전 12:16
 */
session_start();

error_reporting(E_ALL);
ini_set("display_errors", 1);
//require_once "./memberDTO.php";
class param
{
    public function get($name) {    return isset($_GET[$name]) ? $_GET[$name] : null;}
    public function post($name) {    return isset($_POST[$name]) ? $_POST[$name] : null;}
    public function get_post($name) {    return $this->get($name) ? $this->get($name) : $this->post($name);}
    public function session($name) { return isset($_SESSION[$name]) ? $_SESSION[$name] : null;}
}

?>