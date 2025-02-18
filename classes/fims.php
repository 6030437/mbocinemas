<?php

require_once 'db.php';

class Films extends Database {
    public function getMovies() {
        $query = "SELECT * FROM movies";
        try {
            $stmt = $this->pdo->query($query);
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo "Error fetching movies: " . $e->getMessage();
            return [];
        }
    }

    public function addMovie($title, $description, $release_date, $duration, $poster) {
        $query = "INSERT INTO movies (title, description, release_date, duration, poster) VALUES (:title, :description, :release_date, :duration, :poster)";
        try {
            $stmt = $this->pdo->prepare($query);
            $stmt->execute([
                'title' => $title,
                'description' => $description,
                'release_date' => $release_date,
                'duration' => $duration,
                'poster' => $poster
            ]);
            return true;
        } catch (PDOException $e) {
            echo "Error adding movie: " . $e->getMessage();
            return false;
        }
    }

    public function deleteMovie($id) {
        $query = "DELETE FROM movies WHERE id = :id";
        try {
            $stmt = $this->pdo->prepare($query);
            $stmt->execute(['id' => $id]);
        } catch (PDOException $e) {
            echo "Error deleting movie: " . $e->getMessage();
        }
    }

    public function displayMovies() {
        $movies = $this->getMovies();
        foreach ($movies as $movie) {
            echo "Title: " . htmlspecialchars($movie->title) . "<br>";
            echo "Description: " . htmlspecialchars($movie->description) . "<br>";
            echo "Release Date: " . htmlspecialchars($movie->release_date) . "<br>";
            echo "Duration: " . htmlspecialchars($movie->duration) . " minutes<br>";
            echo "<img src='" . htmlspecialchars($movie->poster) . "' alt='Poster'><br><br>";
        }
    }

    public function reserveMovie($movie_id, $user_id) {
        $query = "INSERT INTO reservations (movie_id, user_id) VALUES (:movie_id, :user_id)";
        try {
            $stmt = $this->pdo->prepare($query);
            $stmt->execute([
                'movie_id' => $movie_id,
                'user_id' => $user_id
            ]);
        } catch (PDOException $e) {
            echo "Error reserving movie: " . $e->getMessage();
        }
    }

    public function getUserReservations($user_id) {
        $query = "SELECT movies.* FROM reservations JOIN movies ON reservations.movie_id = movies.id WHERE reservations.user_id = :user_id";
        try {
            $stmt = $this->pdo->prepare($query);
            $stmt->execute(['user_id' => $user_id]);
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo "Error fetching reservations: " . $e->getMessage();
            return [];
        }
    }

    public function updateMovie($id, $title, $description, $release_date, $duration, $poster) {
        $query = "UPDATE movies SET title = :title, description = :description, release_date = :release_date, duration = :duration, poster = :poster WHERE id = :id";
        try {
            $stmt = $this->pdo->prepare($query);
            $stmt->execute([
                'id' => $id,
                'title' => $title,
                'description' => $description,
                'release_date' => $release_date,
                'duration' => $duration,
                'poster' => $poster
            ]);
            return true;
        } catch (PDOException $e) {
            echo "Error updating movie: " . $e->getMessage();
            return false;
        }
    }
}

?>
