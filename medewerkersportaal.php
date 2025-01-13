<?php include 'PHP/header.php'; 
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') {
    header('Location: inlogpagina.php');
    exit;
}

require_once 'classes/db.php';
require_once 'classes/fims.php';

$films = new Films();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['add_movie'])) {
        $title = $_POST['title'];
        $description = $_POST['description'];
        $release_date = $_POST['release_date'];
        $duration = $_POST['duration'];
        $poster = '';

        // Handle file upload
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

        $films->addMovie($title, $description, $release_date, $duration, $poster);
    } elseif (isset($_POST['delete_movie'])) {
        $movie_id = $_POST['movie_id'];
        $films->deleteMovie($movie_id);
    }
}

$all_movies = $films->getMovies();
?>


    <main>
        <div class="container">
            <section class="beheer-sectie">
                <h2>Film Toevoegen</h2>
                <form method="POST" enctype="multipart/form-data" class="add-movie-form">
                    <label for="title">Titel:</label>
                    <input type="text" id="title" name="title" required>

                    <label for="description">Beschrijving:</label>
                    <textarea id="description" name="description" required></textarea>

                    <label for="release_date">Release Datum:</label>
                    <input type="date" id="release_date" name="release_date" required>

                    <label for="duration">Duur (minuten):</label>
                    <input type="number" id="duration" name="duration" required>

                    <label for="poster">Poster:</label>
                    <input type="file" id="poster" name="poster" required><br>
                    <button type="submit" name="add_movie">Film Toevoegen</button>
                </form>
            </section>

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
                                <button type="submit" name="delete_movie">Verwijder</button>
                            </form>
                        </div>
                    </div>
                <?php endforeach; ?>
            </section>
        </div>
    </main>


<?php include 'PHP/footer.php'; ?>
