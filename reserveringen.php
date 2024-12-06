<?php include 'PHP/header.php'; ?>
    <main>
        <h1>Reserveren</h1>
        <img src="path_to_film_image.jpg" alt="Film Afbeelding">
        <section class="film-info">
            <h2>Film Titel</h2>
            <p>Regisseur: Naam van de Regisseur</p>
            <p>Duur: 120 minuten</p>
            <p>Genre: Actie, Avontuur</p>
            <p>Beschrijving: Korte beschrijving van de film...</p>
        </section>
        <form action="reservering_verwerken.php" method="post">
            <label for="naam">Naam:</label>
            <input type="text" id="naam" name="naam" required><br><br>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required><br><br>
            <label for="aantal">Aantal Tickets:</label>
            <input type="number" id="aantal" name="aantal" min="1" required><br><br>
            <button type="submit">Reserveren</button>
        </form>
    </main>
<?php include 'PHP/footer.php'; ?>

