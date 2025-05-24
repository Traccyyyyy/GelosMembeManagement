<?php
require_once 'includes/header.php';
?>

<h1>Welcome<?php 
if (isset($_SESSION["username"])) {
    echo ", " . htmlspecialchars($_SESSION['username']);
} else { 
    echo "! Please login.";
}
?></h1>

<p>From its origins in Australia, Gelos Enterprises has grown into one of the world's leading business operations. We are one of Australia's largest listed companies, with our headquarters based in the Tulitza CBD. Our primary objective is to achieve excellence through continuous innovation.</p>
<p>We aim to achieve this by:</p>
<ul>
    <li>increasing the success of organisations with existing products and technologies</li>
    <li>crafting a detailed proposition, we can propel a new business model and create a lasting competitive advantage</li>
    <li>increasing our primary revenue streams through property ownership and investment</li>
    <li>being a trusted global investing partner that offers core incentives, business start-up and premium consulting services</li>
    <li>acting with integrity and honesty in all of our dealings.</li>
</ul>
<p>We are a global business front runner. We have high standards and pay attention to all levels of detail, providing us with successes over the years in our quest to meet the lofty expectations of businesses.</p>

<?php
require_once 'includes/footer.php';
?>