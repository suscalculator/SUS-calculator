<?php
// Include the stats file to update usage stats
$statsFile = 'stats.json';
$stats = [
    "total_uses" => 0,
    "last_used" => "",
    "average_score" => 0
];

// Check if stats.json exists and read data
if (file_exists($statsFile)) {
    $stats = json_decode(file_get_contents($statsFile), true);
}

// Handle AJAX submission and form data processing
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $responses = [];
    for ($i = 1; $i <= 10; $i++) {
        $responses[$i] = isset($_POST['q' . $i]) ? (int)$_POST['q' . $i] : 0;
    }
    
    // Validate responses (ensure no question is skipped)
    if (in_array(0, $responses)) {
        // Respond with an error if any question is not answered
        $response = [
            'error' => 'Please answer all the questions.'
        ];
    } else {
        // Adjust scores based on the SUS scoring method
        $adjustedScores = [];
        foreach ($responses as $index => $value) {
            $adjustedScores[] = ($index % 2 === 1) ? $value - 1 : 5 - $value;
        }

        // Calculate final SUS score
        $susScore = array_sum($adjustedScores) * 2.5;

        // Update stats
        $stats["total_uses"] += 1;
        $stats["last_used"] = date("Y-m-d H:i:s");

        // Recalculate average score
        $stats["average_score"] = $stats["total_uses"] > 1
            ? (($stats["average_score"] * ($stats["total_uses"] - 1)) + $susScore) / $stats["total_uses"]
            : $susScore;

        // Save the updated stats back to the JSON file
        file_put_contents($statsFile, json_encode($stats, JSON_PRETTY_PRINT));

        // Send back the result as JSON
        $response = [
            'sus_score' => round($susScore, 2)
        ];
    }

    // Return the response as JSON
    echo json_encode($response);
}
?>
