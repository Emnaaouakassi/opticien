<?php require_once('header.php'); ?>

<?php
// including the database connection file
include_once("../config.php");
 
if(isset($_POST['update']))
{    
    $id = $_POST['id'];
    
    $dateRV=$_POST['dateRV'];
    $sujetRV=$_POST['sujetRV'];
    $messageRV=$_POST['messageRV']; 
    $etat=$_POST['etat'];    
    
    // checking empty fields
    if(empty($dateRV) || empty($sujetRV) || empty($messageRV)) {            
        if(empty($dateRV)) {
            echo "<font color='red'>dateRV field is empty.</font><br/>";
        }
        
        if(empty($sujet)) {
            echo "<font color='red'>sujetRV field is empty.</font><br/>";
        }
        
        if(empty($message)) {
            echo "<font color='red'>messageRV field is empty.</font><br/>";
        }        
    } else {    
        //updating the table
        $result = mysqli_query($mysqli, "UPDATE rendezvous SET dateRV='$dateRV',sujetRV='$sujetRV',messageRV='$messageRV', etat='$etat' WHERE id=$id");
        
        //redirectig to the display page. In our case, it is index.php
        header("Location: MyIndex.php"); 
    }
}
?>
<?php
//getting id from url
$id = $_GET['id'];
 
//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM rendezvous WHERE id=$id");
 
while($res = mysqli_fetch_array($result))
{
    $dateRV = $res['dateRV'];
    $sujetRV = $res['sujetRV'];
    $messageRV = $res['messageRV'];

}
?>



  <main class="site-main">
    
    
      <div class="container">

 <a href="MyIndex.php">Home</a>
    <br/><br/>
    
    <form name="form1" method="post" action="update.php">
        <table border="0">
            <tr> 
                <td>dateRV</td>

                <td> <input type="date" name="dateRV" value="<?php echo $dateRV; ?>"> </td>
            </tr>
            <tr> 
                <td>Votre Sujet</td>
                <td><input type="text" name="sujetRV" value="<?php echo $sujetRV; ?>"></td>
            </tr>
            <tr> 
                <td>Votre Message</td>
                <td><input type="text" name="messageRV" value="<?php echo $messageRV ;?>"></td>
            </tr>
             <tr> 
                <td>ETAT</td>
                <td><input type="radio" name="etat" value="1"> Confirmer</td>
                <td><input type="radio" name="etat" value="2"> Annuler </td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>

      </div>
      <?php require_once('footer.php'); ?>
   
 