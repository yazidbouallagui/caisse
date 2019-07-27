<?php

include("includes/header.php");
include("includes/config.php");
include("includes/functions.php");
session_start();
$msg="";
$msg2="";
$username='';
	$password='';
if(isset($_POST['submit']))
{
	$username=$_POST['username'];
	$password=$_POST['password'];
	$password=md5($password);
		if(empty($username)&& $username!='admin'){
		$msg='<div class="error">s"il vous plais saisissez votre nom dutilisateur</div>';
	}elseif (empty($password)) {
		$msg2='<div class="error">s"il vous plais saisissez votre mot de pass</div>';
	}else {
		$pass=mysqli_query($con,"SELECT password FROM caisse_kasserine_admin WHERE username='admin'");
		$pass_w=mysqli_fetch_array($pass);
		$dpass=$pass_w['password'];
		if ($password!==$dpass) {
			$msg2='<div class="error">Username ou mot de pass incorrect</div>';
		}else{
			$_SESSION['user']=$username;
		header("location:caisse.php"); 
		}

	} 

}
	?>
	<title>Admin login</title>
	<style type="text/css">
		.error{color: red;}
	</style>
</head>
<body>
	<div class="container" >
		<div class="login-form col-md-4 offset-md-4">
			<div class="jumbotron" style="margin-top: 50px; padding-top: 20px;padding-bottom: 10px;">
				<center><h3>Authentification</h3></center><br>
				<form method="POST">
					<div class="form-group" >
						<label>Username :</label>
						<input type="text" name="username" class="form-control" >
						<?php  echo $msg; ?>
					</div>
					<div class="form-group">
						<label>Mot de Pass :</label>
						<input type="password" name="password" class="form-control">
						<?php  echo $msg2; ?>
					</div>
					<br>
					<div class="form-group">

	
	<center><input type="submit" name="submit" value="Login" class="btn btn-success"></center>
	</div>
				</form>
				
			</div>
			
		</div>

	</div>


</body>
</html>