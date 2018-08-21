<?php
	if (isset($_POST['change_pass'])){
		if($_POST['newpass'] == $_POST['newpasscon']){
			if(isset($_POST['email'])  && isset($_POST['ref']) && isset($_POST['newpass'])){
				require_once './../backend/util/functions.php';

				$usr = new Utility();

				if($usr->reset($_POST['email'], array('hash' => $_POST['ref'], 'email' => $_POST['email'], 'newpass' => $_POST['newpass']))){
					include "success.html";
				} else {
					include 'errorauth.php';
					// echo "noting";
				}

			} else {
				include "errorauth.php";
			}
		}else{
			include 'errorauth.php';
		}
	} else {
		include './err.html';
	}


?>