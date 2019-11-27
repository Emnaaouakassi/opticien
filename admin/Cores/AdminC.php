<?php 
include_once "../config.php";
class AdminC {

	function ModifierAdmin_($id,$admin)
	{
	$sql="update admin set full_name=:full_name,email=:email,password=:password,phone=:phone,status=:status where id='$id'";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);

		$req->bindValue(':full_name',$admin->getfullname());
		$req->bindValue(':email',$admin->getemail());
		$req->bindValue(':password',$admin->getpassword());
		$req->bindValue(':phone',$admin->getphone());
		$req->bindValue(':status',$admin->getstatus());
		
            $req->execute();
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
    }

	function getAdmin($id)
	{
		$sql = "select * from admin where id=$id";
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
		$sql = 'delete from admin where id = :id';
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
		$sql = "select * from admin";
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

	function ajouterAdmin($admin){




		$sql="insert into admin (id,full_name,email,password,phone,status) values (null,:full_name,:email,:password,:phone,:status)";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);

		$req->bindValue(':full_name',$admin->getfullname());
		$req->bindValue(':email',$admin->getemail());
		$req->bindValue(':password',$admin->getpassword());
		$req->bindValue(':phone',$admin->getphone());
		$req->bindValue(':status',$admin->getstatus());
		
            $req->execute();
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
		
	}
}

 ?>