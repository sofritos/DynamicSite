
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

    //set session to blank if user has just entered this page from the admin panel
    if(!isset($_SESSION['addcategory']['name'])){
        $_SESSION['addcategory']['name'] = "";
    }

?>
<h1>Add new category</h1>
<form method="post" action="index.php?page=addcategoryconfirm">
    <p><input type="text" name="name" value="<?php echo $_SESSION['addcategory']['name'] ?>" size="40" maxlength="50"></p>
    <p><input type="submit" name="submit" value="Add Category"></p>
</form>