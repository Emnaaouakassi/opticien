<?php 
include_once "../config.php";
class ClientC {

	function ModifierClient_($id,$client)
	{
	$sql="update clients set username=:username,password=:password,nom=:nom,prenom=:prenom,tel=:tel,email=:email where id='$id'";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);
        $username=$client->getUsername();
        $password=$client->getPassword();
        $nom=$client->getNom();
        $prenom=$client->getPrenom();
        $tel=$client->getTel();
        $email=$client->getEmail();



		$req->bindValue(':username',$username);
		$req->bindValue(':password',$password);
		$req->bindValue(':nom',$nom);
		$req->bindValue(':prenom',$prenom);
		$req->bindValue(':tel',$tel);
		$req->bindValue(':email',$email);
		
            $req->execute();
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
    }

	function getClient($id)
	{
		$sql = "select * from clients where ID=$id";
		$db = config::getConnexion();
		try{
				$liste=$db->query($sql);
				return $liste;
			}
	        catch (Exception $e){
	            die('Erreur: '.$e->getMessage());
	        }
	}

	function supprimer($id)
	{
		$sql = 'delete from clients where id = :id';
		$db = config::getConnexion();
		try
		{
			$req = $db->prepare($sql);
			$req->bindValue(':id',$id);
			$req->execute();
		}
		catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}

	function afficher()
	{	
		$sql = "select * from clients";
		$db = config::getConnexion();
		try
		{
			$liste = $db->query($sql);
			return $liste;
		}
		catch(Exception $e)
		{
			die('Erreur '.$e->getMessage());
		}
	}

function ajouterClient($client){




		$sql="insert into clients (id,username,password,nom,prenom,tel,email,status) values (null,:username,:password,:nom,:prenom,:tel,:email,0)";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);
        $username=$client->getUsername();
        $password=$client->getPassword();
        $nom=$client->getNom();
        $prenom=$client->getPrenom();
        $tel=$client->getTel();
        $email=$client->getEmail();

