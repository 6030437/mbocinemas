<?php include 'PHP/header.php'; ?>

<main>
    <div class="container">
    <section class="hero-section">
            <div class="hero-content">
                <h2>Welcome to MBO Cinemas</h2>
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
    </div>
</main>

<?php include 'PHP/footer.php'; ?>
<script src="script.js"></script>
<link rel="stylesheet" href="CSS/style.css">