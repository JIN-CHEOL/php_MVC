<?php
/**
 * Created by IntelliJ IDEA.
 * User: BBUGGE
 * Date: 2018-01-07
 * Time: 오후 3:51
 */

    require_once $_SERVER['DOCUMENT_ROOT']."/login/loginController.php";

    $controller = new loginController();
    $controller->logoutProc();
?>

