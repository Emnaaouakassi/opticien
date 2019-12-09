<?php
session_start();

include "header.php" ;
		include "../../core/ProduitC.php";


$_SESSION['user_id']= 5;
		$instance=new ProduitC();
		$resultat=$instance->afficherProduit();
$resultat1=$instance->afficherProduit();
		
		  	$db=config::getConnexion();
		  	if (isset($_SESSION["user_id"]))
								{
$query = "SELECT total_points,product_id, FORMAT((total_points / rating_number),1) as average_rating FROM produit_rating WHERE user_id = ".$_SESSION['user_id'];
$query2= "SELECT product_id ,AVG(total_points) as moyenne FROM produit_rating GROUP BY product_id";
$query3 = "SELECT * FROM promotion";

$result2 = $db->query($query2);
$result3=  $db->query($query3);
$ratingRow2 = $result2->fetchAll();
$row3= $result3->fetchAll();
$result = $db->query($query);

$ratingRow = $result->fetchAll();
}


?> 
<link href="rating.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="price.css" type="text/css">






<section class="suitable-menu">
			<div class="container">
				<div class="menu-item-wrap">
					<div class="section-title">
						<h2>Check Our <span>Suitable Menu</span></h2>
						<img src="assets/img/shape/1.png" alt="Shape">
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices.</p>
					</div>
					
					<div class="menu-list-wrap owl-carousel owl-theme">
					
					<?php foreach($resultat1 as $f)
		{		echo '<div class="single-menu-item">
							<div class="menu-img">
								<img src="'.$f["img"].'" alt="Menu">
								<div class="price">
								<!--	<span></span>-->
				' ;
		                    $prom=false;
                            foreach ($row3 as $promo) {

                                if ($promo["id_product"] == $f["referance"]) {
                                    echo '
			    <span>    ' . ($f["prix"] - ($f["prix"] * $promo["pourcentage"] / 100)) . 'dt  </span>	<salut class="strikethrough">' . $f["prix"] . 'dt</salut>';

                                    $prom = true;
                                }

                                }
                                if (!$prom)
                                    echo '<span>' . $f["prix"] . 'dt</span> ' ;
                            echo '
                        
								</div>
							</div>
							<div class="item-text">
								<h3>
									<a href="#">'.$f["nom"].'</a>
								</h3>
								


  	
 
 


									<li>    
										<a class="default-btn" href="#">Ajouter</a>
									</li>
									<li class="quantity">
										<div class="input-counter">
											<span class="minus-btn">
												<i class="fa fa-minus"></i>
											</span>
											<input type="text" value="1">
											<span class="plus-btn">
												<i class="fa fa-plus"></i>
											</span>
										</div>
									</li>
								</ul>' ;
								foreach($ratingRow2 as $moy)
							if(isset($moy["product_id"])&&$moy["product_id"]==$f["referance"])
									echo '<p> '.number_format($moy["moyenne"],1).'/5 </p>';
								if (isset($_SESSION["user_id"]))
								{
								echo  '<p> Note : </p><input id="rating_star'.$f["referance"].'" name="rating" value="0"   type="hidden" postID="'.$f["referance"].'" />';}
							echo '	</div></div>		'			;}
                            echo '

						
					</div>
				</div>
			</div>
		</section>





	<script type="text/javascript" src="rating.js"></script>
'; foreach($resultat as $f)
{
    echo ' <script language="javascript" type="text/javascript">
        $(function() {
            $("#rating_star'.$f["referance"].'").codexworld_rating_widget({
                starLength: "5",' ;
    $put=false ;
    if(empty(!$ratingRow)&& isset($_SESSION["user_id"]))
    {
    foreach($ratingRow as $row) {
        if ($row["product_id"] == $f["referance"])
        {
            echo 'initialValue: "' . $row["total_points"] . '",';
            $put= true ;
            break;
        }
    }
    }

        if (!$put)
            echo ' initialValue: "0", ';

               echo ' callbackFunctionName: "processRating",
                imageDirectory: "images/",
                inputAttr: "postID"
            });
        });

        function processRating(val, attrVal){
            $.ajax({
                type: "POST",
                url: "rating.php",
                data: "postID="+attrVal+"&ratingPoints="+val+"&user_id='.$_SESSION['user_id'].'",
                dataType: "json",
                success : function(data) {
                    if (data.status == "ok") {
                        alert("Vous avez noté "+val+"/5 pour ce produit");
                        $("#avgrat").text(data.average_rating);
                        $("#totalrat").text(data.rating_number);
                    }else{
                        alert("Some problem occured, please try again.");
                    }
                }
            });
        }
    </script>'


    ; }
    echo '


		<br><br><br><br><br><br>
		<br><br><br>' ;
	include "footer.php" ;
session_destroy();
		?>