<?php
    session_start();
    if (!isset($_SESSION["id"])) die ("ID user absent");
    $id = $_SESSION["id"];
  
    //variables header
    $btnValidationClass = "";
    $btnPaiementsFraisClass = "";
    $btnParametrageClass = "disabled";
    $btnValidatioMissionLocation = "homeController.php";
    
    try {
        $pdo = new PDO("mysql:host=127.0.0.1;dbname=epoka", "root", "",
        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

        $req = "SELECT idVille, nomVille, codeCategorieVille, codePostal FROM ville ORDER BY codeCategorieVille, nomVille";
        $stmt = $pdo -> prepare ($req);
        $stmt -> execute ();
        $villes = $stmt -> fetchAll(PDO :: FETCH_ASSOC);

        $req2 = "SELECT * FROM parametre";
        $stmt2 = $pdo -> prepare ($req2);
        $stmt2 -> execute ();
        $parametres = $stmt2 -> fetch(PDO :: FETCH_ASSOC);

        //$req3 = "SELECT * FROM distance";
        $req3 = "SELECT v1.nomVille AS ville1, v2.nomVille AS ville2, distance FROM distance INNER JOIN Ville v1 ON distance.idVille1 = v1.idVille INNER JOIN Ville v2 ON distance.idVille2 = v2.idVille;";
        $stmt3 = $pdo -> prepare ($req3);
        $stmt3 -> execute ();
        $distances = $stmt3 -> fetchAll(PDO :: FETCH_ASSOC);
        
        if (isset($_POST["gestionParametre"])) {
            $prixKm = $_POST["prixKm"];
            $indemniteHebergement = $_POST["indemniteHebergement"];

            $req4 = "UPDATE parametre SET prixKm = :prixKm, prixHebergement = :indemniteHebergement";
            $stmt4 = $pdo -> prepare ($req4);
            $stmt4 -> bindParam (":prixKm", $prixKm);
            $stmt4 -> bindParam (":indemniteHebergement", $indemniteHebergement);
            $stmt4 -> execute ();

            header("location: parametrageController.php?modifParam=1");
        }
        //die ("dsfsrf");
        if (isset($_POST["gestionDistance"])) {
            $villeDepart = $_POST["from"];
            $villeArrive = $_POST["to"];
            $distanceKm = $_POST["distanceKm"];

            $req5bis = "SELECT * FROM distance WHERE idVille1 = :ville1 AND idVille2 = :ville2";
            $stmt5bis = $pdo -> prepare ($req5bis);
            $ville1 = min($villeDepart, $villeArrive);
            $ville2 = max($villeDepart, $villeArrive);
            $stmt5bis -> bindParam (":ville1", $ville1);
            $stmt5bis -> bindParam (":ville2", $ville2);
            $stmt5bis -> execute ();
            $resReq5bis = $stmt5bis -> fetch(PDO :: FETCH_ASSOC);
            
            
            if (empty($resReq5bis)) {
                $req5 = "INSERT INTO distance(idVille1, idVille2, distance) 
                        VALUES(:ville1, :ville2, :distanceKm)";
                $stmt5 = $pdo -> prepare ($req5);
                $ville1 = min($villeDepart, $villeArrive);
                $ville2 = max($villeDepart, $villeArrive);
                $stmt5 -> bindParam (":ville1", $ville1);
                $stmt5 -> bindParam (":ville2", $ville2);
                $stmt5 -> bindParam (":distanceKm", $distanceKm);
                
                $stmt5 -> execute ();

                header("location: parametrageController.php?modifParam=2");
            } else {
                header("location: parametrageController.php?modifParam=3");
            }
            
        }

        include '../header.php';
        include '../paramétrage.php'; 

    } catch (Exception $e) {
	    die ("Une erreur est surevenu : ". $e->getMessage()); 
    };
?>