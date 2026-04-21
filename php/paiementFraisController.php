<?php
    session_start();
    if (!isset ($_SESSION["id"])) die ("ID absent");
    $id = $_SESSION["id"];

    if (isset($_POST["btnRembourser"])) {
        $btnRembourser = $_POST["btnRembourser"];
        $idMission = $_POST["idMission"];
    } 

    /** variables header **/
    $btnValidationClass = "";
    $btnPaiementsFraisClass = "disabled";
    $btnParametrageClass = "";
    $btnValidatioMissionLocation = "homeController.php";

    try {
        $pdo = new PDO("mysql:host=127.0.0.1;dbname=epoka", "root", "",
        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

        if (isset($btnRembourser)) {
            $req3 = "UPDATE mission SET Payee = 1 WHERE idMission = :idMission";
            
            $stmt3 = $pdo -> prepare ($req3);
            $stmt3 -> bindParam (":idMission", $idMission);
            
            $stmt3 -> execute ();
            
        }

        $req = "SELECT *
                FROM mission M INNER JOIN ville VA ON M.idVilleMission = VA.idVille
                INNER JOIN salarie S ON S.idSalarie = M.idSalarieMission
                INNER JOIN agence A ON A.idAgence = S.idAgenceSalarie
                INNER JOIN ville VD ON A.idVilleAgence = VD.idVille
                INNER JOIN parametre
                LEFT JOIN distance D ON D.idVille1 = VD.idVille AND D.idVille2 = VA.idVille
                WHERE idResponsable = :id AND valide = 1";

        $stmt = $pdo -> prepare ($req);
        $stmt -> bindParam (":id", $id);
        $stmt -> execute ();        
        $resultat = $stmt -> fetchAll(PDO :: FETCH_ASSOC);


        $req2 = "SELECT * FROM parametre";
        $stmt2 = $pdo -> prepare ($req2);
        $stmt2 -> execute ();
        $parametre = $stmt2 -> fetch(PDO :: FETCH_ASSOC);

        $prixKm = $parametre["prixKm"];
        $prixHebergement = $parametre["prixHebergement"];
        

        function calculRemboursement ($distance, $debutMission, $finMission) {
            global $pdo;
            global $prixKm;
            global $prixHebergement;

            $remboursement = 0;
            $gestionParametre = "";

            if ($distance == null) {
                $gestionParametre = "<a href='parametrageController.php'>ajouter la distance</a>";
            } else {
                $debutMission = date_create($debutMission);
                $finMission = date_create($finMission);
                $dureeMission = date_diff($debutMission, $finMission);
                $dureeMission = (int)$dureeMission->days;

                $remboursement = ($distance * $prixKm) + ($dureeMission * $prixHebergement);
            }

            if ($distance == null) {
                return $gestionParametre;
            } else {
                return $remboursement;
            }
            
        }

        include '../header.php';
        include '../paiementFrais.php'; 

    } catch (Exception $e) {
	    die ("Une erreur est surevenu : ". $e->getMessage()); 
    };
?>