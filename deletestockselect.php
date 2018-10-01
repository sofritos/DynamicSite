<?php
    session_start();

    if(!isset($_SESSION['admin'])){
        header("Location:index.php");
    }

  /*  if(isset($_SESSION['deletestock'])){
        unset($_SESSION['deletestock']);
    }*/

    if(!isset($_SESSION['deletestock']['categoryID'])){
       $_SESSION['deletestock']['categoryID'] = "";
    }

    $delcat_sql = "SELECT * FROM category";
    $delcat_qry = mysqli_query($dbconnect, $delcat_sql);
    $delcat_rs = mysqli_fetch_assoc($delcat_qry);
?>
<div class="maincontent">
    <p><a href="index.php?page=admin">Back to admin</a></p>
    <h1>Select a category to display stock items for deletion</h1>
    <form method="post" action="index.php?page=deletestock">
        <select name="categoryID">
            <?php
            do { ?><option value="<?php
                        echo $delcat_rs['categoryID'];

                ?>" <?php
                if($delcat_rs['categoryID'] == $_SESSION['deletestock']['categoryID']){
                    echo "selected=selected";
                }
                ?>>
                <?php
                    echo $delcat_rs['name'];
                ?>
            </option> <?php
            } while ($delcat_rs = mysqli_fetch_assoc($delcat_qry));
            ?>
        </select>
        <input type="submit" name="submit" value="Submit" />
    </form>
</div>
