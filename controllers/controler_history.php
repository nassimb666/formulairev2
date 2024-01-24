<?php
    session_start();

    // var_dump($_SESSION);
    require_once("../config.php");

    require_once("../models/ride.php");
    require_once("../models/utilisateur.php");

    $ride = ride::getHistory($_SESSION['user']['user_id']);

    

    // var_dump($ride);
    
    include"../views/view_history.php";
