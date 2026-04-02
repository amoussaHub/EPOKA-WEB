<?php
    session_start();

    if (isset($_GET["isDeco"])) {
        session_destroy();
        header("location: ../index.html?isDeco=1");
    }

    if (!isset ($_POST["id"])) die ("ID absent");
    $id = $_POST["id"];
    if (!isset ($_POST["mdp"])) die ("Mot de passe absent");
    $mdp = $_POST["mdp"];

    try {
        $pdo = new PDO("mysql:host=127.0.0.1;dbname=epoka", "root", "",
        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

        $req = "SELECT * FROM salarie WHERE idSalarie = :id AND mdpSalarie = :mdp";

        $stmt = $pdo -> prepare ($req);
        $stmt -> bindParam (":id", $id);
        $stmt -> bindParam (":mdp", $mdp);
        $stmt -> execute ();

        $res = $stmt -> fetch(PDO :: FETCH_ASSOC);
    
        if ($res != false) {
            $_SESSION["id"] = $id;
            $_SESSION["peutValider"] = $res["peutValider"];
            $_SESSION["peutPayer"] = $res["peutPayer"];
            header("location: homeController.php");
        } else {
            header("location: ../index.html?erreur=1");
        }
    } catch (Exception $e) {
	    die ("Une erreur est surevenu : ". $e->getMessage()); 
    };
?>