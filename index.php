<?php include 'PHP/header.php'; ?>
<main>
    <section class="slideshow-container">
        <section class="slide fade">
            <img src="img/joker.jpeg" alt="Image 1">
            <p class="caption">Caption for Image 1</p>
        </section>
        <section class="slide fade">
            <img src="img/matrix.jpeg" alt="Image 2">
            <p class="caption">Caption for Image 2</p>
        </section>
        <section class="slide fade">
            <img src="img/titanic.jpeg" alt="Image 3">
            <p class="caption">Caption for Image 3</p>
        </section>
        
        <!-- Navigatieknoppen -->
        <a class="prev" onclick="changeSlide(-1)">&#10094;</a>
        <a class="next" onclick="changeSlide(1)">&#10095;</a>
    </section>

    <section class="dot-container">
        <span class="dot" onclick="currentSlide(1)"></span>
        <span class="dot" onclick="currentSlide(2)"></span>
        <span class="dot" onclick="currentSlide(3)"></span>
    </section>
</main>
<?php include 'PHP/footer.php'; ?>
<script src="script.js"></script>
<script src="script2.js"></script>