<?php
    if (!isset ($_POST["id"])) die ("ID absent");
    if (!isset ($_POST["page"])) die ("intitulé de page absent");
    $id = $_POST["id"];
    $page = $_POST["page"];
    try {
        $pdo = new PDO("mysql:host=127.0.0.1;dbname=epoka", "root", "",
        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

        $req = "SELECT peutValider, peutPayer FROM salarie WHERE idSalarie = :id";

        $stmt = $pdo -> prepare ($req);
        $stmt -> bindParam (":id", $id);
        $stmt -> execute ();

        $res = $stmt -> fetch(PDO :: FETCH_ASSOC);
    
        if ($res["peutValider"] == false && $res["peutPayer"] == false) {
            header("location: ../blocagePage.html?user=$id");
        } else {
            if ($page == "paiement") {
                header("location: paiementFraisController.php?user=$id");
            } else if ($page == "paramètrage"){
                header("location: parametrageController.php?user=$id");
            }
        }


    } catch (Exception $e) {
	    die ("Une erreur est surevenu : ". $e->getMessage()); 
    };
?>