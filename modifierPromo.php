<?PHP
include "../../entities/produit.php";
include "../../core/produitC.php";


if (isset($_POST['modifier']))
{

    $db = config::getConnexion();
    $sql="UPDATE promotion SET pourcentage=:pourcentage WHERE id_promo=:referance";
    $req=$db->prepare($sql);
    $req->bindValue(':pourcentage',$_POST['Pourcentage']);
    $req->bindValue(':referance',$_GET['referance']);
    $req->execute();
	header('Location: modifierpromotion.php');
}
include "header.php"; 
?>
<section id="main-content">
    <section class="wrapper">
        <div class="row mt">
            <div class="col-lg-12">
                <div class="form-panel">
                    <h4 class="mb"><i class="fa fa-angle-right"></i> modifier promotion</h4>
                    <form class="form-horizontal style-form" method="POST">
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Pourcentage</label>
                            <div class="col-sm-10">
                                <input value="<?php echo $_GET['pourcentage'] ; ?>" name="Pourcentage" type="text" class="form-control" pattern="[0-9]{2}" title="le pourcentage doit etre entre 0 et 100 ." required>

                            </div>
                        </div>
                        <button name="modifier" type="submit" class="btn btn-theme">Modifier</button>

                    </form>
                </div>
            </div>
            <!-- col-lg-12-->
        </div>