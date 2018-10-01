<?php
/**
 * Created by PhpStorm.
 * User: sofiadilorenzo
 * Date: 9/30/18
 * Time: 8:24 PM
 */
session_start();

if(!isset($_SESSION['admin'])){
    header("Location:index.php");
}
if(!isset($_GET['stockID'])){
    header("Location:index.php");
}
if(!isset($_SESSION['editstock']['categoryID'])){
    header("Location:index.php");
}


if(!isset($_SESSION['editstock']['stockID'])){
    $_SESSION['editstock']['stockID']=$_GET['stockID'];
    $editstock_sql = "SELECT * FROM stock WHERE stockID=".$_SESSION['editstock']['stockID'];
    $editstock_qry = mysqli_query($dbconnect, $editstock_sql);
    $editstock_rs = mysqli_fetch_assoc($editstock_qry);
    $_SESSION['editstock']['name'] = $editstock_rs['name'];
    $_SESSION['editstock']['price'] = $editstock_rs['price'];
    $_SESSION['editstock']['topline'] = $editstock_rs['topline'];
    $_SESSION['editstock']['description'] = $editstock_rs['name'];
    $_SESSION['editstock']['thumbnail'] = $editstock_rs['thumbnail'];
}

?>
<div class="maincontent">
    <p><a href="index.php?page=editstock">Select another item</a> || <a href="index.php?page=admin">Back to admin</a></p>
    <h1>Edit details for stock item</h1>
    <form action="index.php?page=editstockconfirm" method="post" enctype="multipart/form-data">
        <p>Stock item name: <input type="text" name="name" value="<?php echo $_SESSION['editstock']['name']; ?>" /></p>
        <p>Thumbnail image: <img src="images/<?php echo $_SESSION['editstock']['thumbnail']; ?>"> <input type="file" name="fileToUpload" id="fileToUpload" /> </p>
        <p>Price: $ <input type="text" name="price" value="<?php echo $_SESSION['editstock']['price']; ?>" /></p>
        <p>Topline:  <input type="text" name="topline"  value="<?php echo $_SESSION['editstock']['topline']; ?>"/></p>
        <p>Description: <textarea name="description" cols=60 rows=5><?php echo $_SESSION['editstock']['description']; ?></textarea></p>
        <input type="submit" name="submit" value="Submit" />
    </form>
</div>
