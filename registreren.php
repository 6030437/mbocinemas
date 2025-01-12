<?php
require_once 'PHP/header.php';
require_once 'classes/db.php';
require_once 'classes/user.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password
    $role = $_POST['role']; // Get the role from the form

    $user = new User();
    if ($user->register($username, $password, $role)) {
        echo "Registration successful. <a href='inlogpagina.php'>Login here</a>";
    } else {
        echo "Registration failed.";
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
            <label for="role">Role:</label>
            <select id="role" name="role" required>
                <option value="gebruiker">Gebruiker</option>
                <option value="beheerder">Beheerder</option>
            </select>
            <button type="submit">Register</button>
        </form>
    </div>
</main>

<?php require 'PHP/footer.php'; ?>