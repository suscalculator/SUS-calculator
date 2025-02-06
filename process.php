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

        // Save the SUS score for stats.php to use, without displaying it immediately
        $_POST['sus_score'] = $susScore;
        
        // Update stats without displaying it here
        file_put_contents('stats.json', json_encode([
            "total_uses" => isset($stats['total_uses']) ? $stats['total_uses'] + 1 : 1,
            "last_used" => date("Y-m-d H:i:s"),
            "average_score" => isset($stats['average_score']) 
                ? (($stats['average_score'] * ($stats['total_uses'] ?? 0) + $susScore) / (($stats['total_uses'] ?? 0) + 1))
                : $susScore
        ], JSON_PRETTY_PRINT));
    }
}
?>
