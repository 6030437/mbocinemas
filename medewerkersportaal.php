<?php
include 'dbconnectie.php';
session_start();

// Fetch data for movies, showtimes, and users
$movies = $pdo->query("SELECT * FROM movies")->fetchAll(PDO::FETCH_ASSOC);
$showtimes = $pdo->query("
    SELECT showtimes.id, movies.title, showtimes.showtime 
    FROM showtimes 
    JOIN movies ON showtimes.movie_id = movies.id
")->fetchAll(PDO::FETCH_ASSOC);
$users = $pdo->query("SELECT id, username, role FROM users")->fetchAll(PDO::FETCH_ASSOC);

// Handle form submissions
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['add_movie'])) {
        $stmt = $pdo->prepare("INSERT INTO movies (title, description, release_date, duration) VALUES (:title, :description, :release_date, :duration)");
        $stmt->execute([
            'title' => $_POST['title'],
            'description' => $_POST['description'],
            'release_date' => $_POST['release_date'],
            'duration' => $_POST['duration']
        ]);
        header("Location: index.php");
        exit;
    } elseif (isset($_POST['add_showtime'])) {
        $stmt = $pdo->prepare("INSERT INTO showtimes (movie_id, showtime) VALUES (:movie_id, :showtime)");
        $stmt->execute([
            'movie_id' => $_POST['movie_id'],
            'showtime' => $_POST['showtime']
        ]);
        header("Location: index.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bioscoop Beheer</title>
    <link rel="stylesheet" href="portal.css">
</head>
<body>
<header>
    <h1>Bioscoop Beheerportaal</h1>
</header>
<main>
    <section>
        <h2>Films</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Titel</th>
                    <th>Beschrijving</th>
                    <th>Release Datum</th>
                    <th>Duur (min)</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($movies as $movie): ?>
                    <tr>
                        <td><?= htmlspecialchars($movie['id']) ?></td>
                        <td><?= htmlspecialchars($movie['title']) ?></td>
                        <td><?= htmlspecialchars($movie['description']) ?></td>
                        <td><?= htmlspecialchars($movie['release_date']) ?></td>
                        <td><?= htmlspecialchars($movie['duration']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <h3>Film Toevoegen</h3>
        <form method="POST">
            <input type="text" name="title" placeholder="Titel" required>
            <textarea name="description" placeholder="Beschrijving" required></textarea>
            <input type="date" name="release_date" required>
            <input type="number" name="duration" placeholder="Duur (min)" required>
            <button type="submit" name="add_movie">Toevoegen</button>
        </form>
    </section>

    <section>
        <h2>Showtimes</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Film</th>
                    <th>Showtime</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($showtimes as $showtime): ?>
                    <tr>
                        <td><?= htmlspecialchars($showtime['id']) ?></td>
                        <td><?= htmlspecialchars($showtime['title']) ?></td>
                        <td><?= htmlspecialchars($showtime['showtime']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <h3>Showtime Toevoegen</h3>
        <form method="POST">
            <select name="movie_id" required>
                <?php foreach ($movies as $movie): ?>
                    <option value="<?= htmlspecialchars($movie['id']) ?>"><?= htmlspecialchars($movie['title']) ?></option>
                <?php endforeach; ?>
            </select>
            <input type="datetime-local" name="showtime" required>
            <button type="submit" name="add_showtime">Toevoegen</button>
        </form>
    </section>

    <section>
        <h2>Gebruikers</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Gebruikersnaam</th>
                    <th>Rol</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?= htmlspecialchars($user['id']) ?></td>
                        <td><?= htmlspecialchars($user['username']) ?></td>
                        <td><?= htmlspecialchars($user['role']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </section>
</main>
</body>
</html>