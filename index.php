<?php include 'PHP/header.php'; ?>
<section class="hahaa">
        <input type="text" placeholder="Film Zoeken">
        <h3>Alle films, naar uw keuze!</h3>
        <select>
            <option value="1">Comedy</option>
            <option value="2">Actie</option>
            <option value="3">Drama</option>
        </select>
    </section>
<main class="carousel-body">
<div class="carousel-container">
    <button class="arrow left-arrow" onclick="prevImage()">&#8592;</button>
    <div class="carousel">
      <div class="carousel-images">
        <img src="Images\il_fullxfull.2412674268_1sgm.jpg" alt="Afbeelding 1">
        <img src="Images\legomovie.jpg" alt="Afbeelding 2">
        <img src="Images\menace.jpg" alt="Afbeelding 3">
        <img src="Images\Poster-Minions-Despicable-Me-4-61x91-5cm-Abystyle-GBYDCO667_51d56252-e6b0-47ff-8ae0-d3756aca25a1.jpg" alt="Afbeelding 4">
        <img src="Images\scarface-movie-i8166.jpg" alt="Afbeelding 5">
      </div>
    </div>
    <button class="arrow right-arrow" onclick="nextImage()">&#8594;</button>
  </div>
  <script src="JS\carousel.js"></script></main>
<?php include 'PHP/footer.php'; ?>