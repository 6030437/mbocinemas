<?php 
include 'PHP/header.php'; 
require_once 'classes/fims.php'; 

if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') {
    header('Location: inlogpagina.php');
    exit;
}

$film = new Films();
$success_message = '';

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['movie_toevoegen'])) {
    $title = htmlspecialchars($_POST['title']);
    $description = htmlspecialchars($_POST['description']);
    $release_date = $_POST['release_date'];
    $duration = (int) $_POST['duration'];
    $poster = '';

    // Controleer of een bestand is geüpload
    if (isset($_FILES['poster']) && $_FILES['poster']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['poster']['tmp_name'];
        $fileName = $_FILES['poster']['name'];
        $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

        $uploadDir = 'uploads/';
        $newFileName = md5(time() . $fileName) . '.' . $fileExtension;
        $dest_path = $uploadDir . $newFileName;

        if (move_uploaded_file($fileTmpPath, $dest_path)) {
            $poster = $dest_path;
        }
    }

    // Voeg de film toe via de Films-klasse
    if ($film->addMovie($title, $description, $release_date, $duration, $poster)) {
        $success_message = "Nieuwe film toegevoegd: $title";
    } else {
        $success_message = "Er is een fout opgetreden bij het toevoegen van de film.";
    }
}
?>

<section class="beheer-sectie">
    <h2>Film Toevoegen</h2>
    <form method="POST" enctype="multipart/form-data">
        <label for="title">Titel:</label>
        <input type="text" id="title" name="title" required>

        <label for="description">Beschrijving:</label>
        <textarea id="description" name="description" required></textarea>

        <label for="release_date">Release Datum:</label>
        <input type="date" id="release_date" name="release_date" required>

        <label for="duration">Duur (minuten):</label>
        <input type="number" id="duration" name="duration" required>

        <label for="poster">Poster:</label>
        <input type="file" id="poster" name="poster" accept="image/*">

        <button type="submit" name="movie_toevoegen">Toevoegen</button>
    </form>

    <?php if (!empty($success_message)): ?>
        <p><?= htmlspecialchars($success_message) ?></p>
    <?php endif; ?>
</section>

<?php include 'PHP/footer.php'; ?>
