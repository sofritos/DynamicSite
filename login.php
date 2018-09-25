<h1>Login</h1>
<form name="login" method="post" action="index.php?page=admin">
    <p>Username <input name="username" type="text" maxlength=30 /></p>
    <p>Password <input name="password" type="password" maxlength=30 /></p>
    <?php
        if(isset($_POST['login']) && !isset($_SESSION['admin'])){
            ?>
            <p><span class="error">Incorrect username and password</span></p>
            <?php
        }
    ?>

    <p><input type="submit" name="login" value="SUBMIT" /></p>
</form>
<?php
/**
 * Created by PhpStorm.
 * User: sofiadilorenzo
 * Date: 9/19/18
 * Time: 9:06 PM
 */

