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
            $UserName=$_POST['username'];
            $UserPass=$_POST['password'];
    
        // 4.	Search username in file
         $f1=file("accounts.txt");
         $found = false;

         foreach($f1 as $Details){
//  use explode to search
            list($Name,$Password)=explode(" ",trim($Details));
          
            if ($Name==$UserName && $Password==$UserPass){
                $found = true;
                // 5.	Assign username to session
                $_SESSION['username']=$UserName;
                // 6.	Direct to member welcome page(header).
                header("Location: ../index.php");
                exit;
            } 
        }

        if (!$found) {
            header("Location: login.php?error=1");
            session_destroy();
            exit;
        }
        }

        // If we get here without a login attempt, redirect to login page
        header("Location: login.php");
        exit;
        ?>


</body>
</html>