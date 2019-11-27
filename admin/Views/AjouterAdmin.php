<?php require_once('header___.php');

include "../Cores/AdminC.php";

$admin = new AdminC();

?>



<section class="content-header">
	<h1>Admin</h1>
	
</section>

<form method="post" action="../Cores/AddAdmin.php">

      <ul class="form-style-1">
      	<li id="blabla"></li>
      	<li>
      	<label>Full Name</label><input class="field-divided" type="text" name="full_name">
      </li>
      <li>
        <label>Email</label><input class="field-divided" type="email" name="email">
      	</li>
      	<li>
      		<label>Password</label><input class="field-divided" type="password" name="password">
      <label>Phone</label><input class="field-divided" type="text" name="phone">
      	</li>
      	<li>
      		<label>Status</label><input class="field-divided" type="text" name="status"><br>
      	</li>
      	<li>
      		<input type="submit" name="add" class="required"  value="Creer">
      	</li>
      </ul>
      
</form>


<?php require_once('../footer.php'); ?>