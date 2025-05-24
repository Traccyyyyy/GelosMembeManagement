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
        // 1.	Start session.
        session_start();
        // 2.	Check isset login 
        if (isset($_POST['login'])){
            // 3.	Get posted username and password from form
            $UserName = trim($_POST['username']);
            $UserPass = trim($_POST['password']);
    
        // 4.	Search username in file, else error message: "Wrong name or password."
         $adminFile = __DIR__ . "/admin.txt";
         if (file_exists($adminFile)) {
             $f1 = file($adminFile);
             foreach($f1 as $Details){
                 list($Name,$Password)=explode(" ",trim($Details));
                 if ($Name==$UserName && $Password==$UserPass){
                     $_SESSION['admin'] = true;  // Set admin session
                     $_SESSION['username'] = $UserName;
                     header("Location:admin.php");
                     exit;
                 } 
             }
         }
                header("Location:adminlogin.php?error=1");
                exit;
        
    }

        // If no login attempt, redirect to login page
        header("Location: adminlogin.php");
        exit();
        ?>
      

 







</body>
</html>