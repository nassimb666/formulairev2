<?php
session_start();

require_once "../config.php";
require_once "../models/utilisateur.php";

// Initialiser la variable qui détermine si le bouton doit être désactivé
$disableButton = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = isset($_POST["mail"]) ? trim($_POST["mail"]) : null;
    $password = isset($_POST["password"]) ? trim($_POST["password"]) : null;

    if (empty($email) || empty($password)) {
        echo "Veuillez remplir tous les champs du formulaire.";
        // Si les champs sont vides, désactiver le bouton
        $disableButton = true;
    } else {
        try {
            $db = Database::getInstance();
            $query = $db->prepare("SELECT * FROM `userprofil` WHERE `user_email` = :email LIMIT 1");
            $query->bindValue(':email', $email, PDO::PARAM_STR);
            $query->execute();
            $user = $query->fetch(PDO::FETCH_ASSOC);

            if ($user && password_verify($password, $user['user_password'])) {
                $_SESSION['user'] = $user;
                header("Location: dashboard.php");
                exit();
            } else {
                echo "Identifiants incorrects.";
                // Si les identifiants sont incorrects, désactiver le bouton
                $disableButton = true;
            }
        } catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
        }
    }
}
?>
