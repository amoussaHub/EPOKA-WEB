<?php
    session_start();
    if (!isset ($_SESSION["id"])) die ("ID absent");
    $id = $_SESSION["id"];
    $peutValider = $_SESSION["peutValider"];
    $peutPayer = $_SESSION["peutPayer"];

    if (isset($_POST["page"])) $page = $_POST["page"];
    if (isset($_POST["btnValider"])) {
        $btnValider = $_POST["btnValider"];
        $idMission = $_POST["idMission"];
    } 
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
            } else if ($page == "paramètrage" && empty($peutPayer)) {
                $messageBlocagePage = "Vous n'êtes pas responsable de la gestion des paramètres";
                $btnValidationClass = "";
                $btnPaiementsFraisClass = "";
                $btnParametrageClass = "disabled";
                $btnValidatioMissionLocation = "homeController.php";

                include '../header.php';
                include '../blocagePage.php';
                die("");
            } else if ($page == "paiements" && !empty($peutPayer)) {
                header("location: paiementFraisController.php");
            } else if ($page == "paramètrage" && !empty($peutPayer)) {
                header("location: parametrageController.php");
            }
        }
        
        if (isset($btnValider)) {
            $req2 = "UPDATE mission SET Valide = 1 WHERE idMission = :idMission";
            
            $stmt2 = $pdo -> prepare ($req2);
            $stmt2 -> bindParam (":idMission", $idMission);
            
            $stmt2 -> execute ();
            
        }

        $req = "SELECT *
                FROM mission M INNER JOIN ville VA ON M.idVilleMission = VA.idVille
                INNER JOIN salarie S ON S.idSalarie = M.idSalarieMission
                INNER JOIN agence A ON A.idAgence = S.idAgenceSalarie
                INNER JOIN ville VD ON A.idVilleAgence = VD.idVille
                INNER JOIN parametre
                LEFT JOIN distance D ON D.idVille1 = VD.idVille AND D.idVille2 = VA.idVille
                WHERE idResponsable = :id";

        $stmt = $pdo -> prepare ($req);
        $stmt -> bindParam (":id", $id);
        $stmt -> execute ();
                
        $resultat = $stmt -> fetchAll(PDO :: FETCH_ASSOC);

        

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