<?php
$statsFile = 'stats.json';

// Initialize stats array
$stats = [
    "total_uses" => 0,
    "last_used" => "",
    "average_score" => 0
];

// Check if stats.json exists and read data
if (file_exists($statsFile)) {
    $stats = json_decode(file_get_contents($statsFile), true);
}

// Only update stats if called from process.php (POST request)
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['sus_score'])) {
    $score = (float)$_POST['sus_score'];

    // Increment total uses
    $stats["total_uses"] += 1;
    $stats["last_used"] = date("Y-m-d H:i:s");

    // Recalculate average score properly
    $stats["average_score"] = $stats["total_uses"] > 1
        ? (($stats["average_score"] * ($stats["total_uses"] - 1)) + $score) / $stats["total_uses"]
        : $score;

    // Save back to JSON file
    file_put_contents($statsFile, json_encode($stats, JSON_PRETTY_PRINT));
}

// Display stats (only when included in index.php)
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    echo "<div class='custom-rounded'>";
    echo "<table class='table table-bordered'>";
    echo "<tr><td>Total Calculations</td><td>{$stats['total_uses']}</td></tr>";
    echo "<tr><td>Last Used</td><td>{$stats['last_used']}</td></tr>";
    echo "<tr><td>Average SUS Score</td><td>" . round($stats['average_score'], 2) . "</td></tr>";
    echo "</table>";
    echo "</div>";
}
?>