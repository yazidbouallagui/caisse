<?php
include("includes/config.php");
include("includes/header.php");
session_start();
$username=$_SESSION['user'];
if (isset($username)) {
	# code...
}else{header('location:index.php');}


if(isset($_POST['submit']))
{
	$libelle=addslashes($_POST['libelle']);
	$type=addslashes($_POST['type']);
	$montant=addslashes($_POST['montant']);
	
	mysqli_query($con,"INSERT INTO `caisse_kasserine_caissee` (`libelle`, `type`, `montant`, `date`,`heure`) VALUES ('$libelle','$type','$montant', now(), now())");
	echo "success";
	header("location:caisse.php");

}
?>
<title>Ajout mouvement</title>
</head>
<body>
	<div class="container">
		<a href="caisse.php"><button class="btn btn-outline-success" style="float: left;margin-top: 20px;">Acceuil</button></a>
	<div class="login-form col-md-4 offset-md-4">
<div class="jumbotron" style="margin-top: 20px;padding-top: 20px;">
<h2 align="center"> Ajout mouvement</h2>
<form method="post" enctype="multipart/form-data">
	
	<div class="form-group">
	<label>Libelle:</label>
	<input type="text" name="libelle" class="form-control" required>
	</div>
<div class="form-group">
	<label>Type:</label>
<select name="type"  class="form-control" required>
	<option value="" ></option>
	<option value="entre" >entré</option>
	<option value="sortie">sortie</option>
	</select>	</div>
<div class="form-group">
	<label>Montant:</label>
	<input type="number" step="any" name="montant" class="form-control" required>
	</div>


</br>
<div class="form-group">
	<center><input type="submit" name="submit" value="submit" class="btn btn-success"></center>
	</div>
</form>
</div>
</div>
</div>
</body>
</html>