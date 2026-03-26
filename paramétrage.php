<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>EPOKA Missions</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
        <link rel="stylesheet" href="styles/indexCss.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
        <script src="../JavaScript/parametrage.js"></script>
    </head>
    <body>
        <div class="container-fluid">
            <p id="user" class="badge text-bg-success mt-2 me-4">Utilisateur n°<?= $user ?> connecté</p>
            <p id="message" class=""></p>
            <h1 class="mb-5">Paramètrage de l'application</h1>
            <h2 class="mb-3">Montant du remboursement au km</h2>
            <form action="parametrageController.php" name="gestionParametreForm" method="post">
                <input type="hidden" name="user" value="<?= $user ?>">
                <label for="prixKm">Remboursement au Km : </label>
                <input type="text" name="prixKm" id="prixKm" value="<?= $parametres["prixKm"] ?>" class="me-2">
                <label for="indemniteHebergement">indemnité d'hébergement : </label>
                <input type="text" name="indemniteHebergement" id="indemniteHebergement" value="<?= $parametres["prixHebergement"] ?>" class="mb-2">
                <input type="submit" value="Valider" name="gestionParametre" class="mb-5">
            </form>
            <h2 class="mb-3">Distance entre villes</h2>
            <form action="parametrageController.php" name="gestionDistanceForm" method="post">
                <input type="hidden" name="user" value="<?= $user ?>">
                <label for="from">De : </label>
                <select name="from" id="from" class="me-2" style="width: 189px;height: 30px;">
                    <option disabled>Ville de départ</option>
                    <?php foreach ($villes as $ville): ?>
                        <option value = <?= $ville["idVille"] ?>><?= htmlspecialchars($ville["codePostal"]) ?>, <?= htmlspecialchars($ville["nomVille"]) ?></option>
                    <?php endforeach; ?>
                </select>
                <label for="to">à : </label>
                <select name="to" id="to" class="me-2" style="width: 189px;height: 30px;">
                    <option disabled>Ville d'arrivé</option>
                    <?php foreach ($villes as $ville): ?>
                        <option value = <?= $ville["idVille"] ?>><?= htmlspecialchars($ville["codePostal"]) ?>, <?= htmlspecialchars($ville["nomVille"]) ?></option>
                    <?php endforeach; ?>
                </select>
                <label for="distanceKm">Distance en Km : </label>
                <input type="text" name="distanceKm" id="distanceKm" class="mb-2">
                <input type="submit" value="Valider" name="gestionDistance" class="mb-5">
            </form>
            <h2 class="mb-3">Distance entre villes déjà saisies</h2>
            <div class="col-6">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">De</th>
                            <th scope="col">A</th>
                            <th scope="col">Distance en Km</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($distances as $distance): ?>
                            <tr>
                                <td><?= $distance['idVille1'] ?></td>
                                <td><?= $distance['idVille2'] ?></td>
                                <td><?= $distance['distance'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </body>
</html>