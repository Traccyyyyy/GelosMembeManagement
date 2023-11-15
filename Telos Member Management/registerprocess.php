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
        //place code here to create account
        // 9.	Check isset register
        session_start();

        // 10.	Get posted username and password from form
        if (isset($_POST['register'])){
            $UserName=$_POST['username'];
            $UserPass=$_POST['password'];
            $ConfirmPass=$_POST['confirmPassword'];
            $number=range("0","9");
            $lowercase=range("a","z");
            $uppercase=range("A","Z");
            $specialcase=str_split("!@#$%^&*()_+{}[]<>?");
            $numFound=false;
            $lowFound=false;
            $upFound=false;
            $specialFound=false;


        // 11.	Check password length and rules comply? else error message: “Password must be 8-15 character with at least one lower case, one upper case and one special character.”
        if($UserPass!==$ConfirmPass){
            header("Location:register.php?error=1");
            exit;
        }
         elseif (strlen($UserPass)>15 ||  strlen($UserPass)<8){
                header("Location:register.php?error=2");
                exit; 
        } 
        //use for loop to loop through $userpass, search each index in each array, if found return index, set found to true;
        else {
                for($x= 0;$x < strlen($UserPass);$x++){
                    if (array_search($UserPass[$x],$number)!==false) {
                        $numFound=true;
                    }
                    if (array_search($UserPass[$x],$lowercase)!==false) {
                        $lowFound=true;
                    }
                    if (array_search($UserPass[$x],$uppercase)!==false) {
                        $upFound=true;
                    }
                    if (array_search($UserPass[$x],$specialcase)!==false) {
                        $specialFound=true;
                    }  
                }
               if ($numFound != true || $lowFound != true || $upFound != true || $specialFound != true){
                header("Location:register.php?error=3");
                exit; 
               }
        }

        // 12.	Add new user to accountS.txt
             $f1=fopen("accounts.txt","a");
             $UserDetails=$UserName." ".$UserPass."\n";
             fwrite($f1,$UserDetails);
             fclose($f1);

        // 13.	Assign username to session
             $_SESSION['username']=$UserName;
        // 14.	Direct to member welcome page(header).
        header("Location:index.php");
        exit();
}
        ?>


</body>
</html>