<?php
session_start();

include "../config.php"; 
include "../models/ride.php";

$errors = [];
$successMessage = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération des données du formulaire
    $ride_date = isset($_POST["ride_date"]) ? trim($_POST["ride_date"]) : null;
    $ride_distance = isset($_POST["ride_distance"]) ? intval($_POST["ride_distance"]) : null;
    $transport_id = isset($_POST["transport_id"]) ? intval($_POST["transport_id"]) : null;
    $ride_photo = isset($_POST["ride_photo"]) ? $_POST["ride_photo"] : null; // Modification, pas besoin de intval
    $user_id = $_SESSION["user"]["user_id"];

    var_dump($transport_id);

    // Validation des champs du formulaire
    if (empty($ride_date)) {
        $errors["ride_date"] = "Le champ 'Date' est obligatoire.";
    }

    if (empty($ride_distance) || $ride_distance <= 0) {
        $errors["ride_distance"] = "Le champ 'Nombre de kilomètres' doit être un nombre positif.";
    }

    if (empty($transport_id)) {
        $errors["transport_id"] = "Le champ 'Moyens de transport' est obligatoire.";
    }

    // Si aucune erreur, message de succès
    if (empty($errors)) {
        try {
            ride::create($ride_date, $ride_distance, $ride_photo,$transport_id , $user_id);
            // $successMessage = "Le trajet a été enregistré avec succès!";
            header("Location: controler_history.php");
        } catch (Exception $e) {
            $errors[] = "Une erreur s'est produite lors de l'enregistrement.";
        }
    }
}
?>

<?php
include("../views/view_trajet.php");
?>
