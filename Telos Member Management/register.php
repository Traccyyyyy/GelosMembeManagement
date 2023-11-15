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
    <header>
        <div id="headerContent">
            
            <nav>
                <ul>
                    <li class="menu">
                        <a href="index.php">
                            <img src="images/GE-icon.png" alt="Gelos Enterprises" width="47" height="55">
                        </a>
                    </li>
                    <li class="menu"><a href="login.php">LOGIN</a></li>
                    <li class="menu"><a href="register.php">REGISTER</a></li>
                    <li class="menu"><a href="marks.php">MARKS</a></li>
                    <li class="menu" id="admin"><a href="adminlogin.php">ADMIN</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <section id="banner">
        <img src="images/GE-stacked-logo-reverse.png" alt="" width="200" height="106">
    </section>
  
    <main >
        <p style="color:red; font-weight:bold;">
        <?php
            $error=isset($_GET['error'])?$_GET['error']:0;
            if ($error==1){
                echo "Please confirm your password.";
            }           if ($error==2){
                echo "Your password should be 8-15 characters.";
            }          if ($error==3){
                echo "Your password is not strong enough! Try again.";
            }
            ?>
        </p>
        <h1>Register</h1>
        <form action="registerprocess.php" method="post">
        <p>You can create your own password or generate a password, leave the password box empty to generate a password.</p>
            <div>
                <label for="username">Username:</label>
                <input type="text" id="username" name="username">
            </div>
            <div>
                <label for="password">Password:</label>

                    <input type="password" id="password" name="password"> 

</div>
                <div>
                    <label for="confirmPassword">Confirm Password:</label>
                    <input type="password" id="confirmPassword" name="confirmPassword">
                </section>
                </div>
            <div>
                <button type="submit" name="register">REGISTER</button>
            </div>
            <p style="color:red;">   
            The password should be 8 to 15 characters long and include a combination of uppercase letters, lowercase letters, numbers, and symbols.</p>
        </form>
        
    </main>





    <footer>
        <p>Contact us</p>
        <p>A: 111 Business Avenue, TULITZA NSW 9460<br>
        P: 02 0000 0000<br>
        E: contactus@gelosmail.com.au</p>
    
        <p>Gelos Enterprises would like to pay our respect and acknowledge Aboriginal and Torres Strait Islander Peoples as the Traditional Custodians of the land, rivers and sea. We acknowledge and pay our respect to the Elders, both past and present of all Nations.</p>				
        <p>This site has been developed by TAFE NSW &copy TAFE NSW <?php echo date("Y") ?></p>
        <p >Please note this is a fictitious organisation and has been created purely for educational purposes only.</p>
    </footer>

</body>
</html>