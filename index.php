<!-- Main entry file that loads all components -->
<!DOCTYPE html>
<html>
<head>
    <?php include 'header.php'; ?> <!-- Include metadata and styles -->
</head>
<body>
    <!-- Responsive Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4 fixed-top">
        <a class="navbar-brand" href="#">SUS Questionnaire</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a class="nav-link" href="#faq">FAQ</a></li>
                <li class="nav-item"><a class="nav-link" href="#stats">Usage Stats</a></li>
                <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
            </ul>
        </div>
    </nav>
    
    <!-- Hero Section with Video Background -->
    <header class="hero text-center py-5" style="background: #333;">
        <div class="video-container">
            <video autoplay loop muted onerror="this.style.display='none';">
                <source src="https://www.pexels.com/video/person-browsing-the-internet-while-drinking-coffee-4828605/" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        </div>
        <div class="hero-overlay">
            <h1 class="hero-title text-white">System Usability Scale (SUS) Calculator </h1>
            <p class="hero-subtitle text-white"> Use the form with your responses to calculate the SUS of your system</p>
            <div class="mt-3">
                <a href="#calculator" class="btn btn-primary mx-2">SUS Calculator</a>
                <a href="#faq" class="btn btn-secondary mx-2">FAQ</a>
            </div>
        </div>
    </header>
    
    <div class="container my-5">
    <?php 
// Check if the form has been submitted and handle the response
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $susScore = $_POST['sus_score'] ?? null;
    $message = $_POST['message'] ?? null;
    $cssClass = $_POST['css_class'] ?? null;

    if ($susScore) {
        // Display SUS score
        echo '<div class="results">';
        echo '<h2>SUS Score</h2>';
        echo '<p class="text-primary"><b>' . round($susScore, 2) . '</b></p>';

        // Display the message based on the SUS score
        if ($message) {
            echo '<p class="explanation' . $cssClass . '">' . $message . '</p>';
        }

        // Add a generic interpretation message
        echo '<p>Check the interpretation section for details.</p>';
        echo '</div>';
    }
}
?>
    
        <form method="post" action="process.php">       
            <?php include 'questions.php'; ?> <!-- Load questions dynamically -->
            <div class="btn-container text-center mt-4">
                <button type="submit" class="btn btn-primary">Calculate</button>
                <button type="reset" class="btn btn-secondary">Reset</button>
            </div>
        </form>
    </div>
    
    <!-- FAQ Section with collapsible feature -->
    <section id="faq" class="faq-section py-5">
        <div class="container">
            <h2 class="text-center">Frequently Asked Questions</h2>
            <div class="accordion mt-4" id="faqAccordion">
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <h3 class="mb-0">
                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne">
                              SUS score Interpretations
                            </button>
                        </h3>
                    </div>
                    <div id="collapseOne" class="collapse" data-parent="#faqAccordion">
                        <div class="card-body">
                            Here are some interpretations of different SUS scores:

<p> 0-25: Extremely poor usability. This indicates that the system is almost unusable and needs significant improvements to be useful to users. </p>
<p> 25-50: Poor usability. Users find the system difficult to use and would likely require extensive training or support to use it effectively. </p>
<p> 50-70: Average usability. The system is usable, but there are still significant areas for improvement that could lead to a better user experience. </p>
<p> 70-85: Good usability. Users find the system easy to use and navigate, with only minor areas for improvement. </p>
<p> 85-100: Excellent usability. The system is very user-friendly, and users find it easy to accomplish tasks with minimal effort. </p>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingTwo">
                        <h3 class="mb-0">
                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseTwo">
                                What is SUS?
                            </button>
                        </h3>
                    </div>
                    <div id="collapseTwo" class="collapse" data-parent="#faqAccordion">
                        <div class="card-body">
                            The SUS ( System Usability Score ) Calculator allows you to quickly and easily calculate your SUS score based on your responses to 10 questions about the usability of a system or product. The SUS score is a single number that represents the overall usability of the system or product, with higher scores indicating better usability.

<p> I want to acknowledge and give credit to John Brooke, 1995 for his work on the development of the SUS, which has become an essential tool for measuring usability in the field of human-computer interaction. </p>

<p> To use the SUS Calculator, simply answer the 10 questions about the usability of the system or product, and click the submit button. Our calculator will then calculate your SUS score and display it on the page. </p>

<p> It's worth noting that while SUS scores provide a general indication of system usability, they should be used in conjunction with other user feedback, such as qualitative feedback, task completion rates, and user error rates, to gain a more comprehensive understanding of the user experience. </p>
                            <p> Brooke, J. (1996). <a href="https://www.researchgate.net/publication/228593520_SUS_A_quick_and_dirty_usability_scale">SUS-A quick and dirty usability scale.</a> Usability evaluation in industry, 189(194), 4-7.</p>
                            <p> Bangor, A., Kortum, P. and Miller, J. (2009). <a href="https://dl.acm.org/doi/abs/10.5555/2835587.2835589"> Determining what individual SUS scores mean: Adding an adjective rating scale.</a> Journal of usability studies, 4(3), 114-123. </p>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingThree">
                        <h3 class="mb-0">
                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseThree">
                             How to Apply the SUS Score in Projects
                            </button>
                        </h3>
                    </div>
                    <div id="collapseThree" class="collapse" data-parent="#faqAccordion">
                        <div class="card-body">
                            Here's how you can apply the SUS score in a project:

