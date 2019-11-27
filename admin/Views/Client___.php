<?php require_once('header___.php');

include "../Cores/ClientC.php";

$client = new ClientC();
$liste = $client->afficher();

?>

<section class="content-header">
	<h1>Client</h1>
</section>

<table class="responstable">
	<tr>
		<th>ID</th>
		<th>Username</th>
		<th>Password</th>
		<th>Nom</th>
		<th>Prenom</th>
		<th>Tel°</th>
		<th>Email</th>
		<th>Status</th>
		<th>Modifier</th>
		<th>Suprprimer</th>
	</tr>
	<?php
	foreach($liste as $row)
	{
	?>

	<tr>
		<td><?php echo $row['id']; ?></td>
		<td><?php echo $row['username']; ?></td>
		<td><?php echo md5($row['password']); ?></td>
		<td><?php echo $row['nom']; ?></td>
		<td><?php echo $row['prenom']; ?></td>
		<td><?php echo $row['tel']; ?></td>
		<td><?php echo $row['email']; ?></td>
		<td><?php echo $row['status']; ?></td>
		
		<td><a href="ModifierClient.php?ID=<?PHP echo $row['id']; ?>">	

		<input type="button" name="Update" value="Modifier"></a></td>

		<td><form method="POST" action="SupprimerClient.php">

		<input type="submit" name="Delete" value="Supprimer">
		
		<input type="hidden" value="<?PHP echo $row['id']; ?>" name="ID">
		</form>
		</td>
	</tr>

	<?php 

	} ?>
</table>
<br>
<section class="content-header">
	<h1><a href="AjouterClient.php"> Ajouter Client</a></h1>
</section>


<?php require_once('../footer.php'); ?>