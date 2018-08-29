<?php
	session_start();
	require('./../util/functions.php');
	require_once ('./../util/hashing.php');
	$utility = new Utility();
	$fields = array('fullname', 'subject', 'email', 'phone', 'message');

	$error = false;
	foreach($fields AS $fieldname) { 
	  if(!isset($_POST[$fieldname]) || empty($_POST[$fieldname])) {
	    echo 'Field '.$fieldname.' missing!<br />';
	    $error = true;
	  }
	}

	if(!$error) {
		$fullname = $utility->clean_input($_POST['fullname']);
		$subject = $utility->clean_input($_POST['subject']);
		$email = $utility->clean_input($_POST['email']);
		$phone = $utility->clean_input($_POST['phone']);
		$message = $utility->clean_input($_POST['message']);

		$field = array('fullname', 'subject', 'email', 'phone', 'message');
		$values =  array($fullname, $subject, $email, $phone, $message);
		if($utility->insert('mails', $field, $values)){
			$_SESSION['message'] = "message sent";
			$_SESSION['messagetype'] ="alert alert-success";
			$utility->redirect('./../../main/support.php');
		}else{
			$_SESSION['message'] = "input error";
			$_SESSION['messagetype'] ="alert alert-danger";
			$utility->redirect('./../../main/support.php');	
		}
	}else{
		echo "input error";
		$_SESSION['message'] = "input error";
		$_SESSION['messagetype'] ="alert alert-danger";
		$utility->redirect('./../../main/support.php');
	}
?>