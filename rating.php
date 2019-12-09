<?php
include_once '../../config.php';



if(!empty($_POST['ratingPoints'])){
    $postID = $_POST['postID'];
    $userID = $_POST['user_id'];
    $ratingNum = 1;
    $ratingPoints = $_POST['ratingPoints'];
    $db=config::getConnexion();
    //Check the rating row with same post ID
    $prevRatingQuery = "SELECT * FROM produit_rating WHERE product_id = ".$postID ." AND user_id =".$userID;
    $prevRatingResult = $db->query($prevRatingQuery);
    
    if($prevRatingResult->rowCount() > 0 ):
        $prevRatingRow = $prevRatingResult->fetch();
    
        $ratingNum = $prevRatingRow['rating_number'] + $ratingNum;
        $ratingPoints = $ratingPoints;
        //Update rating data into the database
        $query = "UPDATE produit_rating SET rating_number = '".$ratingNum."', total_points = '".$ratingPoints."', modified = '".date("Y-m-d H:i:s")."' WHERE product_id = ".$postID ." AND user_id =".$userID;
        $update = $db->query($query);
      
    else:
        //Insert rating data into the database
        $query = "INSERT INTO produit_rating (user_id,product_id,rating_number,total_points,created,modified) VALUES(".$userID.",".$postID.",'".$ratingNum."','".$ratingPoints."','".date("Y-m-d H:i:s")."','".date("Y-m-d H:i:s")."')";
        $insert = $db->query($query);
       
       
    endif;
    
    //Fetch rating deatails from database
    $query2 = "SELECT rating_number, FORMAT((total_points / rating_number),1) as average_rating FROM  produit_rating WHERE product_id = ".$postID." AND status = 1";
    $result = $db->query($query2);
    $ratingRow = $result->fetchAll();

    if($ratingRow){
        $ratingRow['status'] = 'ok';
    }else{
        $ratingRow['status'] = 'err';
    }
    
    //Return json formatted rating data
    echo json_encode($ratingRow);
}
?>