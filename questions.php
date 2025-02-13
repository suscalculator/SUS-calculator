<?php
// Array of SUS questions
$questions = [
    "I think that I would like to use this design frequently.",
    "I found the design unnecessarily complex.",
    "I thought the design was easy to use.",
    "I think that I would need the support of a technical person to use this design.",
    "I found the various functions in this design were well integrated.",
    "I thought there was too much inconsistency in this design.",
    "I would imagine that most people would learn to use this design very quickly.",
    "I found the design very cumbersome to use.",
    "I felt very confident using the design.",
    "I needed to learn a lot of things before I could get going with this design."
];

// Generate question form fields dynamically
foreach ($questions as $index => $question) {
    $questionNumber = $index + 1;
    echo '<div class="form-group">';
    echo '<label><b>' . $questionNumber . '. ' . $question . '</b></label><br>';

    // Options
    $options = [
        1 => "Strongly Disagree",
        2 => "Disagree",
        3 => "Neutral",
        4 => "Agree",
        5 => "Strongly Agree"
    ];

    foreach ($options as $value => $text) {
        echo '<div class="form-check form-check-inline">';
        echo '<input class="form-check-input custom-radio" type="radio" id="q' . $questionNumber . '-' . $value . '" name="q' . $questionNumber . '" value="' . $value . '" required>';
        echo '<label class="form-check-label clickable-label" for="q' . $questionNumber . '-' . $value . '">' . $text . '</label>';
        echo '</div>';
    }
    echo '</div>';
}
?>
