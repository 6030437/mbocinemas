<?php
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
    <link rel="stylesheet" href="Phone/style.css">
    <title>Inloggen</title>
</head>
<body>
    <div class="container">
        <!-- Header -->
        <header class="header">
            <nav class="nav">
                <a href="/">mbocinemas</a>
                <a href="/films">films</a>
                <a href="/reservering">Mijn reservering</a>
                <a href="/contact">contact</a>
                <a href="/about">about us</a>
            </nav>
            <div class="nav-extra">
                <a href="/search">film zoeken</a>
                <a href="/login">inloggen</a>
            </div>
        </header>

        <!-- Main Content -->
        <main class="main">
            <div class="login-form">
                <h2>Maak een account aan of log in met een bestaand account</h2>
                <?php if (!empty($error_message)): ?>
                    <p class="error-message"><?= htmlspecialchars($error_message) ?></p>
                <?php elseif (!empty($success_message)): ?>
                    <p class="success-message"><?= htmlspecialchars($success_message) ?></p>
                <?php endif; ?>

                <form method="POST" action="index.php">
                    <div class="form-group">
                        <input type="text" name="username" placeholder="username" class="input" required>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" placeholder="wachtwoord" class="input" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="button">Inloggen</button>
                    </div>
                </form>
                <div class="links">
                    <a href="/forgot-password" class="link">wachtwoord vergeten</a>
                    <a href="/register" class="link">maak een nieuwe account aan</a>
                </div>
            </div>
        </main>

        <!-- Footer -->
        <footer class="footer">
            <a href="/medewerkers">medewerkersportaal</a>
            <a href="/faq">faq</a>
        </footer>
    </div>
</body>
</html>