<?PHP
include_once "../Entities/Client.php";
include_once "ClientC.php";


if (!empty($_POST['password']) and !empty($_POST['login']))
{
	      $username=$_POST['login'];
	      $password=$_POST['password'];
	        $clientEC=new ClientC();
	         $cl=$clientEC->verif($username,$password);
	         
	    	if($cl)
	    	{
	    		session_start();
	    		$_SESSION['username']=$username;
	    		$clientEC->changestatus($username);
	    		echo "<script type='text/javascript'>
		                alert('Login successful');
		                 window.location.replace(\"../Views/LoginSuccess.php\"); 
		                      </script>";

	    	}
	    	else
	    	{
	    		echo "<script type='text/javascript'>
		                alert('Incorrect details');
		                 window.location.replace(\"../Views/Client.php\"); 
		                      </script>";	
	    	}


	
}

else
{
	 echo "<script type='text/javascript'>
		                alert('vérifier les champs');
		                 window.location.replace(\"../Views/Client.php\"); 
		                      </script>";
	
}




?>