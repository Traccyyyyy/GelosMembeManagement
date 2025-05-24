<?php
require_once '../includes/header.php';
?>

<h1>Admin Login</h1>
<div>
    <p style="color:red;">
        <?php
        $error=isset($_GET['error'])?$_GET["error"]:0;
        if ($error==1){
            echo "Wrong name or password.</br> Please try again.";
        }
        ?>
    </p>
</div>
<form action="adminprocess.php" method="post">
    <div>
        <label for="username">Username:</label>
        <input type="text" id="username" name="username">
    </div>
    <div>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password">
    </div>
    <div>
        <button type="submit" name="login">LOGIN</button>
    </div>
</form>

<?php
require_once '../includes/footer.php';
?>