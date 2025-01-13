<?php include 'PHP/header.php'; 
if (!isset($_SESSION['username'])) {
    header('Location: inlogpagina.php');
    exit;
}

require_once 'classes/db.php';
require_once 'classes/fims.php';

$films = new Films();
$user_id = $_SESSION['id']; // Assuming user_id is stored in session
$reservations = $films->getUserReservations($user_id);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mijn Reserveringen</title>
    <link rel="stylesheet" href="CSS/style.css">
</head>
<body>
    <main>
        <div class="container">
            <section class="reserveringen-sectie">
                <h2>Mijn Reserveringen</h2>
                <?php if (empty($reservations)): ?>
                    <p>Je hebt nog geen reserveringen.</p>
                <?php else: ?>
                    <?php foreach ($reservations as $reservation): ?>
                        <div class="film">
                            <div class="film-poster">
                                <img src="<?php echo htmlspecialchars($reservation->poster); ?>" alt="Poster">
                            </div>
                            <div class="film-details">
                                <h2><?php echo htmlspecialchars($reservation->title); ?></h2>
                                <p><?php echo htmlspecialchars($reservation->description); ?></p>
                                <p>Release Datum: <?php echo htmlspecialchars($reservation->release_date); ?></p>
                                <p>Duur: <?php echo htmlspecialchars($reservation->duration); ?> minuten</p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </section>
        </div>
    </main>
    <?php require 'PHP/footer.php'; ?>
</body>
</html>
