<?php
session_start();

require_once "../config.php";
require_once "../models/utilisateur.php";
require_once "../models/database.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = isset($_POST["mail"]) ? trim($_POST["mail"]) : null;
    $password = isset($_POST["password"]) ? trim($_POST["password"]) : null;

    if (empty($email) || empty($password)) {
        echo "Veuillez remplir tous les champs du formulaire.";
        // exit();
    } else {
        $user = User::getInfos($email);
        if ($user) {
            if (password_verify($password, $user['user_password'])) {
                $_SESSION['user'] = $user;
                header("Location: ../controllers/controler_home.php");
                exit();
            } else {
                echo "Mot de passe incorrect.";
            }
        } else {
            echo "Aucun compte trouvé avec cette adresse e-mail.";
        }
    }
}

include("../views/view_signin.php");