<?php require_once('header___.php');

include "../Cores/AdminC.php";

$admin = new AdminC();
$liste = $admin->afficher();

?>

<section class="content-header">
	<h1>Admin</h1>
</section>

<table class="responstable">
	<tr>
		<th>ID</th>
		<th>Full Name</th>
		<th>Email</th>
		<th>Phone</th>
		<th>Password</th>
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
		<td><?php echo $row['full_name']; ?></td>
		<td><?php echo $row['email']; ?></td>
		<td><?php echo $row['phone']; ?></td>
		<td><?php echo md5($row['password']); ?></td>
		<td><?php echo $row['status']; ?></td>
		
		<td><a href="ModifierAdmin.php?ID=<?PHP echo $row['id']; ?>">	

		<input type="button" name="Update" value="Modifier"></a></td>

		<td><form method="POST" action="SupprimeAdmin.php">

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
	<h1><a href="AjouterAdmin.php"> Ajouter Admin</a></h1>
</section>


<?php require_once('../footer.php'); ?>