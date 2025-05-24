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
        session_start();

        if (isset($_POST['register'])) {
            $UserName = trim($_POST['username']);
            $UserPass = $_POST['password'];
            $ConfirmPass = $_POST['confirm_password'];
            
            // Validate username
            if (empty($UserName)) {
                header("Location: register.php?error=4"); // Username empty
                exit();
            }

            // Set up accounts file path
            $accountsFile = __DIR__ . "/accounts.txt";
            
            // Create accounts.txt if it doesn't exist
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

            // Check if username already exists
            $accounts = @file($accountsFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES) ?: array();
            foreach($accounts as $account) {
                list($existingName) = explode(" ", $account);
                if ($existingName === $UserName) {
                    header("Location: register.php?error=1"); // Username exists
                    exit();
                }
            }

            // Validate password
            if (strlen($UserPass) < 8 || strlen($UserPass) > 15) {
                header("Location: register.php?error=2"); // Password length
                exit();
            }

            // Check password strength
            $hasNumber = preg_match('/[0-9]/', $UserPass);
            $hasLower = preg_match('/[a-z]/', $UserPass);
            $hasUpper = preg_match('/[A-Z]/', $UserPass);
            $hasSpecial = preg_match('/[!@#$%^&*()_+{}[\]<>?]/', $UserPass);

            if (!$hasNumber || !$hasLower || !$hasUpper || !$hasSpecial) {
                header("Location: register.php?error=3"); // Password requirements
                exit();
            }

            // Check if passwords match
            if ($UserPass !== $ConfirmPass) {
                header("Location: register.php?error=6"); // Passwords don't match
                exit();
            }

            // Try to write to accounts.txt
            $success = @file_put_contents($accountsFile, $UserName . " " . $UserPass . "\n", FILE_APPEND);
            
            if ($success === false) {
                error_log("Failed to write to accounts.txt");
                header("Location: register.php?error=7"); // File write error
                exit();
            }

            // Set session and redirect
            $_SESSION['username'] = $UserName;
            header("Location: ../index.php");
            exit();
        }

        // If we get here without a registration attempt, redirect to registration page
        header("Location: register.php");
        exit();
        ?>


</body>
</html>