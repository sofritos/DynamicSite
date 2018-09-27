<?php
/**
 * Created by PhpStorm.
 * User: sofiadilorenzo
 * Date: 9/26/18
 * Time: 10:02 PM
 */
    session_start();

    if(!isset($_SESSION['admin'])){
        header("Location:index.php");
    }
    if(!isset($_GET['stockID'])){
        header("Location:index.php");
    }

    $_SESSION['deletestock']['stockID'] = $_GET['stockID'];


    $delstock_sql = "SELECT * FROM stock WHERE stockID=".$_GET['stockID'];
    $delstock_qry = mysqli_query($dbconnect, $delstock_sql);
    $delstock_rs = mysqli_fetch_assoc($delstock_qry);
?>
<div class="maincontent">
    <h1>Are you really sure you want to delete item: <?php echo $delstock_rs['name'];?></h1>
    <div class="item">
            <p><img src="images/<?php echo $delstock_rs['thumbnail']; ?>" alt=""></p>
            <p><?php echo $delstock_rs['name']; ?></p>
            <p>$<?php echo $delstock_rs['price']; ?></p>
    </div>
</div>
<p><a href="index.php?page=deletestockremoval">Yes, I'm sure</a> | <a href="index.php?page=deletestock">No, go back</a> | <a href="index.php?page=admin">Back to admin</a></p>