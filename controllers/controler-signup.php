<?php

$errors = array();
$showForm = true; 
require_once "../config.php";
require_once "../models/utilisateur.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $courriel = isset($_POST["mail"]) ? trim($_POST["mail"]) : null;
    
    // Validation de l'adresse e-mail
    if (empty($courriel) || !filter_var($courriel, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Le champ 'Courriel' est obligatoire et doit être au format d'une adresse email valide.";
    }

    // Validation des champs du formulaire
    $pseudo = isset($_POST["pseudo"]) ? trim($_POST["pseudo"]) : null;
    $birthdate = isset($_POST["date"]) ? trim($_POST["date"]) : null;
    $password = isset($_POST["password"]) ? trim($_POST["password"]) : null;
    $enterprise = isset($_POST["entreprise"]) ? trim($_POST["entreprise"]) : null;
    $user_validate = 1;
    $nom = isset($_POST["nom"]) ? trim($_POST["nom"]) : null;
    $prenom = isset($_POST["prenom"]) ? trim($_POST["prenom"]) : null;

    if (empty($errors)) {
        // Handle successful registration
        try {
            user::create($user_validate, $nom, $prenom, $pseudo, $birthdate, $courriel, $password, $enterprise);
            header("Location: ../views/success.php");
            exit();
        } catch (Exception $e) {
            // Gérer l'erreur de manière appropriée (par exemple, afficher un message à l'utilisateur)
            $errors[] = "Une erreur s'est produite lors de l'enregistrement.";
        }
    }
}

include("../views/view-signup.php");

