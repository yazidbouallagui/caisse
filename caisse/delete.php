<?php 
include('includes/config.php');
session_start();
$username=$_SESSION['user'];
if(isset($username))
{
$id=$_GET['del'];

mysqli_query($con,"DELETE FROM caisse_kasserine_caissee WHERE id='$id'");
header('location:caisse.php');


}else
{
	header("location:index.php");
}
 ?>