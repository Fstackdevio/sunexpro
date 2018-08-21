<!DOCTYPE html>
<html>
<head>
	<title>3plecoin - Reset Password</title>
	<link rel="stylesheet" href="css/app.css">
	<link rel="stylesheet" href="css/temp.css">
	<link rel="stylesheet" href="css/animate.css">
</head>
<body>
	
	<style>
		body{
			overflow: hidden;
		}
		#parent{
			margin-top: 10%;
			height: 70vh;
		}
		.child{
			padding: 2%;
		}
	</style>

	<div class="container" id='parent'>
		<div class="wrapper animated bounceIn">
			<div class="panel col-md-6 col-md-offset-3 col-sm-8 child">
				<div class="text-center text-muted">
					<h1>Hello!</h1>
					<h3>All set. Now change your password</h3>
					<br>
					<form role="form" class="col-md-6 col-md-offset-3" method="post" action="doreset.php">
		               <div class="form-group has-feedback">
		                  <input id="newpass" type="password" placeholder="New Password" autocomplete="off" class="form-control" name="newpass" />
		                  <input type="hidden" name="email" value=<?php echo "'" . $email . "'"; ?>>
		                  <span class="fa fa-envelope form-control-feedback text-muted"></span>
		               </div>
		               <div class="form-group has-feedback">
		                  <input id="newpasscon" name="newpasscon" type="password" placeholder="Confirm New Password" autocomplete="off" class="form-control"/>
		                  <input type="hidden" name="ref" value=<?php echo "'" . $ref . "'"; ?>>
		                  <span class="fa fa-envelope form-control-feedback text-muted"></span>
		               </div>
		               <button type="submit" name="change_pass" class="btn btn-inverse btn-block">Submit</button>
		            </form>
			</div>
		</div>
	</div>
</body>
</html>