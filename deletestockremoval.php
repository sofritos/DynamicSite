<?php
/**
 * Created by PhpStorm.
 * User: sofiadilorenzo
 * Date: 9/26/18
 * Time: 10:26 PM
 */

session_start();

if(!isset($_SESSION['admin'])){
    header("Location:index.php");
}

if(!isset($_SESSION['deletestock']['stockID']) || !isset($_SESSION['deletestock']['categoryID'])){
    header("Location:index.php");
}
$delstockconfirm_sql = "DELETE FROM stock WHERE stockID=".$_SESSION['deletestock']['stockID'];
$delstockconfirm_query = mysqli_query($dbconnect, $delstockconfirm_sql);
unset($_SESSION['deletestock']);

?>
<h1>Delete stock item</h1>
<p>Stock item has been deleted</p>
<p><a href="index.php?page=admin">Return to admin panel</a></p>
