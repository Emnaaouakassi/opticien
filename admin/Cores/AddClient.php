<?PHP
include_once "../Entities/Client.php";
include_once "ClientC.php";


if (!empty($_POST['password']) and !empty($_POST['Nom']) and !empty($_POST['Prenom']) and !empty($_POST['tel'])  and !empty($_POST['email']))
{
	      $username=$_POST['Username'];
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

					 $client1=new client("",$_POST['Username'],$_POST['password'],$_POST['Nom'],$_POST['Prenom'],$_POST['tel'],$_POST['email']);




							$client1C=new ClientC();
							$client1C->ajouterClient($client1);
							header('Location: ../Views/Client___.php');

				

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
		                 window.location.replace(\"../Views/AjouterClient.php\"); 
		                      </script>";
	
}




?>