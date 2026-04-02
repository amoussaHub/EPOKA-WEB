<?php
    session_start();
    if (!isset ($_SESSION["id"])) die ("ID absent");

    //variables header
    $btnValidationClass = "";
    $btnPaiementsFraisClass = "disabled";
    $btnParametrageClass = "";
    $btnValidatioMissionLocation = "homeController.php";

    try {
        $pdo = new PDO("mysql:host=127.0.0.1;dbname=epoka", "root", "",
        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

        include '../header.php';
        include '../paiementFrais.php'; 

    } catch (Exception $e) {
	    die ("Une erreur est surevenu : ". $e->getMessage()); 
    };
?>