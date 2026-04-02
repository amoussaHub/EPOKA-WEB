<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>EPOKA Missions</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
        <link rel="stylesheet" href="../styles/indexCss.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
        <script src="../JavaScript/parametrage.js"></script>
    </head>
    <body>
        <div class="container-fluid">
            <p id="user" class="badge text-bg-success mt-2 me-4">Utilisateur n°<?= $id ?> connecté</p>
            <p id="message" class=""></p>
            <h1 class="mb-5">Paramètrage de l'application</h1>
            <div class="row column-gap-5 p-5">
                <div class="col-6"> 
                    <div class="row mb-5">
                        <div class="border rounded-3 shadow">
                            <h2 class="mb-3">Montant du remboursement au km</h2>
                            <form action="parametrageController.php" name="gestionParametreForm" method="post">
                                <!--<input type="hidden" name="user" value="<?= $user ?>">-->
                                <div class="row">
                                    <div class="col-4">
                                        <div class="row mb-3">
                                            <label for="prixKm">Remboursement au Km  </label>
                                        </div>
                                        <div class="row">
                                            <label for="indemniteHebergement">indemnité d'hébergement  </label>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="row mb-3">
                                            <input type="text" name="prixKm" id="prixKm" value="<?= $parametres["prixKm"] ?>" class=""><br>
                                        </div>
                                        <div class="row">
                                            <input type="text" name="indemniteHebergement" id="indemniteHebergement" value="<?= $parametres["prixHebergement"] ?>" class="mb-2"><br>
                                        </div>
                                    </div>
                                </div>
                                <input type="submit" value="Valider" name="gestionParametre" class="mb-3">
                            </form>
                        </div>
                    </div> 
                    <div class="row">
                        <div class="border rounded-3 shadow">
                            <h2 class="mb-3">Distance entre villes</h2>
                            <form action="parametrageController.php" name="gestionDistanceForm" method="post">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="row mb-3">
                                            <label for="from">De </label>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="to">À </label>
                                        </div>
                                        <div class="row">
                                            <label for="distanceKm">Distance en Km </label>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="row mb-3">
                                            <select name="from" id="from" class="" style="height: 30px;">
                                                <option disabled>Ville de départ</option>
                                                <?php foreach ($villes as $ville): ?>
                                                    <option value = <?= $ville["idVille"] ?>><?= htmlspecialchars($ville["codePostal"]) ?>, <?= htmlspecialchars($ville["nomVille"]) ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="row mb-3">
                                            <select name="to" id="to" class="" style="height: 30px;">
                                                <option disabled>Ville d'arrivé</option>
                                                <?php foreach ($villes as $ville): ?>
                                                    <option value = <?= $ville["idVille"] ?>><?= htmlspecialchars($ville["codePostal"]) ?>, <?= htmlspecialchars($ville["nomVille"]) ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="row">
                                            <input type="text" name="distanceKm" id="distanceKm" class="mb-2"><br>
                                        </div>
                                    </div>
                                </div>
                                <input type="submit" value="Valider" name="gestionDistance" class="mb-3">
                            </form>
                        </div>
                    </div>   
                </div>
                <div class="col-5">
                    <div class="row">
                        <div class="border rounded-3 shadow">
                        <h2 class="mb-3">Distance entre villes déjà saisies</h2>
                        <div class="col" style="scroll-behavior: smooth;">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">De</th>
                                        <th scope="col">À</th>
                                        <th scope="col">Distance en Km</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($distances as $distance): ?>
                                        <tr>
                                            <td><?= $distance['ville1'] ?></td>
                                            <td><?= $distance['ville2'] ?></td>
                                            <td><?= $distance['distance'] ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>