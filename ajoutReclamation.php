
<?PHP

include_once("../config.php");
if(isset($_POST['Submit'])) {   
    $id = $_POST['id']; 
    $reference = $_POST['reference'];
    $nomRec = $_POST['nomRec'];
    $description = $_POST['description'];
        
    // checking empty fields
    if(empty($reference) || empty($nomRec) || empty($description) || empty($id)) {  
        if(empty($id)) {
            echo "<font color='red'>id field is empty.</font><br/>";
        }              
        if(empty($reference)) {
            echo "<font color='red'>reference field is empty.</font><br/>";
        }
        
        if(empty($nomRec)) {
            echo "<font color='red'>Nom Reclamation field is empty.</font><br/>";
        }
        
        if(empty($description)) {
            echo "<font color='red'>description field is empty.</font><br/>";
        }
        
        //link to the previous page
        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
    } else { 
        // if all the fields are filled (not empty)             
        //insert data to database
        $result = mysqli_query($mysqli, "INSERT INTO reclamation(id,reference,nomRec,description) VALUES('$id','$reference','$nomRec','$description')");
        
        //display success message
        echo "<font color='green'>Data added successfully.";
        echo "<br/><a href='MyIndex.php'>View Result</a>";
    }
} 
?>
