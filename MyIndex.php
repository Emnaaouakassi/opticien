<?php
include_once("../config.php");
include_once("../models/RendezVous.php");
include_once("../controller/RendezVousController.php");
 require_once('admin/header.php'); 
$cc1=new RendezVousController();
$result = $cc1->afficherRendezVous1();
$liste=$cc1->affichernontraite();
$liste2=$cc1->afficherconfirmer();
$liste1=$cc1->afficherannuler();
?>


	<!--================ End Header Menu Area =================-->

  <main class="site-main">
    
    
      <div class="container">

<a href="AddRendezVous.php"></a><br/><br/>
 
<section class="content">
	<div class="row">
      
        <form methode="POST" action="Myrecherche.php">
            rechercher par réference :
            <input type="text" name="id" id="id" placeholder=" Entrer L'ID correspondant">
            <input type="submit" name="Rechercher" value="rechercher">
        </form>
		<div class="col-md-12">

      <a href="afficherRendezVoustrie.php "> Trier  les RV</a>
			<div class="box box-info">
				<div class="box-body table-responsive">
            <h3> Liste des RV controller</h3>
					<table id="example1" class="table table-bordered table-striped">
						<thead>
                            <tr>
                                <?php foreach ($liste as $key ) {?>
                                  <td>
                                      Nbre de RV non traitées : <?php echo $key['total']; ?>
                                  </td>
                                
                            
                        <?php } ?>

                                <?php foreach ($liste2 as $key ) {?>
                                  <td>
                                      Nbre de RV  confirmées : <?php echo $key['total'] ; ?>
                                  </td>
                                
                          
                        <?php } ?>
                                                        <?php foreach ($liste1 as $key ) {?>
                                  <td>
                                       Nbre de RV  annulées : <?php echo $key['total'] ; ?>
                                  </td>
                                  <?php } ?>
                                  </tr>
							<tr>
            <td>Id</td>
            <td>Date du RV</td>
            <td>Sujet du RV</td>
            <td>Message</td>
             <td>Etat</td>
            <td>Update</td>
            </tr>
						</thead>
						<tbody>
        <?php 
       
        foreach ($result as $res ) {
             # code...
          {   
        if($res['etat']==0)
        {
            $etatt="non traitée";
        }
        elseif ($res['etat']==1)
            {$etatt="confirmeée";}
        else {$etatt="Annulée";}      
            echo "<tr>";
             echo "<td>".$res['id']."</td>";
            echo "<td>".$res['dateRV']."</td>";
            echo "<td>".$res['sujetRV']."</td>";
            echo "<td>".$res['messageRV']."</td>";  

            echo "<td>".$etatt."</td>" ; 
            echo "<td><a href=\"update.php?id=$res[id]\">Edit</a> | <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";        
        }
        }
        ?>
    </table>

      </div>
   
 
<?php require_once('admin/footer.php'); ?>