<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>EPOKA Missions</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
        <link rel="stylesheet" href="styles/indexCss.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
        <script src="JavaScript/blocagePage.js"></script>
    </head>
    <body>
        <div class="container-fluid">
            <p id="id" class="badge text-bg-success mt-2 mb-5">utilisateur n° <?= $_SESSION["id"] ?> connecté</p>
            <div class="col position-absolute top-50 start-50 translate-middle">
                <p class="badge text-bg-danger mt-2" style="font-size: 32px;"><?= $messageBlocagePage ?></p><br>
            </div>
        </div>
    </body>
</html>