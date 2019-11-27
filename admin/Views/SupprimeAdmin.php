<?php 
include "../Cores/AdminC.php";

if(isset($_POST['ID']))
{
	$admin = new AdminC();
	$admin->supprimer($_POST['ID']);
}
header('Location: Admin___.php');

?>