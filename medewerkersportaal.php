<?php
include 'PHP/header.php';
require_once 'classes/fims.php';

if (!isset($_SESSION['username']) || $_SESSION['role']!== 'admin') {
    header('Location: inlogpagina.php');
    exit;
}
$films = new Films();
$all_movies = $films->getMovies();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_movie'])) {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $release_date = $_POST['release_date'];
    $duration = $_POST['duration'];
    $poster = $_POST['poster'];

    $success = $films->updateMovie($id, $title, $description, $release_date, $duration, $poster);
    
    if ($success) {
        echo "<div class='success-message'>Film succesvol bijgewerkt!</div>";
    } else {
        echo "<div class='error-message'>Fout bij het bijwerken van de film.</div>";
    }
}
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

        <section class="update-movie-section" id="update-movie-section" style="display:none;">
            <h2>Film Bewerken</h2>
            <form method="POST" class="update-movie-form">
                <input type="hidden" id="update-id" name="id">
                <label for="update-title">Titel:</label>
                <input type="text" id="update-title" name="title" required>
        
                <label for="update-description">Beschrijving:</label>
                <textarea id="update-description" name="description" required></textarea>
        
                <label for="update-release_date">Release Datum:</label>
                <input type="date" id="update-release_date" name="release_date" required>
        
                <label for="update-duration">Duur (minuten):</label>
                <input type="number" id="update-duration" name="duration" required>
        
                <label for="update-poster">Poster URL:</label>
                <input type="text" id="update-poster" name="poster" required><br>
                <button type="submit" name="update_movie">Film Bewerken</button>
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
                            <button type="submit" name="delete_movie" class="btn-delete">Verwijder</button>
                        </form>
                        <button onclick="showUpdateForm(<?php echo $movie->id; ?>)" class="btn-edit">Bewerk</button>
                    </div>
                </div>
            <?php endforeach; ?>
        </section>

    </div>
</main>

<script>
    // Functie om de form te vullen met de gegevens van die pebaalde films als je erop klikt 
function showUpdateForm(id) {
    const movie = <?php echo json_encode($all_movies); ?>.find(movie => movie.id == id);
    document.getElementById('update-id').value = movie.id;
    document.getElementById('update-title').value = movie.title;
    document.getElementById('update-description').value = movie.description;
    document.getElementById('update-release_date').value = movie.release_date;
    document.getElementById('update-duration').value = movie.duration;
    document.getElementById('update-poster').value = movie.poster;
    document.getElementById('update-movie-section').style.display = 'block';
}
</script>

<?php include 'PHP/footer.php'; ?>