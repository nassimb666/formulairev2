<?php
session_start();

require_once "../config.php";
require_once "../models/utilisateur.php";

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
                    header("Location: dashboard.php");
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
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connectez-vous</title>
</head>

<body>
    <h1>Veuillez vous identifier</h1>

    <form action="" method="POST" novalidate>
        <label for="mail">Identifiant:</label>
        <input type="text" name="mail" id="mail" placeholder="exemple@mail.fr" required>

        <label for="password">Mot de passe:</label>
        <input type="password" name="password" id="password" required>

        <input type="submit" value="Se connecter">
    </form>
</body>

</html>