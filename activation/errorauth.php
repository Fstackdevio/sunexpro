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
					<h1 class="text-danger">Oops!</h1>
					<h4>Something didn't go right.</h4>
					<br>
					<form role="form" class="col-md-6 col-md-offset-3">
		               <button type="submit" class="btn btn-danger btn-block" onclick="window.history.back()">Click here to go back</button>
		               <br>
		               <span class="text-muted">
		               	Or try clicking the link that was sent to your email again.
		               </span>
		            </form>
			</div>
		</div>
	</div>
</body>
</html>