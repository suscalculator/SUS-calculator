<!-- Main entry file that loads all components -->
<!DOCTYPE html>
<html>

<head>
    <?php include 'header.php'; ?> <!-- Include metadata and styles -->
    <meta name="description"
        content="This SUS Calculator is a free tool that offers a user-friendly way to evaluate system usability using the System Usability Scale. Use this calculator now to Get instant insights and improve your user experience." />
    <meta name="keywords"
        content="SUS, System Usability Scale, usability, SUS Calculator, SUS Score, SUS Calculator, free tool, user experience, UX, usability score" />
    <meta name="robots" content="index, follow" />
    <link rel="canonical" href="https://suscalculator.com/" />

    <!-- Open Graph Tags for social media sharing -->
    <meta property="og:title" content="SUS Calculator - Quick and Free Usability Scoring" />
    <meta property="og:description"
        content="Evaluate your system's usability quickly with our free SUS Calculator. Enhance your user experience with actionable insights." />
    <meta property="og:url" content="https://suscalculator.com/" />
    <meta property="og:type" content="website" />

    <!-- Twitter Card Tags -->
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="SUS Calculator - Quick and Free Usability Scoring" />
    <meta name="twitter:description"
        content="Assess your system's usability with our free SUS Calculator. Fast, reliable, and designed to improve your UX." />

</head>

<body>
    <!-- Responsive Navigation Bar -->
    <div class="off-canvas-menu">
        <div class="dash-logo">
            <a class="navbar-brand" href="#">SUS Calculator</a>
            <a href="#" class="close_nav"><img src="./images/close.svg" alt="icon"></a>
        </div>
        <div class="dash-menu">
            <ul>
                <li class="col-block">
                    <a href="#faq">FAQ</a>
                </li>
                <li class="col-block">
                    <a href="#stats">Usage Stats</a>
                </li>
                <li class="col-hidden">
                    <a href="#contact">Contact</a>
                </li>
                <li class="col-hidden use_btn">
                    <a href="#calculator">Use the Calculator</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="off-canvas-overlay"></div>
    <nav class="navbar navbar-expand-lg fixed-top">
        <a class="navbar-brand" href="#">SUS Questionnaire</a>
        <button type="button" class="menu-open">
            <img src="./images/menu.svg" alt="icon">
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item"><a class="nav-link" href="#faq">FAQ</a></li>
                <li class="nav-item"><a class="nav-link" href="#stats">Usage Stats</a></li>
                <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
                <li class="nav-item use_btn"><a class="nav-link" href="#calculator">Use the Calculator</a></li>
            </ul>
        </div>
    </nav>

    <!-- Hero Section with Video Background -->
    <header class="hero text-center">
        <div class="video-container">
            <video autoplay loop muted onerror="this.style.display='none';">
                <source src="https://www.pexels.com/video/person-browsing-the-internet-while-drinking-coffee-4828605/"
                    type="video/mp4">
                Your browser does not support the video tag.
            </video>
        </div>
        <div class="hero-overlay">
            <h1 class="hero-title">Your Free System Usability Scale (SUS) Calculator </h1>
            <p class="hero-subtitle"> Get results instantly from 10 questions on a likert scale</p>
            <div class="mt-3">
                <a href="#calculator" class="calculator_btn ">Use the Calculator</a>
            </div>
            <div class="hero_image">
                <img src="./images/hero_content_image.png" alt="image">
            </div>
        </div>
    </header>


    <section class="question" id="calculator">
        <div class="container question_container">
            <h2>System Usability Scale Calculator</h2>
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
            <form class="question_form" method="post" action="process.php">
                <h3>Fill the form below to calculate:</h3>
                <?php include 'questions.php'; ?>

                <div class="btn-container text-center">
                    <button type="submit" class="btn calculator_btn">Calculate</button>
                    <button type="reset" class="btn btn_reset">Reset</button>
                </div>
            </form>
            <p class="note_text">
                Please note that all responses are anonymous and will only be used to calculate the SUS score.
                The calculator does not collect any personal information, only stores the scores for analytics purposes.
            </p>
        </div>
    </section>


    <!-- FAQ Section with collapsible feature -->
    <section id="faq" class="faq-section">
        <div class="container">
            <div class="header_text">
                <h2 class="text-center">Frequently Asked Questions</h2>
                <p>About the SUS calculator, how it's calculated, and many more</p>
            </div>
            <div class="accordion mt-4" id="faqAccordion">
                <!-- Card 1: What is SUS -->
                <div class="card">
                    <div class="card-header" id="headingOne" data-toggle="collapse" data-target="#collapseOne">
                        <h3 class="mb-0">
                            What is SUS
                        </h3>
                        <img src="./images/add.svg" alt="">
                    </div>
                    <div id="collapseOne" class="collapse" data-parent="#faqAccordion">
                        <div class="card-body">
                           <p>The <strong>SUS Calculator</strong> allows you to quickly determine the usability of a system or product by answering 10 standardized questions.</p>

