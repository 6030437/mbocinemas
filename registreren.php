<?php   
require 'dbconnectie.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') { 
    try {
        if (isset($_POST['username'], $_POST['password'], $_POST['role'])) {
            $sql = "INSERT INTO users (username, password_hash, role) VALUES (:username, :password_hash, :role)";

            $statement = $pdo->prepare($sql);

            
            $username = htmlspecialchars($_POST['username']);
            $password = htmlspecialchars($_POST['password']);
            $role = htmlspecialchars($_POST['role']);

            
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            
            $statement->bindParam(':username', $username);
            $statement->bindParam(':password_hash', $hashed_password);
            $statement->bindParam(':role', $role);

            $statement->execute();

            echo 'Gebruiker succesvol toegevoegd.';
        } else {
            echo 'Vul alle velden in.';
        }
    } catch (PDOException $e) {
        echo 'Query mislukt: ' . $e->getMessage();
    }
}

$pdo = null;
?>


<?php include 'PHP/header.php'; ?>
<main>
    <h2>Registreren</h2>
    <form action="registreren.php" method="post">
    <label for="username">Gebruikersnaam:</label>
    <input type="text" id="username" name="username" required><br><br>

    <label for="password">Wachtwoord:</label>
    <input type="password" id="password" name="password" required><br><br>

    <label for="role">Rol:</label>
    <select id="role" name="role" required>
        <option value="user">Gebruiker</option>
        <option value="admin">Beheerder</option>
    </select><br><br>

    <input type="submit" value="Registreren">
</form>
</main>
<?php include 'PHP/footer.php'; ?>
