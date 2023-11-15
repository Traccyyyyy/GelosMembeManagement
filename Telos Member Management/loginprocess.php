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
    
        // 4.	Search username in file, else error message: “Wrong name or password.”
         $f1=file("accounts.txt");

         foreach($f1 as $Details){
//  use explode to search
            list($Name,$Password)=explode(" ",trim($Details));
          
            if ($Name==$UserName && $Password==$UserPass){
                    // $sth=$UserName." ".$UserPass;
                    // if ($sth==trim($Details)){
                // 6.	Assign username to session
                $_SESSION['username']=$UserName;
                // 7.	Direct to member welcome page(header).
                header("Location:index.php");
                exit;
            } 
        }
                header("location:login.php?error=1");
                session_destroy();
                exit;
        }
        ?>


</body>
</html>