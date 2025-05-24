<?php
/**
 * Marks Processing and Results Display
 * 
 * Processes submitted marks and displays results:
 * - Validates mark ranges
 * - Calculates statistics (total, average, highest, lowest)
 * - Determines final grade
 * - Displays results in formatted tables
 * - Provides grade scale information
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

<h1>Your Marks Results</h1>

<?php
if (isset($_POST["calculate"])) {
    // Initialize marks array and validation flag
    $marks = array();
    $isValid = true;
    
    // Validate all marks are between 0 and 100
    for ($i = 1; $i <= 5; $i++) {
        $mark = (int)$_POST["mark$i"];
        if ($mark < 0 || $mark > 100) {
            $isValid = false;
            break;
        }
        $marks[] = $mark;
    }

    if (!$isValid) {
        echo "<div class='error'>All marks must be between 0 and 100.</div>";
    } else {
        // Calculate statistics
        $total = array_sum($marks);
        $average = $total / count($marks);
        $highest = max($marks);
        $lowest = min($marks);

        // Display results in a formatted table
        echo "<div class='results'>";
        echo "<h2>Mark Details</h2>";
        echo "<table border='1'>";
        echo "<tr><th>Mark Number</th><th>Value</th></tr>";
        
        foreach ($marks as $index => $mark) {
            $markNumber = $index + 1;
            echo "<tr><td>Mark $markNumber</td><td>$mark</td></tr>";
        }
        
        echo "</table>";

        // Display statistical analysis
        echo "<h2>Statistics</h2>";
        echo "<table border='1'>";
        echo "<tr><td>Total Marks:</td><td>$total</td></tr>";
        echo "<tr><td>Average Mark:</td><td>" . number_format($average, 1) . "</td></tr>";
        echo "<tr><td>Highest Mark:</td><td>$highest</td></tr>";
        echo "<tr><td>Lowest Mark:</td><td>$lowest</td></tr>";
        echo "</table>";

        // Calculate and display final grade
        $grade = '';
        if ($average >= 85) $grade = 'HD';
        elseif ($average >= 75) $grade = 'D';
        elseif ($average >= 65) $grade = 'C';
        elseif ($average >= 50) $grade = 'P';
        else $grade = 'F';

        echo "<h2>Final Grade: $grade</h2>";
        echo "<p class='grade-explanation'>Grade Scale:<br>";
        echo "HD: 85-100<br>";
        echo "D: 75-84<br>";
        echo "C: 65-74<br>";
        echo "P: 50-64<br>";
        echo "F: 0-49</p>";
        echo "</div>";
    }
}
?>

<!-- Link to enter new marks -->
<p><a href="marks.php" class="button">Enter New Marks</a></p>

<!-- Results styling -->
<style>
.results {
    margin: 20px 0;
}
.results table {
    border-collapse: collapse;
    margin: 10px 0;
    width: 50%;
}
.results th, .results td {
    padding: 8px;
    text-align: left;
}
.error {
    color: red;
    margin: 10px 0;
}
.grade-explanation {
    margin: 20px 0;
    padding: 10px;
    background: #f5f5f5;
    border-radius: 5px;
}
.button {
    display: inline-block;
    padding: 10px 20px;
    background: #007bff;
    color: white;
    text-decoration: none;
    border-radius: 5px;
    margin-top: 20px;
}
.button:hover {
    background: #0056b3;
}
</style>

<?php
require_once '../includes/footer.php';
?>