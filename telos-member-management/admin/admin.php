<?php
require_once '../includes/header.php';

if (!isset($_SESSION["admin"])) {
    header("Location: adminlogin.php");
    exit();
}
?>

<h1>Welcome Admin</h1>
<p>This is the admin dashboard.</p>

<form action="adminprocess.php" method="post">
    <div>
        <button type="submit" name="logout">LOGOUT</button>
    </div>
</form>

<?php
require_once '../includes/footer.php';
?>