<?php
/**
 * Created by PhpStorm.
 * User: sofiadilorenzo
 * Date: 9/23/18
 * Time: 9:53 AM
 */
    session_start();
    //check to see if user is logged in. if not redirect to admin
    if(!isset($_SESSION['admin'])){
        header("Location:index.php?page=admin");
    }

    //check to see if user has submitted the add category form
    if(!isset($_SESSION['addcategory']['name'])){
        header("Location:index.php?page=admin");
    }

    //enter the new category
    $newcategory_sql = "INSERT INTO category (name) VALUES ('".mysqli_real_escape_string($dbconnect, $_SESSION['addcategory']['name'])."')";
    $newcategory_query = mysqli_query($dbconnect, $newcategory_sql);
    unset($_SESSION['addcategory']['name']);

?>
    <h1>Add new category</h1>
    <p>New category has been entered</p>
    <p><a href="index.php?page=admin">Return to admin panel</a></p>
