<?php
/**
 * Created by PhpStorm.
 * User: sofiadilorenzo
 * Date: 9/30/18
 * Time: 9:05 PM
 */
session_start();

if(!isset($_SESSION['admin'])){
    header("Location:index.php");
}
if(!isset($_SESSION['editstock']['name']) || !isset($_SESSION['editstock']['stockID'])){
    header("Location:index.php");
}
//Add new stock item to the database
$updatestock_sql = "UPDATE stock SET 
      name='".mysqli_real_escape_string($dbconnect, $_SESSION['editstock']['name'])."', 
      price='".mysqli_real_escape_string($dbconnect, $_SESSION['editstock']['price'])."', 
      thumbnail='".mysqli_real_escape_string($dbconnect, $_SESSION['editstock']['thumbnail'])."', 
      topline='".mysqli_real_escape_string($dbconnect, $_SESSION['editstock']['topline'])."', 
      description='".mysqli_real_escape_string($dbconnect, $_SESSION['editstock']['description'])."'
       WHERE stockID=".$_SESSION['editstock']['stockID'];
$updatestock_qry = mysqli_query($dbconnect, $updatestock_sql);


//Unset the addstock session
unset($_SESSION['editstock']);
?>
<p>Stock item has been updated.</p>
<p><a href="index.php?page=admin">Back to admin</a></p>
