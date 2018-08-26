<?php 
	session_start();
	require('functions.php');
	$Utility = new Utility();
	$Mailing = new Mailing();
	$auth = new Auth();
	// $mail = $Mailing->mail_verification('adeojo.emmanuel@lmu.edu.ng', '123456789');
	// echo $mail;
	// // if($mail == true){
	// // 	echo "mail working";
	// // }else{
	// // 	echo $mail;
	// // }
	// // $param = "emmanuel.adeojo@yahoo.comm";
	// // $sql = "SELECT * FROM customers WHERE email = :email";
	// // $action = $Utility->exists_by_id($param);
	// // echo $action;
	$referal = 'eakjhdjhd';
	$referee = 'ejhdhgdh';
	$refields = array($referal, $referee);
	$refvalue = array('referal', 'referee');
	if($auth->insert('affilation', $refvalue, $refields)){
		echo "successully registerd";
	}else{
		echo "error registering";
	}

