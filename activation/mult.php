<!DOCTYPE html>
<html>
<head>
	<title>3plecoin - Account verification</title>
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
		<div class="wrapper animated wobble">
			<div class="panel col-md-6 col-md-offset-3 col-sm-8 child">
				<div class="text-center text-muted">
					<h1 class="<?php echo $ftype ?>"><?php echo $feed ?></h1>
					<br>
					<h4><?php
						echo $fbody . "."
					?></h4>
					

					<a href='./../' style='color: white;'><div style='background:cornflowerblue;padding:1.5%; color: white; max-width: 60%;text-align: center;margin:1em; margin-left: 20%;border-radius: 2px;' class="pv">Return to login page</div></a>
			</div>
		</div>
	</div>
</body>
</html>