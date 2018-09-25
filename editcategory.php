
<?php
    session_start();
    //check to see if use is logged in. if not redirect to admin
    if(!isset($_SESSION['admin'])){
        header("Location:index.php?page=admin");
    }
    if(isset($_GET['categoryID'])) {
        $_SESSION['editcategory']['categoryID'] = $_GET['categoryID'];
    }

    if(!isset($_SESSION['editcategory']['name'])){
        $editcat_sql = "SELECT * FROM category WHERE categoryID=".$_GET['categoryID'];
        $editcat_query = mysqli_query($dbconnect, $editcat_sql);
        $editcat_rs = mysqli_fetch_assoc($editcat_query);
        $_SESSION['editcategory']['name'] = $editcat_rs['name'];
    }

?>
<h1>Edit category</h1>
<form action="index.php?page=editcategoryconfirm" method="post">
    <input name="name" value="<?php
        echo $_SESSION['editcategory']['name'];
    ?>" />
    <input type="submit" name="update" value="Update" />
</form>