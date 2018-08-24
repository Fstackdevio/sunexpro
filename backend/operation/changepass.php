<?php
	session_start();
	require('./../util/functions.php');
	require_once ('./../util/hashing.php');
	$utility = new Utility();

	$oldpass = $utility->clean_input($_POST['oldpass']);
	$newpass = $utility->clean_input($_POST['newpass']);
	$renewpass = $utility->clean_input($_POST['renewpass']);

	$auth = new Auth();
	$main = $auth->logintest($_SESSION['user_id'], $oldpass, 'customers');
	if($main == "success"){
		if($newpass === $renewpass){
			$hashed = passwordHash::hash($newpass);
			$auth = new Auth();
			$values = array('password'=>$hashed, 'cleartext'=>$newpass);
			$where = "_id = ". $_SESSION['user_id'];
			if($auth->update('customers', $values, $where) == true){
				$_SESSION['message'] = "Password updated Successfully";
				$_SESSION['messagetype'] ="alert alert-success";
				$utility->redirect('./../../main/change-password.php');
			}else{
				$_SESSION['message'] = "Error Updateing Password";
				$_SESSION['messagetype'] ="alert alert-danger";
				$utility->redirect('./../../main/change-password.php');	
			}
		}else{
			$_SESSION['message'] = "Error password Not matched";
			$_SESSION['messagetype'] ="alert alert-danger";
			$utility->redirect('./../../main/change-password.php');	
		}
	}else{
		$_SESSION['message'] = $main;
		$_SESSION['messagetype'] ="alert alert-danger";
		$utility->redirect('./../../main/change-password.php');
	}

	

?>