<?php
/**
 * Admin Dashboard
 * 
 * Protected admin interface with:
 * - Session verification
 * - Admin-only access
 * - Secure logout functionality
 * - System management options
 * 
 * @package GelosManagement
 * @subpackage Administration
 */

require_once '../includes/header.php';

// Verify admin authentication
if (!isset($_SESSION["admin"])) {
    header("Location: adminlogin.php");
    exit();
}
?>

<h1>Welcome Admin</h1>
<p>This is the admin dashboard.</p>

<!-- Secure Admin Logout -->
<form action="adminprocess.php" method="post">
    <div>
        <button type="submit" name="logout">LOGOUT</button>
    </div>
</form>

<?php
require_once '../includes/footer.php';
?>