<p>The <strong>System Usability Scale (SUS)</strong>, developed by John Brooke in 1995, is a widely recognized tool for measuring usability in human-computer interaction.</p>

<p><b>How It Works</b></p>
<ul>
    <li>Answer the 10 usability-related questions.</li>
    <li>Click Submit to calculate your SUS score.</li>
    <li>View your score, which provides a high-level assessment of usability.</li>
</ul>

<p>While SUS provides a broad usability assessment, it should be used alongside other user experience metrics such as:</p>

<ul>
    <li><strong>Qualitative feedback</strong> (user comments, surveys)</li>
    <li><strong>Task completion rates</strong> (success/failure rates)</li>
    <li><strong>Error rates</strong> (frequency of user mistakes)</li>
</ul>

<p>Since SUS is a one-dimensional tool, it is useful for comparing different systems but may not capture detailed usability challenges without further qualitative analysis.</p>

<p>For accurate interpretation, always consider the specific context, user population, and system complexity, rather than relying solely on numerical scores.</p>
                        </div>
                    </div>
                </div>

                <!-- Card 2: SUS score intepretations -->
                <div class="card">
                    <div class="card-header" id="headingTwo" data-toggle="collapse" data-target="#collapseTwo">
                        <h3 class="mb-0">
                            SUS score intepretations
                        </h3>
                        <img src="./images/add.svg" alt="">
                    </div>
                    <div id="collapseTwo" class="collapse" data-parent="#faqAccordion">
                        <div class="card-body">
                           <p> <b>Interpreting SUS Scores Accurately</b></p>

<ul>
    <li><strong>0-39: Unacceptable (Not Usable)</strong> – Users struggle significantly with the system, indicating severe usability issues that require major redesigns.</li>
    <li><strong>40-52: Poor Usability</strong> – The system has significant usability issues, making it frustrating for users. Improvements are essential.</li>
    <li><strong>53-73: OK / Marginal Usability</strong> – The system is usable but not ideal. Users may experience occasional difficulties, and improvements would enhance the experience.</li>
    <li><strong>74-85: Good Usability</strong> – The system is user-friendly with only minor usability concerns. Most users can complete tasks with ease.</li>
    <li><strong>86-100: Excellent Usability</strong> – The system is highly intuitive and easy to use. Users experience minimal friction when completing tasks.</li>
</ul>

<p>🔹 <b>Important Notes:</b></p>
<ul>
    <li>A SUS score of <strong>68</strong> is considered average based on industry benchmarks.</li>
    <li>Scores above <strong>80</strong> are in the top 10% of usability scores and generally indicate a great user experience.</li>
    <li>The SUS scale isn’t a simple percentage; it’s best understood in relation to industry benchmarks rather than a 0-100 grading system.</li>
