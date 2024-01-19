<?php 
    require_once"../controllers/controler_home.php";
?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link rel="stylesheet" href="./assets/style/style.css">
</head>

<body>
    <h1>Bienvenue sur la page d'accueil, <?php echo $pseudo; ?>!</h1>

    <form action="profile.php" method="GET">
        <input type="submit" value="Mon Profil">
    </form>
</body>

</html>