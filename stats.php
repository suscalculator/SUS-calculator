<!-- stats.php -->
<?php
// File to store statistics
define('STATS_FILE', 'stats.json');

// Check if the stats file exists
if (file_exists(STATS_FILE)) {
    $stats = json_decode(file_get_contents(STATS_FILE), true);
} else {
    $stats = ['usage_count' => 0];
}
?>
