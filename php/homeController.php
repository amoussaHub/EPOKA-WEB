<?php
    session_start();
    if (!isset ($_SESSION["id"])) die ("ID absent");
    $id = $_SESSION["id"];
    $peutValider = $_SESSION["peutValider"];
    $peutPayer = $_SESSION["peutPayer"];
    if (isset ($_POST["page"])) $page = $_POST["page"];

    /** variables header **/
    $btnValidationClass = "disabled";
    $btnPaiementsFraisClass = "";
    $btnParametrageClass = "";
    $btnValidatioMissionLocation = "";

    try {
        $pdo = new PDO("mysql:host=127.0.0.1;dbname=epoka", "root", "",
        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

        if (isset($page)){
            if ($page == "paiements" && empty($peutPayer)) {
                $messageBlocagePage = "Vous n'êtes pas responsable de la gestion des frais";
                $btnValidationClass = "";
                $btnPaiementsFraisClass = "disabled";
                $btnParametrageClass = "";
                $btnValidatioMissionLocation = "homeController.php";

                include '../header.php';
                include '../blocagePage.php';
                die("");
                //header("location: ../blocagePage.php");
            } else if ($page == "paramètrage" && empty($peutPayer)) {
                $messageBlocagePage = "Vous n'êtes pas responsable de la gestion des paramètres";
                $btnValidationClass = "";
                $btnPaiementsFraisClass = "";
                $btnParametrageClass = "disabled";
                $btnValidatioMissionLocation = "homeController.php";

                include '../header.php';
                include '../blocagePage.php';
                die("");
                //header("location: ../blocagePage.php");
            } else if ($page == "paiements" && !empty($peutPayer)) {
                header("location: paiementFraisController.php");
            } else if ($page == "paramètrage" && !empty($peutPayer)) {
                header("location: parametrageController.php");
            }
        }
        
        
        /*$req = "SELECT peutValider, peutPayer FROM salarie WHERE idSalarie = :id";

        $stmt = $pdo -> prepare ($req);
        $stmt -> bindParam (":id", $id);
        $stmt -> execute ();

        $res = $stmt -> fetch(PDO :: FETCH_ASSOC);
    
        if ($res["peutValider"] == false && $res["peutPayer"] == false) {
            header("location: ../blocagePage.html?user=$id");
        } else {
            if ($page == "paiement") {
                header("location: ../paiementFrais.html?user=$id");
            } else if ($page == "paramètrage"){
                header("location: parametrageController.php?user=$id");
            }
        }*/

        include '../header.php';
        if (!empty($peutValider)) {
            include '../home.php';
        } else {
            $messageBlocagePage = "Vous ne pouvez pas valider des missions";
            include '../blocagePage.php';
        }
    } catch (Exception $e) {
	    die ("Une erreur est surevenu : ". $e->getMessage()); 
    };
?>