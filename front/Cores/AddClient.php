<?PHP
include_once "../Entities/Client.php";
include_once "ClientC.php";


if (!empty($_POST['username']) and !empty($_POST['password']) and !empty($_POST['fname']) and !empty($_POST['lname'])and !empty($_POST['tel'])and !empty($_POST['email']))
{
	      $username=$_POST['username'];
	      $email=$_POST['email'];
	        $clientEC=new ClientC();
	         $cl=$clientEC->existence($username);
	         $mail=$clientEC->existencemail($email);
	         if (!$mail) {
	          if (!$cl)
	          {
	          	session_start();
	          	//$code=$_POST['cp'];
	          	//$code=$_SESSION['cap_code'];
				//$user=$_POST['cp'];
					//$_SESSION['idUser'] = $idUser; 

					 $client1=new client("",$_POST['username'],$_POST['password'],$_POST['lname'],$_POST['fname'],$_POST['tel'],$_POST['email']);




							$client1C=new ClientC();
							$client1C->ajouterClient($client1);
							echo " 
							<script type='text/javascript'>
		             		alert('Success ! ');
		                       window.location.replace(\"../login.php\"); 
		                      
		                      </script>";

				

				/*else if($code!=$user)
				{echo " 
							<script type='text/javascript'>
		             		alert('veuillez verifier code ');
		                       window.location.replace(\"login.php\"); 
		                      
		                      </script>"

			;}*/


	         
	          }
	          else
	          {
	               
                	            echo "<script type='text/javascript'>
		                alert('username existe deja , essayer avec un autre username');
		                 window.location.replace(\"../Views/AjouterClient.php\"); 
		                      </script>";  
	          }
	      }
	      
	      	          else
	          {
	               
                	            echo "<script type='text/javascript'>
		                alert('email existe deja , essayer avec un autre email');
		                 window.location.replace(\"../Views/AjouterClient.php\"); 
		                      </script>";  
	          }


	
}

else
{
	 echo "<script type='text/javascript'>
		                alert('vérifier les champs');
		                 window.location.replace(\"../registration.php\"); 
		                      </script>";
	
}




?>