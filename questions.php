<?php
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

foreach ($questions as $index => $question) {
    echo '<div class="form-group">';
    echo '<label>' . ($index + 1) . '. ' . $question . '</label>';
    
    echo '<div class="survey-container">';
    
    // Left label "Strongly Disagree"
    echo '<div class="label-left">Strongly Disagree</div>';

    // Radio button container
    echo '<div class="options-container">';
    
    for ($i = 1; $i <= 5; $i++) {
        echo '<label class="radio-label">';
        echo '<input type="radio" name="q' . ($index + 1) . '" value="' . $i . '" required>';
        echo '</label>';
    }

    echo '</div>'; // Close options-container
    
    // Right label "Strongly Agree"
    echo '<div class="label-right">Strongly Agree</div>';

    echo '</div>'; // Close survey-container
    echo '</div>'; // Close form-group
}
?>
