<?php
/**
 * Marks Input Interface
 * 
 * Provides interface for entering student marks:
 * - Input validation for mark ranges (0-100)
 * - Required field validation
 * - Secure form submission
 * - Session protection
 * 
 * @package GelosManagement
 * @subpackage MarksManagement
 */

require_once '../includes/header.php';

// Verify user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: ../auth/login.php");
    exit();
}
?>

<h1>Your marks</h1>
<p>Please enter the 5 marks you received</p>

<!-- Marks Input Form with Validation -->
<form action="processMarks.php" method="post">
    <div>
        <label for="mark1">Mark 1:</label>
        <input type="number" id="mark1" name="mark1" min="0" max="100" required>
    </div>
    <div>
        <label for="mark2">Mark 2:</label>
        <input type="number" id="mark2" name="mark2" min="0" max="100" required>
    </div>
    <div>
        <label for="mark3">Mark 3:</label>
        <input type="number" id="mark3" name="mark3" min="0" max="100" required>
    </div>
    <div>
        <label for="mark4">Mark 4:</label>
        <input type="number" id="mark4" name="mark4" min="0" max="100" required>
    </div>
    <div>
        <label for="mark5">Mark 5:</label>
        <input type="number" id="mark5" name="mark5" min="0" max="100" required>
    </div>
    <div>
        <button type="submit" name="calculate">CALCULATE</button>
    </div>
</form>

<?php
require_once '../includes/footer.php';
?>