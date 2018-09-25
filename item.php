<?php
/**
 * Created by PhpStorm.
 * User: sofiadilorenzo
 * Date: 9/19/18
 * Time: 8:24 PM
 */

    //redirect back to index page if no stockID has been set
    if(!isset($_GET['stockID'])){
        header("Location: index.php");
    }
    $item_sql = "SELECT stock.* , category.name AS catname FROM stock 
      JOIN category on (stock.categoryID = category.categoryID) WHERE stockID=".$_GET['stockID'];
    if($item_query = mysqli_query($dbconnect, $item_sql)){
        $item_rs = mysqli_fetch_assoc($item_query);
        ?>
        <p><img src="images/<?php echo $item_rs['bigphoto']; ?>" alt=""></p>
        <p><?php echo $item_rs['name']; ?></p>
        <p><?php echo $item_rs['catname']; ?></p>
        <p>Price: $<?php echo $item_rs['price']; ?></p>
        <p><?php echo $item_rs['description']; ?></p>
        <?php
    }
?>