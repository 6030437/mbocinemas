<?php 
include 'PHP/header.php'; 

if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') {
    header('Location: inlogpagina.php');
    exit;
}

$reserveringen = [
    ['naam' => 'John Doe', 'film' => 'Avatar', 'aantal' => 2],
    ['naam' => 'Jane Smith', 'film' => 'The Matrix', 'aantal' => 4],
];

$films = [
    ['titel' => 'Avatar', 'prijs' => 12.50],
    ['titel' => 'The Matrix', 'prijs' => 10.00],
];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['film_toevoegen'])) {
        $new_film = [
            'titel' => htmlspecialchars($_POST['titel']), 
            'prijs' => (float) $_POST['prijs']
        ];
        $films[] = $new_film;
        $success_message = "Nieuwe film toegevoegd: " . htmlspecialchars($_POST['titel']);
    } elseif (isset($_POST['prijs_aanpassen'])) {
        foreach ($films as &$film) {
            if ($film['titel'] === $_POST['titel']) {
                $film['prijs'] = (float) $_POST['prijs'];
                $success_message = "Prijs aangepast voor: " . htmlspecialchars($_POST['titel']);
                break;
            }
        }
    }
}
?>

<header>
    <h1>Medewerkersportaal - Bioscoop</h1>
</header>
<main>
    <?php if (isset($success_message)): ?>
        <p class="success-message"><?= $success_message ?></p>
    <?php endif; ?>

    <section class="beheer-sectie">
        <h2>Reserveringen Overzicht</h2>
        <table>
            <thead>
                <tr>
                    <th>Naam</th>
                    <th>Film</th>
                    <th>Aantal Tickets</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($reserveringen as $reservering): ?>
                    <tr>
                        <td><?= htmlspecialchars($reservering['naam']) ?></td>
                        <td><?= htmlspecialchars($reservering['film']) ?></td>
                        <td><?= htmlspecialchars($reservering['aantal']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </section>

    <section class="beheer-sectie">
        <h2>Film Toevoegen</h2>
        <form method="POST">
            <label for="titel">Titel:</label>
            <input type="text" id="titel" name="titel" required>
            <label for="prijs">Prijs (&euro;):</label>
            <input type="number" id="prijs" name="prijs" step="0.01" required>
            <button type="submit" name="film_toevoegen">Toevoegen</button>
        </form>
    </section>

    <section class="beheer-sectie">
        <h2>Prijs Aanpassen</h2>
        <form method="POST">
            <label for="titel">Film Titel:</label>
            <select id="titel" name="titel" required>
                <?php foreach ($films as $film): ?>
                    <option value="<?= htmlspecialchars($film['titel']) ?>">
                        <?= htmlspecialchars($film['titel']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <label for="prijs">Nieuwe Prijs (&euro;):</label>
            <input type="number" id="prijs" name="prijs" step="0.01" required>
            <button type="submit" name="prijs_aanpassen">Aanpassen</button>
        </form>
    </section>
</main>
<script src="portal.js"></script>
<?php include 'PHP/footer.php'; ?>
