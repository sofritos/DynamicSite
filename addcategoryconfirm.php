<?php
/**
 * Created by PhpStorm.
 * User: sofiadilorenzo
 * Date: 9/23/18
 * Time: 10:08 AM
 */
    session_start();
    //check to see if user is logged in. if not redirect to admin
    if(!isset($_SESSION['admin'])){
        header("Location:index.php?page=admin");
    }

    //check to see if user has submitted the add category form
    if(!isset($_POST['submit'])){
        header("Location:index.php?page=admin");
    }

    //set addcategory session
    $_SESSION['addcategory']['name'] = $_POST['name'];
?>
<h1>Confirm category name</h1>
<p>You entered: <?php echo $_POST['name']; ?></p>
<p><a href="index.php?page=addcategoryinsert">Correct, conitnue</a> | <a href="index.php?page=addcategory">Oops, go back</a></p>

