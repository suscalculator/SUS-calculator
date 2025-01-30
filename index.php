<!-- index.php -->
<!-- Main entry file that loads all components -->
<!DOCTYPE html>
<html>
<head>
    <?php include 'header.php'; ?> <!-- Include metadata and styles -->
</head>
<body>
<div class="container mt-4">
    <?php include 'process.php'; ?> <!-- Process form submissions -->
    <form method="post" onsubmit="return validateForm()">
        <?php include 'questions.php'; ?> <!-- Load questions dynamically -->
        <div class="btn-container">
            <button type="submit" class="btn btn-primary">Calculate</button>
            <button type="reset" class="btn btn-secondary">Reset</button>
        </div>
    </form>
</div>
</body>
</html>
