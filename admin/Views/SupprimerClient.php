<?php 
include "../Cores/ClientC.php";

if(isset($_POST['ID']))
{
	$client = new ClientC();
	$client->supprimer($_POST['ID']);
}
header('Location: Client___.php');

?>