
<?php
include '../../core/produitC.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer-master\src\Exception.php';
require 'PHPMailer-master\src\PHPMailer.php';
require 'PHPMailer-master\src\SMTP.php';
$instance = new ProduitC();



if(isset($_POST['ajouter'])&&isset($_POST['produits'])&&isset($_POST['Pourcentage']) ){
    	$referance=$_POST['produits'];
    	$pourcentage=$_POST['Pourcentage'];
    	$resultname=$instance->affichernomProduit($_POST['produits']);
$name=$resultname->fetch();

        
    	$sql = "INSERT INTO promotion (id_product,pourcentage)
VALUES ('$referance','$pourcentage')";
$c=config::getConnexion();
$c->exec($sql);
 $query = "UPDATE produit SET promotion = 1 WHERE referance=".$referance;
$c->exec($query);
if(!isset($_POST['email']) && !$_POST['email']== 'oui' ){

    header('Location: modifierpromotion.php');
        }
    }

$result=$instance->afficherProduitsanspromotion();
$liste=$result->fetchall();



if(isset($_POST['email']) && $_POST['email']== 'oui' ){

 $sql1 = "SELECT email FROM `client` ";
 $c=config::getConnexion();
$result = $c->query($sql1);
$listemail = $result->fetchall();
$mail = new PHPMailer(true);

//Send mail using gmail

    $mail->IsSMTP(); // telling the class to use SMTP
    $mail->SMTPAuth = true; // enable SMTP authentication
    $mail->SMTPSecure = "ssl"; // sets the prefix to the servier
    $mail->Host = "smtp.gmail.com"; // sets GMAIL as the SMTP server
    $mail->Port = 465; // set the SMTP port for the GMAIL server
    $mail->Username = "adem.khechimi@esprit.tn"; // GMAIL username
    $mail->Password = "adamlol2010"; // GMAIL password


//Typical mail data
    foreach ($listemail as $email) {
      
$mail->AddAddress($email['email']);
}

$mail->AddAddress('adem.khechimi@esprit.tn');
$mail->SetFrom('adem.khechimi@esprit.tn');
$mail->Subject = "My Subject";
$mail->Body = "Le produit ".$name['nom']." est de pourcentage de promotion " .$_POST['Pourcentage']. "%";


    $mail->Send();
 header('Location: modifierpromotion.php');

}






include 'header.php' ;

?>

<section id="main-content">
      <section class="wrapper">
<div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel">
              <h4 class="mb"><i class="fa fa-angle-right"></i> Ajouter promotions</h4>
              <form class="form-horizontal style-form" method="POST">
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Produit</label>
                  <div class="col-sm-10">
                   <select name="produits" id="produits" required>
                   	<?php
                   		foreach ($liste as $p ) {
                   			echo '<option name="produit" value="'.$p["referance"].'"  >'.$p["nom"].'</option>';
                   		}


                   	?>
                   	
                   </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Pourcentage</label>
                  <div class="col-sm-10">
                    <input name="Pourcentage" type="text" class="form-control" pattern="[0-9]{2}" title="le pourcentage doit etre entre 0 et 100 ." required>
                  
                  </div>
                </div>

           
                 
                <button name="ajouter" type="submit" class="btn btn-theme">Ajouter</button>
                             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Informer les utilisateurs de cette promotion  &nbsp;&nbsp;&nbsp;<input type="checkbox"  name="email" value="oui">
              </form>
            </div>
          </div>
          <!-- col-lg-12-->
        </div>
      </section></section>
<script src="lib/jquery/jquery.min.js"></script>
<script type="text/javascript" language="javascript" src="lib/advanced-datatable/js/jquery.js"></script>
<script src="lib/bootstrap/js/bootstrap.min.js"></script>
<script class="include" type="text/javascript" src="lib/jquery.dcjqaccordion.2.7.js"></script>
<script src="lib/jquery.scrollTo.min.js"></script>
<script src="lib/jquery.nicescroll.js" type="text/javascript"></script>
<script type="text/javascript" language="javascript" src="lib/advanced-datatable/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="lib/advanced-datatable/js/DT_bootstrap.js"></script>
<!--common script for all pages-->
<script src="lib/common-scripts.js"></script>
<!--script for this page-->
<script type="text/javascript">