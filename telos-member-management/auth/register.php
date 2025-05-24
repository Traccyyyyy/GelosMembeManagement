<?php
/**
 * User Registration Page
 * 
 * This page provides a secure registration interface for new users.
 * Features include:
 * - Username validation
 * - Password strength requirements
 * - Password confirmation
 * - Error handling and user feedback
 * 
 * @package GelosManagement
 * @subpackage Authentication
 */

require_once '../includes/header.php';
?>

<h1>Register</h1>
<div>
    <p style="color:red;">
        <?php
        // Process and display error messages
        $error = isset($_GET['error']) ? $_GET['error'] : 0;
        switch($error) {
            case 1:
                echo "Username already exists. Please choose another username.";
                break;
            case 2:
                echo "Password must be between 8 and 15 characters long.";
                break;
            case 3:
                echo "Password must contain at least one lowercase letter, one uppercase letter, one number, and one special character.";
                break;
            case 4:
                echo "Username cannot be empty.";
                break;
            case 6:
                echo "Passwords do not match.";
                break;
            case 7:
                echo "System error: Unable to create account. Please try again later or contact support.";
                break;
        }
        ?>
    </p>
</div>

<!-- Registration Form with Client-side Validation -->
<form action="registerprocess.php" method="post">
    <div>
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
    </div>
    <div>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required 
               pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*()_+{}[\]<>?]).{8,15}" 
               title="Must contain at least one number, one uppercase and lowercase letter, one special character, and be 8-15 characters long">
    </div>
    <div>
        <label for="confirm_password">Confirm Password:</label>
        <input type="password" id="confirm_password" name="confirm_password" required>
    </div>
    <div>
        <button type="submit" name="register">REGISTER</button>
    </div>
</form>

<!-- Password Requirements Information -->
<div class="password-requirements">
    <p>Password requirements:</p>
    <ul>
        <li>8 to 15 characters long</li>
        <li>At least one uppercase letter</li>
        <li>At least one lowercase letter</li>
        <li>At least one number</li>
        <li>At least one special character (!@#$%^&*()_+{}[]<>?)</li>
    </ul>
</div>

<?php
require_once '../includes/footer.php';
?>