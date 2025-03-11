document.getElementById("susForm").addEventListener("submit", function (event) {
    event.preventDefault(); // Prevent default form submission
    
    if (!validateForm()) {
        return;
    }

    let formData = new FormData(this);

    fetch("process.php", {
        method: "POST",
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        console.log("Response Data:", data); // Debugging line

        if (data.error) {
            alert(data.error);
        } else {
            document.getElementById("scoreValue").textContent = data.sus_score;
            document.getElementById("scoreValue").className = data.css_class;
            
            // Debugging: Log the message
            console.log("Usability Message:", data.message);

            // Fix: Use innerHTML
            document.getElementById("usabilityMessage").innerHTML = data.message;

            // Ensure modal is displayed
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
