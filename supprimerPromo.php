<?php
include "../../entities/Produit.php";
include "../../core/ProduitC.php";
if (isset($_GET['referance']))
{
	
	$valeur=$_GET['referance'];
    $valeur2=$_GET['produit'];

    $c=config::getConnexion();
    $sql = "DELETE  FROM `promotion` WHERE `id_promo`=:referance";
    $req= $c->prepare($sql);
    $query = "UPDATE produit SET promotion = 0 WHERE referance=".$valeur2;
    $c->exec($query);
    $req->bindValue(':referance',$valeur);
    $req->execute();
	header('Location: modifierpromotion.php');
}
?>