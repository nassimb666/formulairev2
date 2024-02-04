<?php
session_start();

// var_dump($_SESSION);
require_once("../config.php");

require_once("../models/ride.php");
require_once("../models/utilisateur.php");

$ride = ride::getHistory($_SESSION['user']['user_id']);

if (isset($_POST['delete'])) {
    // Supprimer la ride
    echo 'cc';
    ride::delete($_POST["delete"]);
    header("Location: controler_history.php");
    exit;  // Assurez-vous d'ajouter exit() après la redirection
}







// var_dump($ride);

include "../views/view_history.php";
