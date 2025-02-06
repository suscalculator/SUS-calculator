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
    <header class="hero text-center py-5">
        <div class="video-container">
            <div class="video-placeholder" style="background: #333; height: 60px; padding: 20px; display: flex; align-items: center; justify-content: center; color: white;">
                Video Unavailable
            </div>
            <video autoplay loop muted onerror="this.style.display='none';">
                <source src="https://www.pexels.com/video/person-browsing-the-internet-while-drinking-coffee-4828605/" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        </div>
        <div class="hero-overlay">
            <h1 class="hero-title text-white">System Usability Scale (SUS)</h1>
            <p class="hero-subtitle text-white">A reliable tool for measuring usability</p>
            <div class="mt-3">
                <a href="#calculator" class="btn btn-primary mx-2">SUS Calculator</a>
                <a href="#faq" class="btn btn-secondary mx-2">About SUS</a>
            </div>
        </div>
    </header>
    
    <div class="container my-5">
        <?php include 'process.php'; ?> <!-- Process form submissions -->
        <form method="post" onsubmit="return validateForm()">
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
                                What is the SUS?
                            </button>
                        </h3>
                    </div>
                    <div id="collapseOne" class="collapse" data-parent="#faqAccordion">
                        <div class="card-body">
                            The System Usability Scale (SUS) is a standardized questionnaire for measuring usability.
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingTwo">
                        <h3 class="mb-0">
                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseTwo">
                                Who created the SUS?
                            </button>
                        </h3>
                    </div>
                    <div id="collapseTwo" class="collapse" data-parent="#faqAccordion">
                        <div class="card-body">
                            SUS was developed by John Brooke in 1986.
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
            <p>Email: <a href="mailto:hello@suscalculator.com">hello@suscalculator.com</a></p>
        </div>
    </section>
    
    <!-- Footer -->
    <footer class="text-center py-3">
        <p>Open Source Project by <a href="https://olawaleadediran.com" target="_blank">Olawale Adediran</a></p>
        <p>Git link <a href="https://github.com/Olawaldroid/SUS-calculator" target="_blank">Git page</a></p>
    </footer>
</body>
</html>
