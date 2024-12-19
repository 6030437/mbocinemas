<?php
session_start();
if (!isset($_SESSION['username']) || !isset($_SESSION['role'])) {
    header('Location: inlogpagina.php');
    exit;
}
?>
<?php include 'PHP/header.php'; ?>
<main>
    <h2>Dashboard</h2>
    <p>Welkom, <?= $_SESSION['username'] ?>. U bent ingelogd als <?= $_SESSION['role'] ?>.</p>
    <p><a href="uitloggen.php">Uitloggen</a></p>
<?php include 'PHP/footer.php'; ?>