</ul>

                        </div>
                    </div>
                </div>

                <!-- Card 3: How to Apply the SUS Score in Projects -->
                <div class="card">
                    <div class="card-header" id="headingThree" data-toggle="collapse" data-target="#collapseThree">
                        <h3 class="mb-0">
                            How to Apply the SUS Score in Projects
                        </h3>
                        <img src="./images/add.svg" alt="">
                    </div>
                    <div id="collapseThree" class="collapse" data-parent="#faqAccordion">
                        <div class="card-body">
                            Here's how you can apply the SUS score in a project:
                            <p> <b>Define the purpose:</b> Determine why you want to measure the system's usability
                                using the SUS score. It could be to identify areas for improvement, compare different
                                versions of the system, or evaluate the system against industry benchmarks.</p>
                            <p> <b>Prepare the questionnaire:</b> Create the SUS questionnaire by including the 10
                                statements that participants will rate on a scale of 0 to 4, where 0 represents strong
                                disagreement and 4 represents strong agreement. The statements should cover aspects such
                                as ease of use, learnability, efficiency, and satisfaction.</p>
                            <p> <b>Recruit participants:</b> Identify the target user group for your system and recruit
                                participants who represent this group. Aim for a sample size of at least 20-30
                                participants to ensure statistical reliability. Participants should be familiar with the
                                system or have enough exposure to provide meaningful feedback.</p>
                            <p> <b>Conduct the usability test:</b> Administer the SUS questionnaire to the participants
                                after they have interacted with the system. It's best to conduct the test in a
                                controlled environment where you can observe their interaction and provide any necessary
                                clarifications.</p>
                            <p> <b>Calculate individual SUS scores:</b> For each participant, calculate their individual
                                SUS score using the formula: (Sum of the scores for odd-numbered questions - 5) × 2.5.
                                This step normalizes the scores to achieve a range of 0-100.</p>
                            <p> <b>Analyze the results:</b> Once you have collected all the SUS scores, calculate the
                                mean score for the entire group. The higher the SUS score, the better the usability of
                                the system. Additionally, you can analyze the individual responses to identify specific
                                areas that need improvement.</p>
                            <p> <b>Interpret the findings:</b> Interpret the SUS score in the context of your project's
                                goals. If the score is below average, consider conducting further user research or
                                usability testing to pinpoint specific issues. If the score is high, celebrate your
                                success and use the feedback to enhance the system even further.</p>
                            <p> <b>Repeat the process:</b> If you plan to make iterative improvements to the system,
                                it's advisable to conduct usability tests and measure the SUS score periodically. This
                                will help you track the progress of the system's usability over time.</p>
                            <p>Remember that the SUS score provides a quantitative measure of usability, but it should
                                be complemented with qualitative feedback from participants to gain a comprehensive
                                understanding of the system's strengths and weaknesses.</p>
                        </div>
                    </div>
                </div>

                <!-- Card 4: Academic References -->
                <div class="card">
                    <div class="card-header" id="headingFour" data-toggle="collapse" data-target="#collapseFour">
                        <h3 class="mb-0">
                            Academic References
                        </h3>
                        <img src="./images/add.svg" alt="">
                    </div>
                    <div id="collapseFour" class="collapse" data-parent="#faqAccordion">
                        <div class="card-body">
                           <p>Brooke, J. (1996). <a href="https://www.researchgate.net/publication/228593520_SUS_A_quick_and_dirty_usability_scale">SUS – A quick and dirty usability scale.</a> Usability Evaluation in Industry, 189(194), 4-7.</p>

<p>Bangor, A., Kortum, P., & Miller, J. (2009). <a href="https://uxpajournal.org/wp-content/uploads/sites/7/pdf/JUS_Bangor_May2009.pdf">Determining what individual SUS scores mean: Adding an adjective rating scale.</a> Journal of Usability Studies, 4(3), 114-123.</p>

<p>Sauro, J. (2011). <a href="https://www.amazon.com/Practical-Guide-System-Usability-Scale/dp/1461062705">A Practical Guide to the System Usability Scale: Background, Benchmarks, & Best Practices.</a> Denver, CO: Measuring Usability LLC.</p>

<p>Lewis, J. R., & Sauro, J. (2009). <a href="https://link.springer.com/chapter/10.1007/978-3-642-02806-9_12">The factor structure of the System Usability Scale.</a> Lecture Notes in Computer Science, 5619, 94-103.</p>

