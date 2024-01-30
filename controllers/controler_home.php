<?php
session_start();

// verifi que l'utilisateur est connecté avant d'accéder à cette page
if (!isset($_SESSION['user'])) {
    header("Location: controler_signin.php");
    exit();
}

// Récupérez le pseudo de l'utilisateur depuis la session
$pseudo = $_SESSION['user']['user_pseudo'];

function deconnexionUtilisateur() {
    // Détruire toutes les données de session
    session_destroy();

    // Rediriger vers la page de connexion
    header("Location: controler_signin.php");
    exit();
}
// Si le formulaire de déconnexion est soumis
if (isset($_POST['logout'])) {
    deconnexionUtilisateur();
}

include('../views/view_home.php');


