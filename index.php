<?php include 'PHP/header.php'; ?>

<?php
require_once 'classes/fims.php';
$films = new Films();
$all_movies = $films->getMovies();
$trending_movies = array_slice($all_movies, 0, 4); // Assuming the first 4 movies are trending
?>

<main>
    <div class="container">
        <section class="hero-section">
            <div class="hero-content">
                <p>Where great stories come to life. Experience the best in movies and entertainment.</p>
                <a href="films.php" class="btn-primary">Explore Our Movies</a>
            </div>
        </section>
        <div class="slideshow-container">
            <div class="slide fade">
                <img src="img/slide1.jpg" alt="Slide 1">
                <div class="caption">Caption for Slide 1</div>
            </div>
            <div class="slide fade">
                <img src="img/slide2.jpg" alt="Slide 2">
                <div class="caption">Caption for Slide 2</div>
            </div>
            <div class="slide fade">
                <img src="img/slide3.jpg" alt="Slide 3">
                <div class="caption">Caption for Slide 3</div>
            </div>
            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
            <a class="next" onclick="plusSlides(1)">&#10095;</a>
        </div>
        <div class="dot-container">
            <span class="dot" onclick="currentSlide(1)"></span>
            <span class="dot" onclick="currentSlide(2)"></span>
            <span class="dot" onclick="currentSlide(3)"></span>
        </div>

        <section class="trending-section">
            <h2>Trending Films</h2>
            <div class="trending-films">
                <?php foreach ($trending_movies as $movie): ?>
                    <div class="film-card">
                        <img src="<?php echo htmlspecialchars($movie->poster); ?>" alt="Poster">
                        <h3><?php echo htmlspecialchars($movie->title); ?></h3>
                        <p><?php echo htmlspecialchars($movie->description); ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>
    </div>
</main>

<?php include 'PHP/footer.php'; ?>
<script src="script.js"></script>
<link rel="stylesheet" href="CSS/style.css">