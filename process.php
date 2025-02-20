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

        // Determine usability message and CSS class
        if ($susScore >= 85) {
            $message = "🌟 **Excellent usability**: The system is highly intuitive and user-friendly. Users experience minimal friction. Keep up the great work!";
            $cssClass = "bg-green";
        } elseif ($susScore >= 70) {
            $message = "✅ **Good usability**: The system is user-friendly, with only minor usability concerns. Some small tweaks could make it even better.";
            $cssClass = "bg-blue";
        } elseif ($susScore >= 50) {
            $message = "⚠️ **Average usability**: The system is usable but has room for improvement. Users may encounter occasional difficulties.";
            $cssClass = "bg-yellow";
        } elseif ($susScore >= 25) {
            $message = "❌ **Poor usability**: Users struggle with navigation and efficiency. A usability review is recommended.";
            $cssClass = "bg-orange";
        } else {
            $message = "🚨 **Critical usability issues**: The system is very difficult to use. A major redesign is strongly recommended.";
            $cssClass = "bg-red";
        }

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
            'sus_score' => round($susScore, 2),
            'message' => $message,
            'css_class' => $cssClass
        ];
    }

    // Return the response as JSON
    echo json_encode($response);
}
?>