<p>  <b>Define the purpose:</b> Determine why you want to measure the system's usability using the SUS score. It could be to identify areas for improvement, compare different versions of the system, or evaluate the system against industry benchmarks.</p>
<p>  <b>Prepare the questionnaire:</b> Create the SUS questionnaire by including the 10 statements that participants will rate on a scale of 0 to 4, where 0 represents strong disagreement and 4 represents strong agreement. The statements should cover aspects such as ease of use, learnability, efficiency, and satisfaction.</p>
<p>  <b>Recruit participants:</b> Identify the target user group for your system and recruit participants who represent this group. Aim for a sample size of at least 20-30 participants to ensure statistical reliability. Participants should be familiar with the system or have enough exposure to provide meaningful feedback.</p>
<p>  <b>Conduct the usability test:</b> Administer the SUS questionnaire to the participants after they have interacted with the system. It's best to conduct the test in a controlled environment where you can observe their interaction and provide any necessary clarifications.</p>
<p>  <b>Calculate individual SUS scores:</b> For each participant, calculate their individual SUS score using the formula: (Sum of the scores for odd-numbered questions - 5) × 2.5. This step normalizes the scores to achieve a range of 0-100.</p>
<p>  <b>Analyze the results:</b> Once you have collected all the SUS scores, calculate the mean score for the entire group. The higher the SUS score, the better the usability of the system. Additionally, you can analyze the individual responses to identify specific areas that need improvement.</p>
<p>  <b>Interpret the findings:</b> Interpret the SUS score in the context of your project's goals. If the score is below average, consider conducting further user research or usability testing to pinpoint specific issues. If the score is high, celebrate your success and use the feedback to enhance the system even further.</p>
<p> <b>Repeat the process:</b> If you plan to make iterative improvements to the system, it's advisable to conduct usability tests and measure the SUS score periodically. This will help you track the progress of the system's usability over time.</p>
<p>Remember that the SUS score provides a quantitative measure of usability, but it should be complemented with qualitative feedback from participants to gain a comprehensive understanding of the system's strengths and weaknesses.</p>
                        </div>
                    </div>
                </div>
                                <div class="card">
                    <div class="card-header" id="headingFour">
                        <h3 class="mb-0">
                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseFour">
                             Academic References
                            </button>
                        </h3>
                    </div>
                    <div id="collapseFour" class="collapse" data-parent="#faqAccordion">
                        <div class="card-body">
<p> Brooke, J. (1996). <a href="https://www.researchgate.net/publication/228593520_SUS_A_quick_and_dirty_usability_scale">SUS-A quick and dirty usability scale.</a> Usability evaluation in industry, 189(194), 4-7.</p>
                            <p> Bangor, A., Kortum, P. and Miller, J. (2009). <a href="https://dl.acm.org/doi/abs/10.5555/2835587.2835589"> Determining what individual SUS scores mean: Adding an adjective rating scale.</a> Journal of usability studies, 4(3), 114-123. </p>
                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Usage Stats Section -->
    <section id="stats" class="stats-section py-5">
        <div class="container">
            <h2 class="text-center">Usage Statistics</h2>
            <?php include 'stats.php'; ?>
        </div>
    </section>
    
    <!-- Contact Section -->
    <section id="contact" class="contact-section py-5">
        <div class="container text-center">
            <h2>Contact</h2>
            <p> For colaborations and enquiries</p>
            <p>Email: <a href="mailto:hello@suscalculator.com">hello@suscalculator.com</a></p>
        </div>
    </section>
    
    <!-- Footer -->
    <footer class="text-center py-3">
        <p> Please note that all responses are anonymous and will only be used to calculate the SUS score. </p>  <p> The calculator does not collect any personal information, only stores the scores for analytics purposes. </p>
 <p> Thank you for using the SUS Calculator and I hope it provides valuable insights into the usability of your system or product. </p>
        <p>Open Source Project by <a href="https://olawaleadediran.com" target="_blank">Olawale Adediran</a></p>
        <p>Git link <a href="https://github.com/Olawaldroid/SUS-calculator" target="_blank">Git page</a></p>
    </footer>
    <!-- Bootstrap Modal (Popup for Results) -->
<div class="modal fade" id="resultModal" tabindex="-1" aria-labelledby="modalTitle" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitle">SUS Score</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="modalBody">
                <!-- Result will be injected here by JavaScript -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- jQuery (Required for AJAX and Bootstrap) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Bootstrap JS (Required for Modal) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- AJAX Script for Form Submission -->
<script>
$(document).ready(function () {
    $("form").submit(function (event) {
        event.preventDefault(); // Prevent default form submission

        $.ajax({
            type: "POST",
            url: "process.php",
            data: $(this).serialize(),
            dataType: "json",
            success: function (response) {
                if (response.error) {
                    $("#modalTitle").text("Error");
                    $("#modalBody").html('<div class="alert alert-danger">' + response.error + '</div>');
                } else {
                    $("#modalTitle").text("SUS Score");
                    $("#modalBody").html('<p class="text-primary"><b>' + response.sus_score'</b></p> <p><b>' + response.message+ '</b> </p><p>Check the  <a href="#faq">FAQ</a> for interpretations.</p>');
                }
                $("#resultModal").modal("show"); // Show the modal popup
            }
        });
    });
});
</script>
</body>
</html>
