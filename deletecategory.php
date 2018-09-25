
<?php
/**
 * Created by PhpStorm.
 * User: sofiadilorenzo
 * Date: 9/20/18
 * Time: 9:50 PM
 */
    session_start();
    //check to see if use is logged in. if not redirect to admin
    if(!isset($_SESSION['admin'])){
        header("Location:index.php?page=admin");
    }
    //delete category from category table
    $delcat_sql = "DELETE FROM category WHERE categoryID=".$_GET['categoryID'];
    $delcat_query = mysqli_query($dbconnect, $delcat_sql);

    //delete stock from stock table when category matches deleted category
    $delstock_sql = "DELETE FROM stock WHERE categoryID=".$_GET['categoryID'];
    $delstock_query = mysqli_query($dbconnect, $delstock_sql);

?>
<h1>Category deleted</h1>
<p>Category has succesfully been deleted</p>
<p><a href="index.php?page=admin">Return to admin panel</a></p>