<p>Tullis, T. S., & Stetson, J. N. (2004). <a href="https://www.researchgate.net/publication/228609327_A_Comparison_of_Questionnaires_for_Assessing_Website_Usability">A comparison of questionnaires for assessing website usability.</a> Proceedings of the Usability Professionals Association Conference, 1-12.</p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Usage Stats Section -->
    <section id="stats" class="stats-section">
        <div class="container">
            <h2 class="text-center">Usage Statistics</h2>
            <p>Some numbers since the calculator has been launched</p>
            <?php include 'stats.php'; ?>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="contact-section">
        <div class="container text-center">
            <h2>Contact us</h2>
            <p> For colaborations and enquiries</p>
            <p>Email: <a href="mailto:hello@suscalculator.com">hello@suscalculator.com</a></p>
            <p>Thank you for using the SUS Calculator and I hope it provides valuable insights into the usability of
                your system or product.</p>
            <p>Open Source Project founded by <a href="https://olawaleadediran.com">Olawale Adediran</a>
                Git link <a href="https://github.com/Olawaldroid/SUS-calculator" target="_blank">Git page</a></p>
        </div>
    </section>

    <!-- Footer -->
    <!-- <footer class="text-center py-3">
        <p> Please note that all responses are anonymous and will only be used to calculate the SUS score. </p>
        <p> The calculator does not collect any personal information, only stores the scores for analytics purposes.
        </p>
        <p> Thank you for using the SUS Calculator and I hope it provides valuable insights into the usability of your
            system or product. </p>
        <p>Open Source Project by <a href="https://olawaleadediran.com" target="_blank">Olawale Adediran</a></p>
        <p>Git link <a href="https://github.com/Olawaldroid/SUS-calculator" target="_blank">Git page</a></p>
    </footer> -->
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
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Done</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS (Required for Modal) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- jQuery (Required for AJAX and Bootstrap) -->
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->



    <!-- AJAX Script for Form Submission -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const form = document.querySelector("form");

            if (form) {
                form.addEventListener("submit", function (event) {
                    event.preventDefault(); // Prevent default form submission

                    // Serialize form data
                    const formData = new FormData(form);

                    fetch("process.php", {
                        method: "POST",
                        body: formData
                    })
                        .then(response => {
                            if (!response.ok) {
                                throw new Error("Network response was not ok");
                            }
                            return response.json(); // Attempt to parse JSON
                        })
                        .then(data => {
                            if (data.error) {
                                // Display error message
                                document.getElementById("modalTitle").textContent = "Error";
                                document.getElementById("modalBody").innerHTML = `<div class="alert alert-danger">${data.error}</div>`;
                            } else {
                                // Display SUS score and message
                                document.getElementById("modalTitle").textContent = "SUS Score";
                                document.getElementById("modalBody").innerHTML = `
                                <div class="score ${data.css_class}">
                                    <p>${data.sus_score}</p>
                                </div>
                                <p class="description">
                                    ${data.message}
                                </p>
                                <p class="link">Check the <a href="#faq">FAQ</a> for interpretations.</p>
                            `;
                            }

                            // Show the modal
                            const modal = new bootstrap.Modal(document.getElementById("resultModal"));
                            modal.show();
                        })
                        .catch(error => {
                            console.error("Error:", error);
                            // Display a generic error message
                            document.getElementById("modalTitle").textContent = "Error";
                            document.getElementById("modalBody").innerHTML = `<div class="alert alert-danger">An error occurred. Please try again later.</div>`;
                            const modal = new bootstrap.Modal(document.getElementById("resultModal"));
                            modal.show();
                        });
                });
            }

            // Other event listeners for menu and overlay
            document.querySelector('.menu-open')?.addEventListener('click', function () {
                document.querySelector('.off-canvas-menu').classList.toggle('active');
                document.querySelector('.off-canvas-overlay').classList.toggle('active');
                this.classList.toggle('toggle');
            });

            document.querySelector(".close_nav")?.addEventListener('click', function () {
                document.querySelector('.off-canvas-menu').classList.remove('active');
                document.querySelector(".off-canvas-overlay").classList.remove('active');
            });

            document.querySelector(".off-canvas-overlay")?.addEventListener('click', function () {
                document.querySelector('.off-canvas-menu').classList.remove('active');
                this.classList.remove('active');
            });

            document.querySelectorAll('.dash-menu a').forEach(link => {
                link.addEventListener('click', function () {
                    document.querySelector('.off-canvas-menu').classList.remove('active');
                    document.querySelector(".off-canvas-overlay").classList.remove('active');
                });
            });
        });
    </script>
</body>

</html>
