<?php require_once('header___.php');

include "../Cores/ClientC.php";

$client = new ClientC();

?>



<section class="content-header">
	<h1>Client</h1>
	
</section>

<form method="post" action="../Cores/AddClient.php">

      <ul class="form-style-1">
      	<li id="blabla"></li>
      	<li>
      	<label>Username</label><input class="field-divided" type="text" name="Username">
      </li>
      <li>
        <label>Password</label><input class="field-divided" type="password" name="password">
      	</li>
      	<li>
      		<label>Nom</label><input class="field-divided" type="text" name="Nom">
      <label>Prenom</label><input class="field-divided" type="text" name="Prenom">
      	</li>
      	<li>
      		<label>Telephone</label><input class="field-divided" type="text" name="tel"><br>
      <label>email</label><input type="email" class="field-divided" name="email"><br>
      	</li>
      	<li>
      		<input type="submit" name="add" class="required"  value="Creer Compte">
      	</li>
      </ul>
      
</form>


<?php require_once('../footer.php'); ?>