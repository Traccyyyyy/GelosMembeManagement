<?php
/**
 * User Login Interface
 * 
 * Provides the login form and error handling for user authentication.
 * Features:
 * - Clean login interface
 * - Error message display
 * - Session handling
 * - Secure form submission
 * 
 * @package GelosManagement
 * @subpackage Authentication
 */

require_once '../includes/header.php';
?>

<div>
    <p style="color:red;">
        <?php
        // Process and display error messages
        $error = isset($_GET['error']) ? $_GET["error"] : 0;
        if ($error == 1) {
            echo "Wrong name or password.</br> Please try again.";
        }
        ?>
    </p>
</div>

<h1>Login</h1>
<!-- Secure Login Form -->
<form action="loginprocess.php" method="post">
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