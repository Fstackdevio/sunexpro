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

	$field = array('referal_code', 'fullname', 'email',  'password', 'activationStatus', 'activationCode', 'cleartext');
	if(!$error) {
		$referee = isset($_POST['referal_code']) ? $_POST['referal_code'] : '';
		// $referee = $utility->clean_input($_POST['referal_code']);
		$fullname = $utility->clean_input($_POST['fullname']);
		$email = $utility->clean_input($_POST['email']);
		$pass = $utility->clean_input($_POST['password']);
		$confirm =  $utility->clean_input($_POST['password_confirmation']);
		$coderand = $auth->random_char();
		$referal = $auth->random_char_digit();
		$astat = 0;
		if($pass == $confirm){
			$password = passwordHash::hash($pass);
			if($utility->validate_email($email)) {
				$values = array('referal_code' => $referal, 'fullname' => $fullname,  'email' => $email, 'password' => $password,  'activationStatus' => $astat, 'activationCode' => $coderand, 'cleartext' => $pass);
				$auth = new Auth();
				$main = $auth->register('customers', $field, $values, $referal, $coderand, $referee);
				if($referee !== ''){
					$refields = array($referal, $referee);
					$refvalue = array('referal', 'referee');
					if($auth->insert('affilation', $refvalue, $refields)){

					}else{
						$_SESSION['message'] = "error inserting";
						$_SESSION['messagetype'] ="alert alert-danger";
						$utility->redirect('./../../register.php?referal='.$referee);
					}
				}
				echo $main;
			}else {
				$_SESSION['message'] = "Wrong email format";
				$_SESSION['messagetype'] ="alert alert-danger";
				$utility->redirect('./../../register.php?referal='.$referee);
			}
		}else{
			$_SESSION['message'] = "password not match";
			$_SESSION['messagetype'] ="alert alert-danger";
			$utility->redirect('./../../register.php?referal='.$referee);
		}
	}else{
		$_SESSION['message'] = "input error";
		$_SESSION['messagetype'] ="alert alert-danger";
		$utility->redirect('./../../register.php?referal='.$referee);
	}

?>