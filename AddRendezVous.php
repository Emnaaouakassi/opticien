<?php require_once('header.php'); ?>
  
      <div class="container">
         
    <br/><br/>
 
    <form action="ajoutRendezVous.php" method="post" name="Submit">
    <div class="page">
    <div class="container">
        <div class="row">            
            <div class="col-md-12"> 
                <?php require_once('customer-sidebar.php'); ?>
				<div class="box box-info">
					<div class="box-body">
						<div class="col-md-6 form-group">
							<label for="" class="col-md-6 form-group">ID </label>
							<div class="col-sm-6">
								<input type="text" autocomplete="off" class="form-control" name="id">
							</div>
						</div>
						<div class="col-md-6 form-group">
							<label for="" class="col-md-6 form-group" placeholder="01/01/2019">La date</label>
							<div class="col-sm-6">
								<input type="date" class="form-control" name="dateRV"  >
							</div>
						</div>
						<div class="col-md-6 form-group">
							<label for="" class="col-md-6 form-group">Votre Sujet</label>
							<div class="col-sm-6">
								<input type="text" autocomplete="off" class="form-control" name="sujetRV">
							</div>
						</div>
						<div class="col-md-6 form-group">
							<label for="" class="col-md-6 form-group">Votre Message </label>
							<div class="col-sm-6">
								<input type="text" autocomplete="off" class="form-control" name="messageRV">
								<input type="hidden" value="0" name="etat">
							</div>
						</div>
						<div class="col-md-6 form-group">
							<label for="" class="col-md-6 form-group"></label>
							<div class="col-sm-6">
								<button type="submit" class="btn btn-success pull-left" name="Submit">Submit</button>
							</div>

						</div>
					</div>
        </div>
        </div>
        </div>
        </div>
				</div>
    </form>
      

<?php require_once('footer.php'); ?>