<?php

$errors = array();
$showForm = true; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nom = isset($_POST["nom"]) ? trim($_POST["nom"]) : null;
    if (empty($nom) || !ctype_alpha($nom)) {
        $errors[] = "Le champ 'Nom' est obligatoire et doit contenir uniquement des lettres.";
    }

    $prenom = isset($_POST["prenom"]) ? trim($_POST["prenom"]) : null;
    if (empty($prenom) || !ctype_alpha($prenom)) {
        $errors[] = "Le champ 'Prénom' est obligatoire et doit contenir uniquement des lettres.";
    }

    $courriel = isset($_POST["courriel"]) ? trim($_POST["courriel"]) : null;
    if (empty($courriel) || !filter_var($courriel, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Le champ 'Courriel' est obligatoire et doit être au format d'une adresse email valide.";
    }

    $dateNaissance = isset($_POST["date_naissance"]) ? trim($_POST["date_naissance"]) : null;
    if (empty($dateNaissance)) {
        $errors[] = "Le champ 'Date de naissance' est obligatoire.";
    }

    $motDePasse = isset($_POST["mot_de_passe"]) ? trim($_POST["mot_de_passe"]) : null;
    $confirmationMotDePasse = isset($_POST["confirmation_mot_de_passe"]) ? trim($_POST["confirmation_mot_de_passe"]) : null;

    if (empty($motDePasse)) {
        $errors[] = "Le champ 'Mot de passe' est obligatoire.";
    } 
    elseif (strlen($motDePasse) < 8) {
        $errors[] = "Le mot de passe doit contenir au moins 8 caractères.";
    } 
    elseif ($motDePasse !== $confirmationMotDePasse) {
        $errors[] = "Les mots de passe ne correspondent pas.";
    }

    if (empty($errors)) {
        $showForm = false;
    }
}


include("view-signup.php");
?>
