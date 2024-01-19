<?php
session_start();

require_once "../config.php";
require_once "../models/utilisateur.php";
require_once"../models/database.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = isset($_POST["mail"]) ? trim($_POST["mail"]) : null;
    $password = isset($_POST["password"]) ? trim($_POST["password"]) : null;

    if (empty($email) || empty($password)) {
        echo "Veuillez remplir tous les champs du formulaire.";
        // exit();
    } else {
        try {
            $db = Database::getInstance();
            $query = $db->getConnection()->prepare("SELECT * FROM `userprofil` WHERE `user_email` = :email LIMIT 1");
            $query->bindValue(':email', $email, PDO::PARAM_STR);
            $query->execute();
            $user = $query->fetch(PDO::FETCH_ASSOC);

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
        } catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
        }
    }
}

include("../views/view_signin.php");