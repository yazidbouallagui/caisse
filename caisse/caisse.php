<?php 
include ("includes/header.php");
include ("includes/config.php");
session_start();
$username=$_SESSION['user'];
date_default_timezone_set('Africa/Tunis');

if (isset($username)) {
	# code...
}else {
	header('location:index.php');
}
$sql='SELECT * FROM `caisse_kasserine_caissee`';
$result2=mysqli_query($con,$sql);
$caisse=0;
while ($retrive2=mysqli_fetch_array($result2)) {
	$id=$retrive2['id'];

$montant=$retrive2['montant'];
$type=$retrive2['type'];
if ($type=='entre') {
$caisse=$caisse+$montant;}
if ($type=='sortie') {
$caisse=$caisse-$montant;}

} 


 ?>
 <title>Caisse</title>
 <style type="text/css">
 	#body-bg{
 		background-color: #efefef; 
 	}
 </style>
</head>
<body id="body-bg">
<div class="container" style="padding-top: 10px;	background-color: #fff;	margin-top: 20px;margin-bottom: 20px;width: 1200px;">

		<h2 align="center"> Caisse</h2>
			
		<a href="caisse.php"><button class="btn btn-outline-success" style="float: left;margin-top: 20px;">Acceuil</button></a>
			<a href='change-password-admin.php'><button class='btn btn-outline-primary' style='float: left;margin-top: 20px;'>Modifier mot de pass</button></a>
		<a href='logout-admin.php'><button class='btn btn-outline-success' style='float: right;margin-top: 20px;'>Deconnexion</button></a>
		<br><br><br>
		<center><h1>Caisse:<?php echo $caisse; ?></h1>
				<a href="add.php"><button class="btn btn-outline-success" style="margin-top: 20px;">Ajouter mouvement</button></a></center>

		<br><br><br>

		<?php  	$today = date("Y-m-d");    
		echo $today;
		$result2=mysqli_query($con,"SELECT * FROM `caisse_kasserine_caissee` WHERE date='".$today."' ORDER BY type");
echo "<table class='table table-striped table-bordered table-responsive'";
echo "<tr  align='center'>";
echo "<th>N°</th>";
echo "<th>libelle</th>";
echo "<th>Type</th>";
echo "<th>Montant</th>";
echo "<th>Date</th>";
echo "<th>Heure</th>";
echo "<th>Supprimer</th>";

echo "</tr>";
$i=1;$total_aujourdhui=0;$entre=0;$sortie=0;
while ($retrive2=mysqli_fetch_array($result2)) {
$libelle=$retrive2['libelle'];
$type=$retrive2['type'];
$montant=$retrive2['montant'];
$date=$retrive2['date'];
$heure=$retrive2['heure'];
if ($type=='entre') {
$total_aujourdhui=$total_aujourdhui+$montant;
$entre=$entre+$montant;
}if ($type=='sortie') {
$total_aujourdhui=$total_aujourdhui-$montant;
$sortie=$sortie+$montant;
}
$id=$retrive2['id'];
echo "<tr  align='center'>";
echo "<th>$i</th>";
echo "<th>$libelle</th>";
echo "<th>$type</th>";
echo "<th>$montant</th>";
echo "<th>$date</th>";
echo "<th>$heure</th>";
echo "<th><a href='delete.php?del=$id' onclick=\"return confirm('Êtes-vous sûr de vouloir supprimer ce client?');\"><button  class='btn btn-danger'>Supprimer</button></a></th>";

echo "</tr>";
echo "<div>";
$i=$i+1;

} 
echo "</table>";
echo "<center><h3>Caisse aujourd'hui $total_aujourdhui où $entre entré et $sortie sortie</h3></center>";
?>
<div class="login-form col-md-4 offset-md-4">
<div class="jumbotron" style="margin-top: 20px;padding-top: 20px;">
<h2 align="center"> Afficher lhistorique</h2>
<form method="post" enctype="multipart/form-data">
	<div class="form-group">
	<label>Date de debut:</label>
	<input type="date"  name="date_debut" class="form-control" >
	</div>
	<div class="form-group">
	<label>Date de fin:</label>
	<input type="date"  name="date_fin" class="form-control" >
	</div>

</br>
<div class="form-group">
	<center><input type="submit" name="submit" value="submit" class="btn btn-success"></center>
	</div>
</form>
</div>
</div>
<?php if (isset($_POST['submit'])) {
$date_debut=$_POST['date_debut'];
$date_fin=$_POST['date_fin'];

	  	  
		
		$result2=mysqli_query($con,"SELECT * FROM `caisse_kasserine_caissee` WHERE date BETWEEN '".$date_debut."' AND '".$date_fin."' ORDER BY type");
echo "<table class='table table-striped table-bordered table-responsive'";
echo "<tr  align='center'>";
echo "<th>N°</th>";
echo "<th>libelle</th>";
echo "<th>Type</th>";
echo "<th>Montant</th>";
echo "<th>Date</th>";
echo "<th>Heure</th>";
echo "<th>Supprimer</th>";
echo "</tr>";
$i=1;$total_aujourdhui=0;$entre=0;$sortie=0;
while ($retrive2=mysqli_fetch_array($result2)) {
$libelle=$retrive2['libelle'];
$type=$retrive2['type'];
$montant=$retrive2['montant'];
$date=$retrive2['date'];
$id=$retrive2['id'];

$heure=$retrive2['heure'];
if ($type=='entre') {
$total_aujourdhui=$total_aujourdhui+$montant;
$entre=$entre+$montant;
}if ($type=='sortie') {
$total_aujourdhui=$total_aujourdhui-$montant;
$sortie=$sortie+$montant;
}
$id=$retrive2['id'];
echo "<tr  align='center'>";
echo "<th>$i</th>";
echo "<th>$libelle</th>";
echo "<th>$type</th>";
echo "<th>$montant</th>";
echo "<th>$date</th>";
echo "<th>$heure</th>";
echo "<th><a href='delete.php?del=$id' onclick=\"return confirm('Êtes-vous sûr de vouloir supprimer ce client?');\"><button  class='btn btn-danger'>Supprimer</button></a></th>";
echo "</tr>";
echo "<div>";
$i=$i+1;

} 
echo "</table>";
echo "<center><h3>Mouvement de caisse entre $date_debut et $date_fin est $total_aujourdhui où $entre entré et $sortie sortie</h3></center>";


;} ?>
	</div>
		</body>
</html>