<?PHP
include "../config.php";
class ReclamationController {

function afficherReclmation ($reclamation){
		echo "id: ".$reclamation->getId()."<br>";
		echo "reference: ".$reclamation->getReference()."<br>";
		echo "Nom Reclamation: ".$reclamation->getnomRec()."<br>";
		echo "Description: ".$reclamation->getDescription()."<br>";
		
	}
	
	function ajouterReclamation($reclamation){
		$sql="insert into reclamation (reference,nomRec,description) values (:reference,:nomRec,:description)";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);
	
        $reference=$reclamation->getReference();
        $nomRec=$reclamation->getNomRec();
        $description=$reclamation->getDescription();

		//$req->bindValue(':cin',$cin);
		$req->bindValue(':reference',$reference);
		$req->bindValue(':nomRec',$nomRec);
		$req->bindValue(':description',$description);
		
		
            $req->execute();
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
		
	}
	
	function afficherReclmations(){
		//$sql="SElECT * From employe e inner join formationphp.employe a on e.cin= a.cin";
		$sql="SElECT * From reclamation";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
	function supprimerReclamation($id){
		$sql="DELETE FROM reclamation where id= :id";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':id',$id);
		try{
            $req->execute();
           // header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	function modifierReclamation($reclamation,$id){
		$sql="UPDATE reclamation SET id=:id, reference=:reference,nomRec=:nomRec,description=:description WHERE id=:id";
		
		$db = config::getConnexion();
		//$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
try{		
        $req=$db->prepare($sql);
		$id=$reclamation->getId();
        $reference=$reclamation->getReference();
        $nomRec=$reclamation->getNomRec();
        $description=$reclamation->getDescription();
     
		$datas = array(':id'=>$id, ':reference'=>$reference, ':nomRec'=>$nomRec,':description'=>$description);
		$req->bindValue(':id',$id);
		$req->bindValue(':reference',$reference);
		$req->bindValue(':nomRec',$nomRec);
		$req->bindValue(':description',$description);
            $s=$req->execute();
			
           // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
   echo " Les datas : " ;
  print_r($datas);
        }
		
	}
	function recupererReclamation($id){
		$sql="SELECT * from reclamation where id=$id";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	
	
}

?>