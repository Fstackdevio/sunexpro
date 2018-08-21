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
					<h1>Wait!</h1>
					<h3>Just one more step to go <?php echo($email) ?></h3>
					<br>
					<form role="form" ng-model="recovery" class="col-md-6 col-md-offset-3" method="post" action="./doreset.php?">
		               <p class="text-center">Enter your new secret pin (only known by you).</p>
		               <div class="form-group has-feedback">
		                  <input id="seccode" type="password" placeholder="ENTER NEW PASSWORD" autocomplete="off" class="form-control" name="secret" />
		                  <br>
		                  <input id="seccode" type="password" placeholder="RE-ENTER NEW PASSWORD" autocomplete="off" class="form-control" name="secret" />
		                  <input type="hidden" name="email" value=<?php echo "'" . $email . "'"; ?>>
		                  <input type="hidden" name="ref" value=<?php echo "'" . $ref . "'"; ?>>
		                  <span class="fa fa-envelope form-control-feedback text-muted"></span>
		               </div>
		               <button type="submit" class="btn btn-inverse btn-block" name="send_secret">Submit</button>
		            </form>
			</div>
		</div>
	</div>
</body>
</html>