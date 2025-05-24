<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gelos Enterprises</title>
    <link href="style.css" rel="stylesheet">
</head>
<body>
        
        <?php
        /**
         * Registration Process Handler
         * 
         * Handles the server-side processing of user registration:
         * - Validates username and password
         * - Checks for existing usernames
         * - Enforces password requirements
         * - Creates new user accounts
         * - Manages session initialization
         * 
         * @package GelosManagement
         * @subpackage Authentication
         */

        session_start();

        if (isset($_POST['register'])) {
            // Sanitize and validate input data
            $UserName = trim($_POST['username']);
            $UserPass = $_POST['password'];
            $ConfirmPass = $_POST['confirm_password'];
            
            // Validate username
            if (empty($UserName)) {
                header("Location: register.php?error=4"); // Username empty
                exit();
            }

            // Set up accounts file path and check existence
            $accountsFile = __DIR__ . "/accounts.txt";
            if (!file_exists($accountsFile)) {
                touch($accountsFile);
                chmod($accountsFile, 0666); // Set read-write permissions
            }
            
            // Check if file is writable
            if (!is_writable($accountsFile)) {
                error_log("accounts.txt is not writable");
                header("Location: register.php?error=7"); // File permission error
                exit();
            }

            // Check for existing username
            $accounts = @file($accountsFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES) ?: array();
            foreach($accounts as $account) {
                list($existingName) = explode(" ", $account);
                if ($existingName === $UserName) {
                    header("Location: register.php?error=1"); // Username exists
                    exit();
                }
            }

            // Validate password length
            if (strlen($UserPass) < 8 || strlen($UserPass) > 15) {
                header("Location: register.php?error=2"); // Password length
                exit();
            }

            // Validate password complexity
            $hasNumber = preg_match('/[0-9]/', $UserPass);
            $hasLower = preg_match('/[a-z]/', $UserPass);
            $hasUpper = preg_match('/[A-Z]/', $UserPass);
            $hasSpecial = preg_match('/[!@#$%^&*()_+{}[\]<>?]/', $UserPass);

            if (!$hasNumber || !$hasLower || !$hasUpper || !$hasSpecial) {
                header("Location: register.php?error=3"); // Password requirements
                exit();
            }

            // Verify password confirmation
            if ($UserPass !== $ConfirmPass) {
                header("Location: register.php?error=6"); // Passwords don't match
                exit();
            }

            // Create new user account
            $success = @file_put_contents($accountsFile, $UserName . " " . $UserPass . "\n", FILE_APPEND);
            
            if ($success === false) {
                error_log("Failed to write to accounts.txt");
                header("Location: register.php?error=7"); // File write error
                exit();
            }

            // Initialize user session and redirect
            $_SESSION['username'] = $UserName;
            header("Location: ../index.php");
            exit();
        }

        // Redirect to registration page if accessed directly
        header("Location: register.php");
        exit();
        ?>


</body>
</html>