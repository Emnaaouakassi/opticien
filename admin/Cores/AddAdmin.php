<?PHP
include_once "../Entities/Admin.php";
include_once "AdminC.php";


if (!empty($_POST['password']) and !empty($_POST['full_name']) and !empty($_POST['email']) and !empty($_POST['phone'])  and !empty($_POST['status']))
{
	      
	        $adminc=new AdminC();

					 $admin=new Admin("",$_POST['full_name'],$_POST['email'],$_POST['password'],$_POST['phone'],$_POST['status']);

							$adminc->ajouterAdmin($admin);
							header('Location: ../Views/Admin___.php');


	
}




?>