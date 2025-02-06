<!-- stats.php -->
<?php
// File to store statistics
define('STATS_FILE', 'stats.json');

// Initialize or load existing stats
if (!file_exists(STATS_FILE)) {
    $stats = ['usage_count' => 0];
    file_put_contents(STATS_FILE, json_encode($stats));
} else {
    $stats = json_decode(file_get_contents(STATS_FILE), true);
}

// Increment usage count
$stats['usage_count']++;
file_put_contents(STATS_FILE, json_encode($stats));
?>
