<?PHP
include "../admin/Promotion/config.php";
class promotionC {

	
function afficherpromotions ($promotion){
		echo "ref: ".$promotion->getref()."<br>";
		echo "nomp: ".$promotion->getnomp()."<br>";
		echo "prixi: ".$promotion->getprixi()."<br>";
		echo "pourcentage: ".$promotion->getpourcentage()."<br>";
		echo "datef: ".$promotion->getdatef()."<br>";
	}
	function afficherpromotion(){
		//$sql="SElECT * From promotion e inner join formationphp.promotion a on e.ref= a.ref";
		$sql="SElECT * From promotion";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
		function ajouterpromotions($promotion){
		$sql="insert into promotion (ref,nomp,prixi,pourcentage,datef) values (:ref,:nomp,:prixi,:pourcentage,:datef)";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);
		
        $ref=$promotion->getref();
        $nomp=$promotion->getnomp();
        $prixi=$promotion->getprixi();
        $pourcentage=$promotion->getpourcentage();
        $datef=$promotion->getdatef();
		$req->bindValue(':ref',$ref);
		$req->bindValue(':nomp',$nomp);
		$req->bindValue(':prixi',$prixi);
		$req->bindValue(':pourcentage',$pourcentage);
		$req->bindValue(':datef',$datef);
		
            $req->execute();
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
		
	}

	function modifierpromotion($promotion,$ref){
		$sql="UPDATE promotion SET ref=:refn, nomp=:nomp,prixi=:prixi,pourcentage=:pourcentage,datef=:datef WHERE ref=:ref";
		
		$db = config::getConnexion();
		//$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
try{		
        $req=$db->prepare($sql);
		$refn=$promotion->getref();
        $nomp=$promotion->getnomp();
        $prixi=$promotion->getprixi();
        $pourcentage=$promotion->getpourcentage();
        $datef=$promotion->getdatef();
		$datas = array(':refn'=>$refn,':ref'=>$ref,':nomp'=>$nomp,':prixi'=>$prixi,':pourcentage'=>$pourcentage,':datef'=>$datef);
		$req->bindValue(':refn',$refn);
		$req->bindValue(':ref',$ref);
		$req->bindValue(':nomp',$nomp);
		$req->bindValue(':prixi',$prixi);
		$req->bindValue(':pourcentage',$pourcentage);
		$req->bindValue(':datef',$datef);
		
		
            $s=$req->execute();
			
           // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
   echo " Les datas : " ;
  print_r($datas);
        }
		
	}
	function supprimerpromotion($ref){
		$sql="DELETE FROM promotion where ref= :ref";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':ref',$ref);
		try{
            $req->execute();
           // header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}

	function recupererpromotion($ref){
		$sql="SELECT * from promotion where ref=$ref";
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