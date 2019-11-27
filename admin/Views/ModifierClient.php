<?php require_once('header___.php');

include "../Cores/ClientC.php";
include "../Entities/Client.php";

$client = new ClientC();
$liste = $client->getClient($_GET['ID']);
foreach ($liste as $row) {
      # code...
}
?>
<?php 
      if(isset($_POST['Modifier']))
      {
            $clientEC=new ClientC();
                    

            $client1=new client("",$_POST['Username'],$_POST['password'],$_POST['Nom'],$_POST['Prenom'],$_POST['tel'],$_POST['email']);




            $client1C=new ClientC();
            $client1C->ModifierClient_($_POST['id'],$client1);
            header('Location: ../Views/Client___.php');

      }

?>


<section class="content-header">
	<h1>Client</h1>
	
</section>

<form method="post" action="">

      <ul class="form-style-1">
      	<li id="blabla"></li>
            <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
      	<li>
      	<label>Username</label><input value="<?php echo $row['username'] ?>" class="field-divided" type="text" name="Username">
        <label>Password</label><input value="<?php echo $row['password'] ?>" class="field-divided" type="password" name="password">
      	</li>
      	<li>
      		<label>Nom</label><input value="<?php echo $row['nom'] ?>" class="field-divided" type="text" name="Nom">
      <label>Prenom</label><input value="<?php echo $row['prenom'] ?>" class="field-divided" type="text" name="Prenom">
      	</li>
      	<li>
      		<label>Telephone</label><input value="<?php echo $row['tel'] ?>" type="text" name="tel"><br>
      <label>email</label><input value="<?php echo $row['email'] ?>" type="email" name="email"><br>
      	</li>
      	<li>
      		<input type="submit" name="Modifier" class="required"  value="Modifier">
      	</li>
      </ul>
      
</form>


<?php require_once('../footer.php'); ?>