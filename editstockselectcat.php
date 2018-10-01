<?php
/**
 * Created by PhpStorm.
 * User: sofiadilorenzo
 * Date: 9/30/18
 * Time: 8:13 PM
 */
session_start();

if(!isset($_SESSION['admin'])){
    header("Location:index.php");
}
if(!isset($_SESSION['editstock']['categoryID'])){
    $_SESSION['editstock']['categoryID'] = "";
}
$editstockcat_sql = "SELECT * FROM category";
$editstockcat_qry = mysqli_query($dbconnect, $editstockcat_sql);
$editstockcat_rs = mysqli_fetch_assoc($editstockcat_qry);

?>
<div class="maincontent">
    <p><a href="index.php?page=admin">Back to admin</a></p>
    <h1>Select a category to display stock items for edition</h1>
    <form method="post" action="index.php?page=editstock">
        <select name="categoryID">
            <?php
            do { ?><option value="<?php
            echo $editstockcat_rs['categoryID'];

            ?>" <?php
                if($editstockcat_rs['categoryID'] == $_SESSION['editstock']['categoryID']){
                    echo "selected=selected";
                }
                ?>>
                <?php
                echo $editstockcat_rs['name'];
                ?>
                </option> <?php
            } while ($editstockcat_rs = mysqli_fetch_assoc($editstockcat_qry));
            ?>
        </select>
        <input type="submit" name="submit" value="Submit" />
    </form>
</div>
