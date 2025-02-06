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

        // Pass score for stats update
        $_POST['sus_score'] = $susScore;
        include 'stats.php'; // Now updates only once
    }
}
?>
