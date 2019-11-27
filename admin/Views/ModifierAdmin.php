<?php require_once('header___.php');

include "../Cores/AdminC.php";
include "../Entities/admin.php";

$admin = new AdminC();
$liste = $admin->getAdmin($_GET['ID']);
foreach ($liste as $row) {
      # code...
}
?>

<?php 
      if(isset($_POST['Modifier']))
      {
            $adminC=new AdminC();
                    

            $Adminnn=new Admin("",$_POST['full_name'],$_POST['email'],$_POST['password'],$_POST['phone'],$_POST['status']);


            $adminC->ModifierAdmin_($_POST['id'],$Adminnn);
            header('Location: ../Views/Admin___.php');

      }

?>

<section class="content-header">
	<h1>Admin</h1>
	
</section>

<form method="post" action="">

      <ul class="form-style-1">
            <li id="blabla"><input type="hidden" name="id" value="<?php echo $row['id'] ?>"></li>
            <li>
            <label>Full Name</label><input class="field-divided" type="text" name="full_name" value="<?php echo $row['full_name'] ?>">
      </li>
      <li>
        <label>Email</label><input class="field-divided" type="email" name="email" value="<?php echo $row['email'] ?>">
            </li>
            <li>
                  <label>Password</label><input class="field-divided" type="password" name="password" value="<?php echo $row['password'] ?>">
      <label>Phone</label><input class="field-divided" type="text" name="phone" value="<?php echo $row['phone'] ?>">
            </li>
            <li>
                  <label>Status</label><input class="field-divided" type="text" name="status" value="<?php echo $row['status'] ?>"><br>
            </li>
            <li>
                  <input type="submit" name="Modifier" class="required"  value="Modifier">
            </li>
      </ul>
      
</form>



<?php require_once('../footer.php'); ?>