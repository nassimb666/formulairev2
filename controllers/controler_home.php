<?php
session_start();

// Assurez-vous que l'utilisateur est connecté avant d'accéder à cette page
if (!isset($_SESSION['user'])) {
    header("Location: controler_signin.php");
    exit();
}

// Récupérez le pseudo de l'utilisateur depuis la session
$pseudo = $_SESSION['user']['user_pseudo'];


include('../views/view_home.php');
