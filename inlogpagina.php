<?php

session_start();

require 'PHP/header.php'; 
require 'dbconnectie.php';

$error = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['username'], $_POST['password'])) {
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);

    try {
        $sql = "SELECT username, password_hash, role FROM users WHERE username = :username";
        $statement = $pdo->prepare($sql);
        $statement->bindValue(':username', $username, PDO::PARAM_STR);
        $statement->execute();

        $user = $statement->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password_hash'])) {
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role'];

            // Var_dump om te controleren of de sessie goed wordt ingesteld
            var_dump($_SESSION); // Dit zal de inhoud van $_SESSION tonen

            if ($_SESSION['role'] == 'admin') {
                header('Location: medewerkersportaal.php');
            } else {
                header('Location: dashboard.php');
            }
            exit;
        } else {
            $error = 'Ongeldige gebruikersnaam of wachtwoord.';
        }
    } catch (PDOException $e) {
        $error = 'Databasefout: ' . $e->getMessage();
    }
}
?>


<main>
    <h2>Inloggen</h2>
    <?php if ($error) echo "<p style='color: red;'>$error</p>"; ?>
    <form method="post">
        <label for="username">Gebruikersnaam:</label>
        <input type="text" id="username" name="username" required>
        <label for="password">Wachtwoord:</label>
        <input type="password" id="password" name="password" required>
        <button type="submit">Inloggen</button>
    </form>
    <p><a href="registreren.php">Nog geen account? Registreer hier</a></p>
</main>
<?php require 'PHP/footer.php'; ?>