<?php
	session_start();
	require('./../util/functions.php');
	require_once ('./../util/hashing.php');
	$utility = new Utility();
	$auth = new Auth;
	$fields = array('currency', 'wallet_Address',  'amount');
	$error = false;

	foreach($fields AS $fieldname) { 
	  if(!isset($_POST[$fieldname]) || empty($_POST[$fieldname])) {
	    echo 'Field '.$fieldname.' missing!<br />';
	    $error = true;
	  }
	}

	$field = array('wallet_id', 'amount', 'currenty');
	if(!$error) {
		$currency = $utility->clean_input($_POST['currency']);
		$wallet_Address = $utility->clean_input($_POST['wallet_Address']);
		$amount = $utility->clean_input($_POST['amount']);

		$values = array($wallet_Address, $amount, $currency);
		if($auth->insert('affilation', $values, $field)){
			$_SESSION['message'] = "withdrawal request sent";
			$_SESSION['messagetype'] ="alert alert-success";
			$utility->redirect('./../../register.php?referal='.$referee);
		}else{
			$_SESSION['message'] = "input inserting";
			$_SESSION['messagetype'] ="alert alert-danger";
			$utility->redirect('./../../register.php?referal='.$referee);
		}
	}else{
		$_SESSION['message'] = "error withdrawal request not sent";
		$_SESSION['messagetype'] ="alert alert-danger";
		$utility->redirect('./../../register.php?referal='.$referee);
	}