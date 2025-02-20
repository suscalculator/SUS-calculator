document.getElementById("susForm").addEventListener("submit", function (event) {
    event.preventDefault(); // Prevent default form submission
    
    // Run validation first
    if (!validateForm()) {
        return; // Stop if validation fails
    }

    let formData = new FormData(this);

    fetch("process.php", {
        method: "POST",
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.error) {
            alert(data.error);
        } else {
            document.getElementById("scoreValue").textContent = data.sus_score;
            document.getElementById("scoreValue").className = data.css_class;
            document.getElementById("usabilityMessage").textContent = data.message;

            // Show the modal (Bootstrap example)
            $("#resultModal").modal("show");
        }
    })
    .catch(error => console.error("Error:", error));
});

/* ✅ Form validation function to ensure all questions are answered */
function validateForm() {
    var formValid = true;
    for (var i = 1; i <= 10; i++) {
        var questionAnswered = false;
        var options = document.getElementsByName("q" + i);
        for (var j = 0; j < options.length; j++) {
            if (options[j].checked) {
                questionAnswered = true;
                break;
            }
        }
        if (!questionAnswered) {
            formValid = false;
            break;
        }
    }
    if (!formValid) {
        alert("Please answer all the questions.");
    }
    return formValid;
}
