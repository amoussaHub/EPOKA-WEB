<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>EPOKA Missions</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
        <link rel="stylesheet" href="styles/indexCss.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
        <script src="JavaScript/home.js"></script>
    </head>
    <body>
        <div class="container-fluid">
            <p id="id" class="badge text-bg-success mt-2 mb-5">utilisateur n° <?= $_SESSION["id"] ?> connecté</p>
            <h1> Validation des missions de vos subordonnés</h1>
            <div class="container-fluid ms-2 me-2">
                <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nom du salarié</th>
                        <th scope="col">Prénom du salarié</th>
                        <th scope="col">Début de la mission</th>
                        <th scope="col">Fin de la mission</th>
                        <th scope="col">Lieu de la mission</th>
                        <th scope="col">Validation</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>John</td>
                        <td>Doe</td>
                        <td>@social</td>
                    </tr>
                    
                </tbody>
            </table>
            </div>
        </div>
    </body>
</html>