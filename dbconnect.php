<?php
/**
 * Created by PhpStorm.
 * User: sofiadilorenzo
 * Date: 9/18/18
 * Time: 9:08 PM
 */

    $dbconnect = mysqli_connect("localhost", "root", "", "ChicTutorial");
    if(mysqli_connect_errno()){
        echo "Connection failed:".mysqli_connect_error();
        exit;
    }
?>