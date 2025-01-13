<?php

require_once 'PHP/header.php';
require_once 'classes/db.php';
require_once 'classes/user.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password']; // Ensure this matches the form field name

    $user = new User();
    $user_data = $user->login($username, $password);

    if ($user_data) {
        $_SESSION['username'] = $user_data->username;
        $_SESSION['role'] = $user_data->role;
        $_SESSION['id'] = $user_data->id; // Store user ID in session
        header('Location: medewerkersportaal.php');
        exit;
    } else {
        echo "Invalid username or password";
    }
}
?>

<main>
    <div class="container">
        <form method="POST">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <button type="submit">Login</button>
        </form>
        <p>Heb je nog geen account? <a href="registreren.php">Registreer hier</a></p>
    </div>
</main>

<?php require 'PHP/footer.php'; ?>