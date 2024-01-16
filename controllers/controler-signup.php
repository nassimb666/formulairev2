<?php

$errors = array();
$showForm = true; 
require_once "../config.php";
require_once "../models/utilisateur.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {


    $courriel = isset($_POST["mail"]) ? trim($_POST["mail"]) : null;
    if (empty($courriel) || !filter_var($courriel, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Le champ 'Courriel' est obligatoire et doit être au format d'une adresse email valide.";
    }
    var_dump($_POST);
    // Define other variables used in the query
    $pseudo = isset($_POST["pseudo"]) ? trim($_POST["pseudo"]) : null;
    $birthdate = isset($_POST["date"]) ? trim($_POST["date"]) : null;
    $mail = $courriel;  // Using the corrected email variable
    $password = isset($_POST["password"]) ? trim($_POST["password"]) : null;
    $enterprise = isset($_POST["entreprise"]) ? trim($_POST["entreprise"]) : null;
    $user_validate=1;
    $nom = isset($_POST["nom"]) ? trim($_POST["nom"]) : null;
    $prenom = isset($_POST["prenom"]) ? trim($_POST["prenom"]) : null;
    
   
    // Check for errors
    var_dump($errors);

    if (empty($errors)) {
        // Handle successful registration
        // For example, you can redirect the user to a success page
        user::create($user_validate,$nom, $prenom, $pseudo, $birthdate, $mail, $password, $enterprise);
        // header("Location: success.php");
        exit();
    }
}

include("../views/view-signup.php");
?>

