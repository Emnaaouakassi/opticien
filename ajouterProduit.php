<?PHP
include "header.php";
include "../../entities/produit.php";
include "../../core/produitC.php";

if ( isset($_POST['ajouter']))
{
if (isset($_POST['Referance']) and isset($_POST['Nom']) and isset($_POST['Prix']) and isset($_POST['Code']) and isset($_POST['Quantite']) ){
	
$upload_image=$_FILES["myimage"]["name"];

$folder="../frontoffice/image/";

$produit1=new produit($_POST['Referance'],$_POST['Nom'],$_POST['Prix'],$_POST['Code'],$folder."/".$upload_image,$_POST['Quantite'],$folder."/".$upload_image);
move_uploaded_file($_FILES["myimage"]["tmp_name"], $folder.$upload_image);
$produit1C=new ProduitC();
$produit1C->ajouterProduit($produit1);
	
}else{
	die("verifier");
}
//*/
}
?>
<section id="main-content">
      <section class="wrapper site-min-height">
 <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Produits</a>
        </li>
        <li class="breadcrumb-item active">Ajouter Produit</li>
      </ol>
      <!-- Example DataTables Card-->
	  <div class="card card-register mx-auto mt-5">
      <div class="card-header">Ajouter Produit</div>
      <div class="card-body">
        <form method="POST" action="" enctype="multipart/form-data">
          <div class="form-group">
            <div class="form-row">
              
                <label for="exampleInputName">Referance</label>
                <input class="form-control" name="Referance" type="text" aria-describedby="nameHelp"  title="Ce champ doit avoir 8 chiffres ." >
              
			  </div>
			  <div class="form-row">
              
                <label for="exampleInputLastName">Nom du Produit</label>
                <input class="form-control" name="Nom"  type="text" aria-describedby="nameHelp" pattern="[A-Za-z]{4,}" title="Ce champ doit avoir au moins 4 Characthéres ." required>
              
            </div>
          </div>
          <div class="form-group">
		  
            <label for="exampleInputEmail1">Prix</label>
            <input class="form-control" name="Prix" type="number" aria-describedby="emailHelp" min=1 max=20 title="le prix doit etre entre 1 et 20 Dt ." required>
          </div>
          <div class="form-group">
            <div class="form-row">
              
                <label for="exampleInputPassword1">Code a Barre</label>
                <input class="form-control" name="Code" type="text" pattern="[0-9]{8}" title="Ce champ doit avoir 8 chiffres ." required>
              
			  </div>
			  <div class="form-row">
              
                <label for="exampleConfirmPassword">Quantite</label>
                <input class="form-control" name="Quantite" type="number" min=1 max=100 title="la quantite doit etre entre 1 et 100 ." required >
              </div>
               <div class="form-group">
      

              
                <label for="exampleConfirmPassword">Photo</label>
                <input class="form-control" type="file" name="myimage" required>
              </div>
            </div>
          </div>
          <input class="form-control" type="submit" name="ajouter" value="ajouter">
        </form>
       
      </div>
    </div>
      
    </div>
    
