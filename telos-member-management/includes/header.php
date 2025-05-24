<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Get the relative path to root
$root_path = "";
if (dirname($_SERVER['PHP_SELF']) !== '/') {
    $depth = substr_count(dirname($_SERVER['PHP_SELF']), '/');
    $root_path = str_repeat('../', $depth - 1);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gelos Enterprises</title>
    <link href="<?php echo $root_path; ?>css/style.css" rel="stylesheet">
</head>
<body>
    <header>
        <div id="headerContent">
            <nav>
                <ul>
                    <li class="menu">
                        <a href="<?php echo $root_path; ?>index.php">
                            <img src="<?php echo $root_path; ?>images/GE-icon.png" alt="Gelos Enterprises" width="47" height="55">
                        </a>
                    </li>
                    <?php if (!isset($_SESSION['username'])): ?>
                        <li class="menu"><a href="<?php echo $root_path; ?>auth/login.php">LOGIN</a></li>
                        <li class="menu"><a href="<?php echo $root_path; ?>auth/register.php">REGISTER</a></li>
                    <?php else: ?>
                        <li class="menu"><a href="<?php echo $root_path; ?>auth/logout.php">LOGOUT</a></li>
                    <?php endif; ?>
                    <li class="menu"><a href="<?php echo $root_path; ?>marks/marks.php">MARKS</a></li>
                    <li class="menu" id="admin"><a href="<?php echo $root_path; ?>admin/adminlogin.php">ADMIN</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <section id="banner">
        <img src="<?php echo $root_path; ?>images/GE-stacked-logo-reverse.png" alt="" width="200" height="106">
    </section>
    <main> 