/*$message ="clik this link to confim your code http://http://localhost/integration/projet11/views/frontend/emailconfirm.php?username=".$username."&code=". $code."";

		if (mail($email,"EMAIL confirmation",$message,"From: BandB.storeB@gmail.com"))
		{
				echo "<script type='text/javascript'>
		             		alert('Registration Complete! Please confirm your email address  ');
		                      window.location.replace(\"http://localhost/integration/projet11/views/frontend/login.php\");
		                      </script>";
			//alert('Registration Complete! Please confirm your email address ');
		//echo '"Registration Complete! Please confirm your email address"';
		}
	//"zeczeczc;
	else
	{  
		echo "check your mail";
			
        }*/




		$req->bindValue(':username',$username);
		$req->bindValue(':password',$password);
		$req->bindValue(':nom',$nom);
		$req->bindValue(':prenom',$prenom);
		$req->bindValue(':tel',$tel);
		$req->bindValue(':email',$email);
		
            $req->execute();
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
		
	}
		function changestatus($username)
		{	$status=1;
			$sql="UPDATE clients SET  status=:status WHERE username=:username";
			$db = config::getConnexion();
		//$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
try{		
        $req=$db->prepare($sql);
        
		
		$req->bindValue(':username',$username);
		$req->bindValue(':status',$status);
		
            $s=$req->execute();
			
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
        }
		}



		/*function verifstatus($username)
		{
			$db = config::getConnexion();
			$result = $db->query("SELECT * FROM clients WHERE username='".$username."' ");
			foreach ($result as $key) 
				return $key['status'];
			
			endforeach;
		}*/



		function modifierClient($client,$id){
		$sql="UPDATE clients SET  username=:username,password=:password,email=:email WHERE id=:id";
		
		$db = config::getConnexion();
		//$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
try{		
        $req=$db->prepare($sql);
        $username=$client->getUsername();
        $password=$client->getPassword();
        $email=$client->getEmail();
        $adress=$client->getAdress();
		//$datas = array(':id_client'=>$id_client, ':email'=>$email,':username'=>$username,':password'=>$password,':tel'=>$tel,':adress'=>$adress);
		$req->bindValue(':id',$id);
		$req->bindValue(':username',$username);
		$req->bindValue(':password',$password);
		
		$req->bindValue(':email',$email);
		
		
		
            $s=$req->execute();
			
           // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
  // echo " Les datas : " ;
  //print_r($datas);
        }
		
	}




	 function existence($username)
    {
		$db = config::getConnexion();
		
       $result = $db->query("SELECT * FROM clients WHERE username='".$username."' ");
        $rows = $result->fetch();
        return $rows;
    }
    	 function existencemail($email)
    {
		$db = config::getConnexion();
		
       $result = $db->query("SELECT * FROM clients WHERE email='".$email."' ");
        $rows = $result->fetch();
        return $rows;
    }
        	 function fogotnom($nom)
    {
		$db = config::getConnexion();
		
       $result = $db->query("SELECT * FROM client WHERE nom='".$nom."' ");
        $rows = $result->fetch();
        return $rows;
    }
            	 function fogotprenom($prenom)
    {
		$db = config::getConnexion();
		
       $result = $db->query("SELECT * FROM client WHERE prenom='".$prenom."' ");
        $rows = $result->fetch();
        return $rows;
    }        	 

    function fogottel($tel)
    {
		$db = config::getConnexion();
		
       $result = $db->query("SELECT * FROM client WHERE tel='".$tel."' ");
        $rows = $result->fetch();
        return $rows;
    }        	 

	function afficherClient($email){
		//$sql="SElECT * From employe e inner join formationphp.employe a on e.id_client= a.id_client";
		$sql="SELECT * FROM client WHERE email='".$email."'";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
	function verif($username,$password)
	{
		$db = config::getConnexion();
		$req=$db->query("SELECT * from clients where username='".$username."'");
		$requete=$req->fetchAll();
		foreach ($requete as $table):
		if(($table['username']==$username) && ($table['password']==$password))
		{
			return true;
		}
		else
		{
			return false;
		}
	endforeach;
	}
/*
     function check($username,$password)
	{
		$list=[];
		$db = config::getConnexion();
		$req=$db->query("SELECT * from client where username='".$username."'");
		$requete=$req->fetchAll();
		foreach ($requete as $table):
		if(($table['username']==$username) && ($table['password']==$password))
		{
			if(!isset($_SESSION))
			{
				session_start();
			}
			if(!isset($_SESSION['client']))
			{
				$_SESSION['client']=array();
			}
		$list[]=new client($table['id_client'],$table['username'],$table['password'],$table['nom'],$table['prenom'],$table['tel'],$table['email'],$table['adress'],$table['etat'],$table['date_desactivation'],$table['active'],$table['code'],$table['datelimite']);

		}
		endforeach;
		return $list;
	}


	     function checkL($username)
	{
		$list=[];
		$db = config::getConnexion();
		$req=$db->query("SELECT * from client where username='".$username."'");
		$requete=$req->fetchAll();
		foreach ($requete as $table):
		if(($table['username']==$username))
		{
			if(!isset($_SESSION))
			{
				session_start();
			}
			if(!isset($_SESSION['client']))
			{
				$_SESSION['client']=array();
			}
		$list[]=new client($table['id_client'],$table['username'],$table['password'],$table['nom'],$table['prenom'],$table['tel'],$table['email'],$table['adress'],$table['etat'],$table['date_desactivation'],$table['active'],$table['code'],$table['datelimite']);

		}
		endforeach;
		return $list;
	}

	     public static function updateEtat($username)
    {
      $db = config::getConnexion();
      $r = $db->query("UPDATE client set etat=1 WHERE username='".$username."'");
     
    }

     public static function etat2($u)
    {
      $db = config::getConnexion();
      $r = $db->query("UPDATE client set etat=2 WHERE username='".$u."'");
    }

    public static function dl($username)
    {
   	
        $db = config::getConnexion();
        $dated = date('Y-m-d',strtotime('+1 year'));
        $req= $db->prepare("UPDATE client set datelimite=:datedd WHERE  
          username=:username");
        $req->bindParam(':datedd',$dated); 
        $req->bindParam(':username',$username);
        $req->execute();
    }

        public static function desactiver($username)
      {
        
        $db = config::getConnexion();
        $dated = date('Y-m-d');
        $req= $db->prepare("UPDATE client set etat=0,date_desactivation=:datedd WHERE  
          username=:username");
        $req->bindParam(':datedd',$dated); 
        $req->bindParam(':username',$username);
        $req->execute();

    }

*/



































   

/*
	function modifierEmploye($employe,$id_client){
		$sql="UPDATE employe SET id_client=:id_clientn, nom=:nom,prenom=:prenom,nbHeures=:nbH,tarifHoraire=:tarifH WHERE id_client=:id_client";
		
		$db = config::getConnexion();
		//$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
try{		
        $req=$db->prepare($sql);
		$id_clientn=$employe->getid_client();
        $nom=$employe->getNom();
        $prenom=$employe->getPrenom();
        $nb=$employe->getNbHeures();
        $tarif=$employe->getTarifHoraire();
		$datas = array(':id_clientn'=>$id_clientn, ':id_client'=>$id_client, ':nom'=>$nom,':prenom'=>$prenom,':nbH'=>$nb,':tarifH'=>$tarif);
		$req->bindValue(':id_clientn',$id_clientn);
		$req->bindValue(':id_client',$id_client);
		$req->bindValue(':nom',$nom);
		$req->bindValue(':prenom',$prenom);
		$req->bindValue(':nbH',$nb);
		$req->bindValue(':tarifH',$tarif);
		
		
            $s=$req->execute();
			
           // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
   echo " Les datas : " ;
  print_r($datas);
        }
		
	}



	function afficherEmploye ($employe){
		echo "id_client: ".$employe->getid_client()."<br>";
		echo "Nom: ".$employe->getNom()."<br>";
		echo "Prénom: ".$employe->getPrenom()."<br>";
		echo "tarif heure: ".$employe->getTarifHoraire()."<br>";
		echo "nb heures: ".$employe->getNbHeures()."<br>";
	}
	function calculerSalaire($employe){
		echo $employe->getNbHeures() * $employe->getTarifHoraire();
	}
*/
}

 ?>