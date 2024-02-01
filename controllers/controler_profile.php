<?php

session_start();
require_once("../config.php");

require_once("../models/ride.php");
require_once("../models/utilisateur.php");
require_once("../models/profil.php");


$user_id = $_SESSION["user"]["user_id"];
$name = $_SESSION['user']['user_name'];
$firstname = $_SESSION['user']['user_firstname'];
$pseudo = $_SESSION['user']['user_pseudo'];
$description = $_SESSION['user']['user_describ'];
$mail = $_SESSION['user']['user_email'];
$birthdate = $_SESSION['user']['date_FR'];
$photo = $_SESSION['user']['user_photo'];
$userIdToDelete = $_SESSION['user']['user_id'];
 
// var_dump($_FILES);
// var_dump($_POST);
// var_dump($_SESSION);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Assurez-vous que le bouton "Modifier" est défini dans la requête POST
    if (isset($_POST['edit_name'])) {
        // Récupérer la nouvelle valeur depuis le formulaire 
        $newName = $_POST['new_name'];
        // Mettre à jour le nom dans la base de données
        user::updateName($user_id, $newName);
        $_SESSION['user']['user_name'] = $newName;

    } 
    if (isset($_POST['edit_firstname'])) {
        // Récupérer la nouvelle valeur depuis le formulaire 
        $newFirstname = $_POST['new_firstname'];
        // Mettre à jour le prénom dans la base de données
        user::updateFirstname($user_id, $newFirstname);
        $_SESSION['user']['user_firstname'] = $newFirstname;
    } 
    if (isset($_POST['edit_pseudo'])) {
        // Récupérer la nouvelle valeur depuis le formulaire 
        $newPseudo = $_POST['new_pseudo'];
        // Mettre à jour le pseudo dans la base de données
        user::updatePseudo($user_id, $newPseudo);
        $_SESSION['user']['user_pseudo'] = $newPseudo;

        
    } 
    if (isset($_POST['edit_description'])) {
        // Récupérer la nouvelle valeur depuis le formulaire 
        $newDescription = $_POST['new_description'];
        
        // Mettre à jour la description dans la base de données
        user::updateDescription($user_id, $newDescription);
        $_SESSION['user']['user_describ'] = $newDescription;

    } 
    if (isset($_POST['edit_mail'])) {
        // Récupérer la nouvelle valeur depuis le formulaire 
        $newMail = $_POST['new_mail'];

        // Mettre à jour le mail dans la base de données
        user::updateMail($user_id, $newMail);
        $_SESSION['user']['user_email'] = $newMail;
    } 
    if (isset($_POST['edit_birthdate'])) {
        // Récupérer la nouvelle valeur depuis le formulaire 
        $newBirthdate = $_POST['new_birthdate'];
        
        // Mettre à jour la date de naissance dans la base de données
        user::updateBirthdate($user_id, $newBirthdate);
        $_SESSION['user']['user_dateofbirth'] = $newBirthdate;
    }

   
    if (isset($_POST['edit_photo'])) {
        $userId = $_SESSION['user']['user_id'];
       
        // Vérifiez si un fichier a été correctement téléchargé
        if (isset($_FILES['new_photo']) && $_FILES['new_photo']['error'] === 0) {
            $uploadDir = "../assets/img"; // Remplacez par le répertoire où vous souhaitez stocker les photos
            $uploadFile = $uploadDir . "/" . basename($_FILES['new_photo']['name']);
    
            // Déplacez le fichier téléchargé vers le répertoire souhaité
            if (move_uploaded_file($_FILES['new_photo']['tmp_name'], $uploadFile)) {
                // Mettez à jour le chemin de la photo dans la base de données
                user::updatePhoto($userId, $_FILES['new_photo']['name']);
    
                // Mise à jour de la session avec le nouveau chemin de la photo
                $_SESSION['user']['user_photo'] = $_FILES['new_photo']['name'];
            } else {
                echo "Erreur lors du téléchargement du fichier.";
            }
        }
    }
    

    // Rediriger l'utilisateur après la modification
    header("Location: ../controllers/controler_profile.php");
    exit;
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['delete_user'])) {
        // Assurez-vous que le bouton "Supprimer le compte" est défini dans la requête POST
        $userIdToDelete = $_POST['user_id_to_delete'];

        // Appelez la fonction de suppression de l'utilisateur
        User::deleteuser($userIdToDelete);

        // Rediriger l'utilisateur après la suppression
        header("Location: controler_signin.php");
        exit;
    }
}


include"../views/view_profile.php";








