<?php
$server_name = '';
$user_name = '';
$password = '';
$db_name = '';

try {
    $pdo = new PDO("mysql:host=$server_name;dbname=$db_name", $user_name, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);


} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}

try{
$sql = "INSERT INTO gebruikers (username, password) VALUES (:username, :password)";

$statement = $pdo->prepare($sql);
$username = htmlspecialchars($_POST['username']);
$password = htmlspecialchars($_POST['password']);
$statement->bindParam(':username', $username);

$hashed_password = password_hash($password, PASSWORD_DEFAULT);
$statement->bindParam(':password', $hashed_password);

$statement->execute();

echo 'User added';
} catch (PDOException $e) {
    echo 'Query failed: ' . $e->getMessage();
}

$pdo = null;

?>