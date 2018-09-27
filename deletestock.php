<?php
    session_start();

    if(!isset($_SESSION['admin'])){
        header("Location:index.php");
    }
    if(!isset($_POST['submit'])){
        if(!isset($_SESSION['deletestock']['categoryID'])){
            header("Location:index.php");
        }
    }else{
        $_SESSION['deletestock']['categoryID'] = $_POST['categoryID'];
    }

    $stock_sql = "SELECT stock.stockID, stock.name, stock.thumbnail,
     category.name AS catname FROM stock JOIN category 
     ON stock.categoryID=category.categoryID 
     WHERE stock.categoryID=".$_SESSION['deletestock']['categoryID'];
    if($stock_qry = mysqli_query($dbconnect, $stock_sql)){
        $stock_rs = mysqli_fetch_assoc($stock_qry);
    }?>

<div class="maincontent">
<?php
    if(mysqli_num_rows($stock_qry) == 0){
        echo "Sorry, we have no items in this category to delete";
    } else {
    ?><h1><?php echo $stock_rs['catname'];?></h1>
    <p><a href="index.php?page=deletestockselect">Select another category</a></p>
        <p>Click on an item to select for deletion</p>
    <?php
        do { ?>
            <div class="item">
                <a href="index.php?page=deletestockconfirm&stockID=<?php echo $stock_rs['stockID']; ?>">
                    <p><img src="images/<?php echo $stock_rs['thumbnail']; ?>" alt=""></p>
                    <p><?php echo $stock_rs['name']; ?></p>
             </div>
        <?php
        } while ($stock_rs = mysqli_fetch_assoc($stock_qry));
     ?>
</div>
        <?php
    }
?>

