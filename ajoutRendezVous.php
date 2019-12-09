
<?PHP

include_once("../config.php");
if(isset($_POST['Submit'])) {   
    $id = $_POST['id']; 
    $dateRV = $_POST['dateRV'];
    $sujetRV = $_POST['sujetRV'];
    $messageRV = $_POST['messageRV'];
    $etat = $_POST['etat'];
        
    // checking empty fields
    if(empty($dateRV) || empty($sujetRV) || empty($messageRV) || empty($id)) {  
        if(empty($id)) {
            echo "<font color='red'>id field is empty.</font><br/>";
        }              
        if(empty($dateRV)) {
            echo "<font color='red'>dateRV field is empty.</font><br/>";
        }
        
        if(empty($sujetRV)) {
            echo "<font color='red'>sujetRV field is empty.</font><br/>";
        }
        
        if(empty($messageRV)) {
            echo "<font color='red'>messageRV field is empty.</font><br/>";
        }
        
        //link to the previous page
        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
    } else { 
        // if all the fields are filled (not empty)             
        //insert data to database
        $result = mysqli_query($mysqli, "INSERT INTO rendezvous (id,dateRV,sujetRV,messageRV,etat) VALUES('$id','$dateRV','$sujetRV','$messageRV','$etat')");
        
        //display success messageRV
        echo "<font color='green'>Data added successfully.";
        echo "<br/><a href='MyIndex.php'>View Result</a>";
    }
} 
?>
