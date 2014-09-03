<?php

session_start();
require_once("business/gebruikersservice.class.php");
require_once("business/postcodeservice.class.php");
require_once("exceptions/gebrexception.class.php");
//
// Action = process = controleer of gebruiker kan inloggen
//
if (isset($_GET["action"])) {
    if ($_GET["action"] == "process") {
        //
        // Check user en paswoord bestaat nog niet, if so give an error, pass it onto presentation form 
        //
        try {
            GebruikerinfoService::Bestaat_Gebr_Pasw($_POST["usernaam"], sha1($_POST["wachtwoord"]));
        } catch (GebrPaswBestaatNietException $tbe) {
            $error = "gebr_pasw_niet_ok";
            include("presentation/pizzashop_home.php");
            exit(0);
        }
        //
        // Check niet actief (geblokkeerd), if so give an error, pass it onto presentation form 
        //
        $actief = GebruikerinfoService::Get_Gebr_Actief($_POST["usernaam"]);
        if ($actief == 0) {
            $error = "gebr_actief_niet_ok";
            include("presentation/pizzashop_home.php");
            exit(0);
        }
        // 
        // Aanmaken van de cookie
        //
        setcookie("aangemeld", $_POST["usernaam"], time() + 24 * 3600);        // we kunnen doorgaan en gebruiker toelaten 
        // 
        // Weghalen van de sessievariabele waarin de bestellingsid zit bewaard
        // 
        if (isset($_SESSION["best_id"])) {
            unset($_SESSION["best_id"]);
        }
    }
} else {
    // if error then pass parameter $error to presentation form
    if (isset($_GET["error"])) {
        $error = $_GET["error"];
    } else {
        if (!isset($error)) {
            $error = null;
        }
    }
    include("presentation/pizzashop_home.php");
}
    