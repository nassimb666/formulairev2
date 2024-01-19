<?php
    require_once"../controllers/controler_signin.php";
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connectez-vous</title>
    <link rel="stylesheet" href="../assets/style/style.css">
</head>

<body>
    <h1>Veuillez vous identifier</h1>

    <form action="" method="POST" novalidate>
        <label for="mail">Identifiant:</label>
        <input type="text" name="mail" id="mail" placeholder="exemple@mail.fr" required>

        <label for="password">Mot de passe:</label>
        <input type="password" name="password" id="password" required><span><?= $errors['mot_de_passe'] ?? '' ?></span><br>
        <p><?= $errors['connexion'] ?? '' ?></p>

        <input type="submit" value="Se connecter">
    </form>
</body>

</html>