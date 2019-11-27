<?PHP
include_once "../Entities/Client.php";
include_once "ClientC.php";


if (!empty($_POST['password']) and !empty($_POST['email']))
{
	      $mail=$_POST['email'];
	      $password=$_POST['password'];
	        $clientEC=new ClientC();
	         $cl=$clientEC->verif($mail,$password);

	         $liste=$clientEC->getid($mail);
	         
	    	if($cl)
	    	{
	    		foreach ($liste as $row) {
	       	
	       }
	    		session_start();
	    		$a = $row['id'];
	    		echo "<script type='text/javascript'>
		                alert('Login successful');
		               
		                      </script>";
header('Location:../index2.php?id=' .  $a  );
		    	}
	    	else
	    	{
	    		echo "<script type='text/javascript'>
		                alert('Incorrect details');
		                 window.location.replace(\"../login.php\"); 
		                      </script>";	
	    	}


	
}

else
{
	 echo "<script type='text/javascript'>
		                alert('vérifier les champs');
		                 window.location.replace(\"../login.php\"); 
		                      </script>";
	
}




?>