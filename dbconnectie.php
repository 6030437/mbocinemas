<?php
$server_name = 'localhost';
$user_name = 'root';
$password = '';
$db_name = 'db_mbocinemas';

try {
    $pdo = new PDO("mysql:host=$server_name;dbname=$db_name", $user_name, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}


?>
