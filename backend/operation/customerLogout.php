<?php
    require_once ('./../util/functions.php');
    require_once ('./../util/hashing.php');
    $Auth = new Auth();
    session_start();
    if($Auth->logout()){
        $_SESSION['message'] = "Your Account Has Been logout";
		$_SESSION['messagetype'] ="alert alert-warning";
		$utility->redirect('./../../main/profile.php');
    }
    exit;
?>