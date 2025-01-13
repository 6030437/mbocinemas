<?php 
include 'PHP/header.php'; 
if (!isset($_SESSION['username'])) {
    header('Location: inlogpagina.php');
    exit;
}

require_once 'classes/db.php';
require_once 'classes/fims.php'; 

$films = new Films();
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
    if ($films->addMovie($title, $description, $release_date, $duration, $poster)) {
        $success_message = "Nieuwe film toegevoegd: $title";
    } else {
        $success_message = "Er is een fout opgetreden bij het toevoegen van de film.";
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['reserve_movie'])) {
        $movie_id = $_POST['movie_id'];
        $user_id = $_SESSION['id']; // Ensure user_id is stored in session
        if ($user_id) {
            $films->reserveMovie($movie_id, $user_id);
        } else {
            echo "Error: User ID is not set in the session.";
        }
    }
}

$all_movies = $films->getMovies();
?>

<main>
    <div class="container">
        <section class="films-sectie">
            <h2>Films</h2>
            <?php foreach ($all_movies as $movie): ?>
                <div class="film">
                    <div class="film-poster">
                        <img src="<?php echo htmlspecialchars($movie->poster); ?>" alt="Poster">
                    </div>
                    <div class="film-details">
                        <h2><?php echo htmlspecialchars($movie->title); ?></h2>
                        <p><?php echo htmlspecialchars($movie->description); ?></p>
                        <p>Release Datum: <?php echo htmlspecialchars($movie->release_date); ?></p>
                        <p>Duur: <?php echo htmlspecialchars($movie->duration); ?> minuten</p>
                        <form method="POST" style="display:inline;">
                            <input type="hidden" name="movie_id" value="<?php echo $movie->id; ?>">
                            <button type="submit" name="reserve_movie">Reserveer</button>
                        </form>
                    </div>
                </div>
            <?php endforeach; ?>
        </section>
    </div>
</main>

<?php include 'PHP/footer.php'; ?>
