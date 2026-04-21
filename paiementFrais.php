<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>EPOKA Missions</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
        <link rel="stylesheet" href="styles/indexCss.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
        <script src="JavaScript/"></script>
    </head>
    <body>
        <div class="container-fluid">
            <p id="id" class="badge text-bg-success mt-2 mb-5">utilisateur n° <?= $_SESSION["id"] ?> connecté</p>
            <h1> Paiement des missions</h1>
            <div class="container-fluid ms-2 me-2 mt-5">
            <div class="container-fluid ms-2 me-2 mt-5">
                <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nom du salarié</th>
                        <th scope="col">Prénom du salarié</th>
                        <th scope="col">Début de la mission</th>
                        <th scope="col">Fin de la mission</th>
                        <th scope="col">Lieu de la mission</th>
                        <th scope="col">Montant</th>
                        <th scope="col">Paiement</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $numRow = 0;
                        foreach ($resultat as $res):
                            $numRow += 1; 
                    ?>
                        <tr>
                            <th scope="row"><?= $numRow ?></th>
                            <td><?= $res["nomSalarie"] ?></td>
                            <td><?= $res["prenomSalarie"] ?></td>
                            <td><?= $res["DateDebutMission"] ?></td>
                            <td><?= $res["DateFinMission"] ?></td>
                            <td><?= $res["nomVille"] ?></td>
                            <td><?= calculRemboursement($res["distance"], $res["DateDebutMission"], $res["DateFinMission"]); ?></td>
                            <?php if ($res["Payee"] == 0 && $res["distance"] == null) : ?>
                                <form action="paiementFraisController.php" method="post">
                                    <td><input type="submit" name="btnRembourser" value="Rembourser" disabled></td>
                                    <input type=hidden name="idMission" value="<?= $res["idMission"] ?>">
                                </form>
                            <?php endif; ?>
                            <?php if ($res["Payee"] == 0 && $res["distance"] != null) : ?>
                                <form action="paiementFraisController.php" method="post">
                                    <td><input type="submit" name="btnRembourser" value="Rembourser" ></td>
                                    <input type=hidden name="idMission" value="<?= $res["idMission"] ?>">
                                </form>
                            <?php endif; ?>
                            <?php if ($res["Payee"] == 1) : ?>
                                <td>Remboursée</td>
                            <?php endif; ?>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            </div>
        </div>
        </div>
    </body>
</html>