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
        try{
           $user = User::getInfos($email);
        }
        catch (Exception $e){
            echo"aucun compte";
        }
       
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
    if ($userIsBlocked) {
        header("Location: blocked_page.php");
    }
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $emailToCheck = $_POST['mail'];

    try {
        // Utilisez la fonction isEmailExists pour vérifier si l'e-mail existe déjà
        $emailExists = User::isEmailExists($emailToCheck);

        if ($emailExists) {
            echo "L'e-mail existe déjà dans la base de données.";
            // Ajoutez ici le reste du traitement, comme la vérification du mot de passe, etc.
        } else {
            // L'e-mail n'existe pas dans la base de données, affichez un message d'erreur ou redirigez vers la page d'inscription.
            $errors['connexion'] = "L'e-mail n'existe pas dans la base de données.";
        }
    } catch (Exception $e) {
        echo 'Erreur : ' . $e->getMessage();
    }
}

include("../views/view_signin.php");