<?php
    session_start();

    // var_dump($_SESSION);
    require_once("../config.php");

    require_once("../models/ride.php");
    require_once("../models/utilisateur.php");

    $ride = ride::getHistory($_SESSION['user']['user_id']);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['delete'])) {
            if ($_POST['delete'] === 'delete') {
                // Supprimer la ride
                ride::delete($_POST["ride_id"]);
                header("Location: controler_history.php");
            } else {
                // Annuler l'opération de suppression
                header("Location: controler_history.php");
            }
        }
    }

    
    
    

    // var_dump($ride);
    
    include"../views/view_history.php";
