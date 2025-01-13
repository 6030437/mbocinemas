<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <meta name="description" content="Welkom bij MBO Cinemas! Bekijk de nieuwste films en geniet van een geweldige bioscoopervaring.">
    <meta name="keywords" content="Mbocinemas, bioscoop, films, nieuwste films, filmervaring">
    <meta name="author" content="MBO Cinemas Team(Mostafa, Ayan, Mylo)">
    
    <link rel="stylesheet" type="text/css" href="CSS/style.css">
    <script src="js/script.js"></script>

    <title>Mbocinemas Home</title>
</head>
<body>
<header>
    <?php session_start(); ?>
    <div class="hamburger-menu">
        <button class="menu-toggle" onclick="toggleMenu()">☰</button>
        <nav class="menu">
            <a href="index.php"><h2>🎬Mbocinemas</h2></a>
            <a href="films.php"><h4>Films</h4></a>
            <a href="reserveringen.php"><h4>Mijn Reserveringen</h4></a>
            <a href="contact.php"><h4>Contact</h4></a>
            <a href="aboutus.php"><h4>About Us</h4></a>
            <input type="text" placeholder="Film Zoeken">
            
            <?php if (isset($_SESSION['username'])): ?>
                
                <a href="uitloggen.php"><h4>Uitloggen (<?= htmlspecialchars($_SESSION['username']) ?>)</h4></a>
            <?php else: ?>
                
                <a href="inlogpagina.php"><h4>Inloggen</h4></a>
            <?php endif; ?>
        </nav>
    </div>
</header>
