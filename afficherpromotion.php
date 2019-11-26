<?php require_once('header.php'); ?>


									
		<!--main content start-->
		<?PHP
include "Promotion/core/promotionC.php";
$promotion1C=new promotionC();
$listepromotion=$promotion1C->afficherpromotion();

//var_dump($listePromotion->fetchAll());
?>
    <section id="main-content">
      <section class="wrapper">
        <!-- row -->
        <div class="row mt">
          <div class="col-md-12">
            <div class="content-panel">
              <table class="table table-striped table-advance table-hover">
                <hr>
                <thead>
                  <tr>
                    <th><i class="fa fa-bullhorn"></i> reference</th>
                    <th class="hidden-phone"><i class="fa fa-question-circle"></i> nom</th>
                    <th><i class="fa fa-bookmark"></i> prix initial</th>
					<th><i class=" fa fa-edit"></i> pourcentage</th>
					<th><i class=" fa fa-edit"></i> Fin de Promotion</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
				<?PHP
					foreach($listepromotion as $row){
				?>
                  <tr>
                    <td>
                      <a href="editable.html#"><?PHP echo $row['ref']; ?></a>
                    </td>
                    <td class="hidden-phone"><?PHP echo $row['nomp']; ?></td>
                    <td><?PHP echo $row['prixi']; ?></td>
					<td><span class="label label-warning label-mini"><?PHP echo $row['pourcentage']; ?>%</span></td>
					<td class="hidden-phone"><?PHP echo $row['datef']; ?></td>
                    <td>
					  <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#exampleModal" <?PHP $ref= $row['ref'];?>><i class="fa fa-pencil"></i></button>
					  <form style="display: inline;" method="POST" action="supprimerPromotion.php">
	<button class="btn btn-danger btn-xs" name="supprimer"><i class="fa fa-trash-o" ></i></button>
	<input type="hidden" value="<?PHP echo $row['ref']; ?>" name="ref">
	</form>
                      
                    </td>
				  </tr>
				  <?PHP
				  }
				  ?>
                </tbody>
              </table>
            </div>
            <!-- /content-panel -->
          </div>
          <!-- /col-md-12 -->
        </div>
        <!-- /row -->
      </section>
	</section>
				





									</div>
								</div>
							</div>
						</div>
						<!--row closed-->

					</div>
				</div>
				<!--app-content closed-->

				

			</div>
		</div>
		<!--app closed-->




<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">Modifier Promo</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">×</span>
								</button>
							</div>
							<div class="modal-body">
			<?PHP
			include "../admin/promotion/entities/promotion.php";
			if (1==1){
				$promotionC=new promotionC();
				$result=$promotionC->recupererpromotion($ref);
				foreach($result as $row){
					$ref=$row['ref'];
					$nomp=$row['nomp'];
					$prixi=$row['prixi'];
					$pourcentage=$row['pourcentage'];
					$datef=$row['datef'];
			?>
			<form method="POST">
		  <div style="color:black;" class="row mt">
          <div class="col-lg-12">
            <div class="form-panel">
              <div class=" form">
                <form class="cmxform form-horizontal style-form" id="commentForm" method="get" action="">
                  <div class="form-group ">
                    <label for="cref" class="control-label col-lg-10">Reference Produit</label>
                    <div class="col-lg-7">
                      <input class=" form-control" id="cref" name="ref" minlength="2" type="text"  value="<?PHP echo $ref ?>" required />
                    </div>
                  </div>
                  <div class="form-group ">
                    <label for="cenom" class="control-label col-lg-10">Nom Produit</label>
                    <div class="col-lg-7">
                      <input class="form-control " id="cnom" name="nomp" type="text" value="<?PHP echo $nomp ?>" required />
                    </div>
                  </div>
                  <div class="form-group ">
                    <label for="prixi" class="control-label col-lg-10">Prix Avant Promotion</label>
                    <div class="col-lg-3">
                      <input class="form-control " id="cprixi" type="number" name="prixi" value="<?PHP echo $prixi ?>" />
                    </div>
                  </div>
                  <div class="form-group ">
                      <label for="pourcentage" class="control-label col-lg-10">Pourcentage (%)</label>
                      <div class="col-lg-3">
                        <input class="form-control " id="cpourcentage" type="number" name="pourcentage" value="<?PHP echo $pourcentage ?>" />
                      </div>
                    </div>
                  <form action="#" class="form-horizontal style-form">
                  <div class="form-group ">
                    <label class="control-label col-md-3">DATE </label>
                    <div class="col-md-6 col-xs-11">
                      <input class="form-control form-control-inline input-medium default-date-picker" size="16" type="date" value="<?PHP echo $datef ?>" name="datef">
                      <span class="help-block">Select date</span>
                    </div>
                  </div>
				</form>
				<td><input type="hidden" name="ref_ini" value="<?PHP echo $ref;?>"></td>
				<div class="modal-footer">
								<button type="button" class="btn btn-danger btn-xs" data-dismiss="modal">Close</button>
								<button type="submit" class="btn btn-primary" type="submit" name="modifier">modifier</button>
							</div>
                </form>
              </div>
            </div>
		</div>
		<?PHP
			}
		}
		if (isset($_POST['modifier'])){
			$promotion=new promotion($_POST['ref'],$_POST['nomp'],$_POST['prixi'],$_POST['pourcentage'],$_POST['datef']);
			$promotionC->modifierpromotion($promotion,$_POST['ref_ini']);
			echo $_POST['ref_ini'];
			header("Refresh");
		}
		?>
		</div>
			
							</div>

							
						</div>
					</div>
				</div>
				<!-- Modal closed -->




<?php require_once('footer.php'); ?>



				




