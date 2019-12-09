<?PHP
include_once "../config.php";
class RendezVousController {

function afficherRendezVous ($RendezVous){
		echo "id: ".$RendezVous->getId()."<br>";
		echo "date du RendezVous: ".$RendezVous->getdateRV()."<br>";
		echo "Votre sujet: ".$RendezVous->getsujetRV()."<br>";
		echo "messageRV: ".$RendezVous->getmessageRV()."<br>";
	    echo "Etat: ".$RendezVous->getetat()."<br>";	
	}
	
	function ajouterRendezVous($RendezVous){
		$sql="insert into RendezVous (dateRV,sujetRV,messageRV,etat) values (:dateRV,:sujetRV,:messageRV,:etat)";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);
	
        $dateRV=$RendezVous->getdateRV();
        $sujetRV=$RendezVous->getsujetRV();
        $messageRV=$RendezVous->getmessageRV();
        $etat=$RendezVous->getetat();
		//$req->bindValue(':cin',$cin);
		$req->bindValue(':dateRV',$dateRV);
		$req->bindValue(':sujetRV',$sujetRV);
		$req->bindValue(':messageRV',$messageRV);
		
		$req->bindValue(':etat',$etat);
            $req->execute();
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
		
	}

		function afficherRendezVoustrie(){
		//$sql="SElECT * From employe e inner join formationphp.employe a on e.cin= a.cin";
		$sql="SELECT * FROM RendezVous ORDER BY etat DESC";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
	
	function afficherRendezVous1(){
		//$sql="SElECT * From employe e inner join formationphp.employe a on e.cin= a.cin";
		$sql="SELECT * FROM RendezVous ";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
		function affichernontraite(){
		$sql="SELECT  COUNT(*) as 'total' From RendezVous WHERE etat =0" ;
		
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);

		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
	function afficherconfirmer(){
		$sql="SELECT  COUNT(*) as 'total' From RendezVous WHERE etat =1" ;
		
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);

		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
		function afficherannuler(){
		$sql="SELECT  COUNT(*) as 'total' From RendezVous WHERE etat =2" ;
		
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);

		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
	function supprimerRendezVous($id){
		$sql="DELETE FROM RendezVous where id= :id";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':id',$id);
		try{
            $req->execute();
           // header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getmessage());
        }
	}
	function modifierRendezVous($RendezVous,$id){
		$sql="UPDATE RendezVous SET id=:id, dateRV=:dateRV,sujetRV=:sujetRV,messageRV=:messageRV ,etat=:etat WHERE id=:id";
		
		$db = config::getConnexion();
		//$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
try{		
        $req=$db->prepare($sql);
		$id=$RendezVous->getId();
        $dateRV=$RendezVous->getdateRV();
        $sujetRV=$RendezVous->getsujetRV();
        $messageRV=$RendezVous->getmessageRV();
        $etat=$RendezVous->getetat();
		$datas = array(':id'=>$id, ':dateRV'=>$dateRV, ':sujetRV'=>$sujetRV,':messageRV'=>$messageRV,':etat'=>$etat);
		$req->bindValue(':id',$id);
		$req->bindValue(':dateRV',$dateRV);
		$req->bindValue(':sujetRV',$sujetRV);
		$req->bindValue(':messageRV',$messageRV);
		$req->bindValue(':etat',$etat);
            $s=$req->execute();
			
           // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getmessage();
   echo " Les datas : " ;
  print_r($datas);
        }
		
	}
	function recupererRendezVous($id){
		$sql="SELECT * from RendezVous where id=$id";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getmessage());
        }
	}
	
	
}

?>