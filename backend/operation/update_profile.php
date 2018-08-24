<?php
	session_start();
	require('./../util/functions.php');
	require_once ('./../util/hashing.php');
	$utility = new Utility();

	$country = $utility->clean_input($_POST['country']);
	$state = $utility->clean_input($_POST['state']);
	$city = $utility->clean_input($_POST['city']);
	$address = $utility->clean_input($_POST['address']);
	$phone = $utility->clean_input($_POST['phone']);
	$gender = $utility->clean_input($_POST['gender']);

	$auth = new Auth();
	$values = array('country'=>$country, 'state'=>$state, 'city'=>$city, 'address'=>$address, 'phone'=>$phone, 'gender'=>$gender);
	$where = "_id = ". $_SESSION['user_id'];
	if($auth->update('customers', $values, $where) == true){
		$_SESSION['message'] = "Profile updated Successfully";
		$_SESSION['messagetype'] ="alert alert-success";
		$utility->redirect('./../../main/profile.php');
	}else{
		$_SESSION['message'] = "Error Updateing Profile";
		$_SESSION['messagetype'] ="alert alert-danger";
		$utility->redirect('./../../main/profile.php');	
	}

?>