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
    echo '<div class="check-box-lavel"></div>'; // Empty div for spacing or styling purposes
        // Flex row with "Very Good" and "Poor"
    echo '<div class="flex-row" style="display: flex; justify-content: space-between; font-size: 12px; max-width: 400px; margin: 4px 0;">';
    echo '<span style="font-size: 12px;">Strongly Disagree</span>';
    echo '<span style="font-size: 12px;">Strongly Agree</span>';
    echo '</div>';
    
    
    echo '<div class="radio-group" style="display: flex; justify-content: space-between; max-width: 400px; margin: 4px 0;">';
    
    // First radio button with "Strongly Disagree" label
    
    echo '<label class="radio-label">';
     //echo '<span style="font-size: 12px;">Strongly Agree</span>';
    echo '<input type="radio" name="q' . ($index + 1) . '" value="1" required>';
    echo '</label>';

            echo '<label class="radio-label">';
     //echo '<span style="font-size: 12px;">Strongly Agree</span>';
    echo '<input type="radio" name="q' . ($index + 1) . '" value="2" required>';
    echo '</label>';

            echo '<label class="radio-label">';
     //echo '<span style="font-size: 12px;">Strongly Agree</span>';
    echo '<input type="radio" name="q' . ($index + 1) . '" value="3" required>';
    echo '</label>';
                echo '<label class="radio-label">';
     //echo '<span style="font-size: 12px;">Strongly Agree</span>';
    echo '<input type="radio" name="q' . ($index + 1) . '" value="4" required>';
    echo '</label>';
    

    // Middle radio buttons without labels
    // echo '<div class="middle_checkbox">';
    //  for ($i = 2; $i <= 4; $i++) {
    //     echo '<label class="radio-label">';
    //    echo '<input type="radio" name="q' . ($index + 1) . '" value="' . $i . '" required>';
    //     echo '</label>';
  //  }
   //  echo '</div>';
    
    // Last radio button with "Strongly Agree" label
    echo '<label class="radio-label">';
     //echo '<span style="font-size: 12px;">Strongly Agree</span>';
    echo '<input type="radio" name="q' . ($index + 1) . '" value="5" required>';
    echo '</label>';
    
    echo '</div>'; // Close radio-group
    echo '</div>'; // Close form-group
}
?>
