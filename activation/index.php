<?php
	require_once './../backend/util/functions.php';


	$user = new Utility();

	if(isset($_GET['action']) && isset($_GET['token'])){
		$cont = $_GET['action'];
		$ref = $_GET['token'];
		$email = $_GET['email'];
		
		switch ($cont){
			case 'reset':
				include './authcomplete.php';
				break;

			case 'activate':
				if(!empty($_GET['token']) && !empty($_GET['email'])){
					$final = $user->activate_acc(array('email' => $_GET['email'], 'ref' => $_GET['token']));
					$final;

					if ($final == 'done') {
						$feed = "Success";
						$fbody = "Your account was successfully verified. Please proceed to the login page";
						$ftype = "text-success";

					} elseif ($final == "couldn't verify") {
						$feed = "Error";
						$fbody = "An error occurred and we couldn't verify your email. Please retry clicking the link sent to your email or contact our support agent at info@tbcconverter.net";
						$ftype = 'text-danger';
					} elseif($final == 'already verified'){
						$feed = "Error";
						$fbody = "Oops! It seems that email has already been verified. Please proceed to login";
						$ftype = 'text-danger';
					} else {
						$feed = "Error";
						$fbody = $final;
						$ftype = 'text-danger';
					}
					include './mult.php';
				} else {
					include('./err.html');	
				}
				break;
			
			default:
				include('./err.html');
				break;
		}
	} elseif (isset($_POST['send_secret']) && isset($_POST['secret'])) {
		echo $_GET['email'];

	} else{
		include('./err.html');		
	}

?>