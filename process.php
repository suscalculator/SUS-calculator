<?php
// Handle form submission and calculate SUS score
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $responses = [];
    for ($i = 1; $i <= 10; $i++) {
        $responses[$i] = isset($_POST['q' . $i]) ? (int)$_POST['q' . $i] : 0;
    }
    
    // Validate responses
    if (in_array(0, $responses)) {
        echo '<div class="alert alert-danger">Please answer all the questions.</div>';
    } else {
        $adjustedScores = [];
        foreach ($responses as $index => $value) {
            $adjustedScores[] = ($index % 2 === 1) ? $value - 1 : 5 - $value;
        }
        // Calculate final SUS score
        $susScore = array_sum($adjustedScores) * 2.5;
        echo '<div class="results">';
        echo '<h2>SUS Score</h2>';
        echo '<p class="text-primary"><b>' . round($susScore, 2) . '</b></p>';
        echo '<p>Check the interpretation section for details.</p>';
        echo '</div>';

        // Load existing stats data
        $statsFile = 'stats.json';
        $stats = ["total_uses" => 0, "last_used" => "", "average_score" => 0];

        if (file_exists($statsFile)) {
            $stats = json_decode(file_get_contents($statsFile), true);
        }

        // Update stats
        $totalUses = $stats['total_uses'] + 1;
        $averageScore = $totalUses > 1
            ? (($stats['average_score'] * $stats['total_uses']) + $susScore) / $totalUses
            : $susScore;

        $stats["total_uses"] = $totalUses;
        $stats["last_used"] = date("Y-m-d H:i:s");
        $stats["average_score"] = round($averageScore, 2);

        // Save updated stats back to JSON file
        file_put_contents($statsFile, json_encode($stats, JSON_PRETTY_PRINT));
    }
}
?>
