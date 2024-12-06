<?php include 'PHP/header.php'; ?>
<main>
<div class="login-container">
    <h2>Inloggen</h2>
    <form action="login.php" method="post">
        <div class="form-group">
            <label for="username">Gebruikersnaam:</label>
            <input type="text" id="username" name="username" required>
        </div>
        <div class="form-group">
            <label for="password">Wachtwoord:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <button type="submit">Inloggen</button>

    </form>

    <script src="script.js"></script>
</div>
</main>
<?php include 'PHP/footer.php'; ?>

