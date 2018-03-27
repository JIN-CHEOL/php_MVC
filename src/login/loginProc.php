<?php
/**
 * Created by IntelliJ IDEA.
 * User: BBUGGE
 * Date: 2018-01-13
 * Time: 오전 6:52
 */
require_once $_SERVER['DOCUMENT_ROOT']."/login/loginController.php";
require_once $_SERVER['DOCUMENT_ROOT']."/commonController.php";

$controller = new loginController();
$common = new commonController;

$controller->login();
$param = $controller->param;
?>


