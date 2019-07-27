<?php 
include ("includes/header.php");
include ("includes/config.php");
session_start();
$username=$_SESSION['user'];
$msg='';
if (isset($username) && ($username=='admin')) {
	# code...
}else
{
	header('location:index.php');
}
$result=mysqli_query($con,"SELECT password FROM caisse_kasserine_admin WHERE username='admin'");
$retrive=mysqli_fetch_array($result);
$oldpass=$retrive['password'];

if (isset($_POST['submit'])) {
	$oldpassword=$_POST['oldpassword'];
	$pass=$_POST['pass'];
	$cpass=$_POST['cpass'];
	$oldpassword=md5($oldpassword);
	$pass=md5($pass);
	$cpass=md5($cpass);
if ($oldpass==$oldpassword) {

	if ($pass==$cpass) {
		mysqli_query($con,"UPDATE caisse_kasserine_admin SET password='$pass' WHERE username='$username'");
		$msg='<div class"error">Mot de pass changé</div>';

	}else {$msg='<div class"error">Confirmation mot de pass non identique</div>';}

}else {$msg='<div class"error">Ancien mot de pass incorrect</div>';}

}
 ?>
 <title>Changer mot de pass - administrateur</title>
 <style type="text/css">
 	#body-bg{
 		background-color: #efefef; 
 	}
 </style>
</head>
<body id="body-bg">
<div class="container" style="padding-top: 10px;	background-color: #fff;	margin-top: 20px;margin-bottom: 20px;width: 1200px;">
	<a href="caisse.php"><button class="btn btn-outline-success" style="float: left;margin-top: 20px;">Retour</button></a>
	<div class="box">
	<div class="col-md-4 offset-md-4">
		<h2 align="center">Changer mot de pass</h2>
		<?php echo $msg; ?>
		<br>
		<form method="post">
			<div class="form-group">
				<label>Ancien mot de pass</label>
				<input type="password" name="oldpassword" class="form-control" required>
			</div>
			<div class="form-group">
				<label>Nouvel mot de pass</label>
				<input type="password" name="pass" class="form-control" required>
			</div>
			<div class="form-group">
				<label>Confirmer nouvel mot de pass </label>
				<input type="password" name="cpass" class="form-control" required>
			</div>
		<center><button class="btn btn-success" name="submit">Changer</button></center>
		</form>
	</div>
	</div>


</div>



</body>
</html>