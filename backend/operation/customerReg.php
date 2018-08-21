<?php
	session_start();
	require('./../util/functions.php');
	require_once ('./../util/hashing.php');
	$utility = new Utility();
	$auth = new Auth;
	$fields = array('referal_code', 'email',  'password', 'password_confirmation');
	$error = false; 

	foreach($fields AS $fieldname) { 
	  if(!isset($_POST[$fieldname]) || empty($_POST[$fieldname])) {
	    echo 'Field '.$fieldname.' missing!<br />';
	    $error = true;
	  }
	}

	$field = array('referal_code', 'email',  'password', 'activationStatus', 'activationCode', 'cleartext');
	if(!$error) {
		$referal = $utility->clean_input($_POST['referal_code']);
		$email = $utility->clean_input($_POST['email']);
		$pass = $utility->clean_input($_POST['password']);
		$confirm =  $utility->clean_input($_POST['password_confirmation']);
		$coderand = $auth->random_char();
		$astat = 0;
		if($pass == $confirm){
			$password = passwordHash::hash($pass);
			if($utility->validate_email($email)) {
				$values = array('referal_code' => $referal,  'email' => $email, 'password' => $password,  'activationStatus' => $astat, 'activationCode' => $coderand, 'cleartext' => $pass);
				$auth = new Auth();
				$main = $auth->register('customers', $field, $values, $referal);
				echo $main;
			}else {
				$_SESSION['message'] = "Wrong email format";
				$_SESSION['messagetype'] ="alert alert-danger";
				$utility->redirect('./../../register.php?referal='.$referal);
			}
		}else{
			$_SESSION['message'] = "password not match";
			$_SESSION['messagetype'] ="alert alert-danger";
			$utility->redirect('./../../register.php?referal='.$referal);
		}
	}else{
		$_SESSION['message'] = "input error";
		$_SESSION['messagetype'] ="alert alert-danger";
		$utility->redirect('./../../register.php?referal='.$referal);
	}

?>