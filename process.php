<?php
session_start(); // Start session to store results

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $responses = [];
    for ($i = 1; $i <= 10; $i++) {
        $responses[$i] = isset($_POST['q' . $i]) ? (int)$_POST['q' . $i] : 0;
    }

    if (in_array(0, $responses)) {
        $_SESSION['error'] = "Please answer all the questions.";
        header("Location: index.php");
        exit();
    } else {
        $adjustedScores = [];
        foreach ($responses as $index => $value) {
            $adjustedScores[] = ($index % 2 === 1) ? $value - 1 : 5 - $value;
        }

        $susScore = array_sum($adjustedScores) * 2.5;

        // Load existing stats data
        $statsFile = 'stats.json';
        $stats = ["total_uses" => 0, "last_used" => "", "average_score" => 0];

        if (file_exists($statsFile)) {
            $stats = json_decode(file_get_contents($statsFile), true);
        }

        // Prevent double submission
        if (!isset($_SESSION['last_submission']) || $_SESSION['last_submission'] !== session_id()) {
            $_SESSION['last_submission'] = session_id();

            $totalUses = $stats['total_uses'] + 1;
            $averageScore = $totalUses > 1
                ? (($stats['average_score'] * $stats['total_uses']) + $susScore) / $totalUses
                : $susScore;

            $stats["total_uses"] = $totalUses;
            $stats["last_used"] = date("Y-m-d H:i:s");
            $stats["average_score"] = round($averageScore, 2);

            file_put_contents($statsFile, json_encode($stats, JSON_PRETTY_PRINT));
        }

        // Store results in session
        $_SESSION['sus_score'] = round($susScore, 2);

        header("Location: index.php");
        exit();
    }
}
?>
