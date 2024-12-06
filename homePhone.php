
<?php include '../php/header.php'; ?>
<?php include 'footer.php'; 
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if (empty($username) || empty($password)) {
        $error_message = "Vul alle velden in.";
    } else {
        // Simuleer login (vervang dit met echte authenticatie)
        $success_message = "Inloggen gelukt!";
    }
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="..CSS/style.css">
    <title>Inloggen</title>
</head>
<body class="custom-body">
    <div class="custom-container">
        <!-- Header -->
        <header class="custom-header">
            <nav class="custom-nav">
                <a href="/">mbocinemas</a>
                <a href="/films">films</a>
                <a href="/reservering">Mijn reservering</a>
                <a href="/contact">contact</a>
                <a href="/about">about us</a>
            </nav>
            <div class="custom-nav-extra">
                <a href="/search">film zoeken</a>
                <a href="/login">inloggen</a>
            </div>
        </header>

        <!-- Main Content -->
        <main class="custom-main">
            <div class="custom-login-form">
                <h2 class="custom-login-title">Maak een account aan of log in met een bestaand account</h2>
                <?php if (!empty($error_message)): ?>
                    <p class="custom-error-message"><?= htmlspecialchars($error_message) ?></p>
                <?php elseif (!empty($success_message)): ?>
                    <p class="custom-success-message"><?= htmlspecialchars($success_message) ?></p>
                <?php endif; ?>

                <form method="POST" action="index.php">
                    <div class="custom-form-group">
                        <input type="text" name="username" placeholder="username" class="custom-input" required>
                    </div>
                    <div class="custom-form-group">
                        <input type="password" name="password" placeholder="wachtwoord" class="custom-input" required>
                    </div>
                    <div class="custom-form-group">
                        <button type="submit" class="custom-button">Inloggen</button>
                    </div>
                </form>
                <div class="custom-links">
                    <a href="/forgot-password" class="custom-link">wachtwoord vergeten</a>
                    <a href="/register" class="custom-link">maak een nieuwe account aan</a>
                </div>
            </div>
        </main>

        <!-- Footer -->
        <footer class="custom-footer">
            <a href="/medewerkers" class="custom-footer-link">medewerkersportaal</a>
            <a href="/faq" class="custom-footer-link">faq</a>
        </footer>
    </div>
</body>
</html>