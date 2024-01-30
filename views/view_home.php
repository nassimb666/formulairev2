<?php 
    require_once"../controllers/controler_home.php";
?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        crossorigin="anonymous" />
    <title>Accueil</title>
    <link rel="stylesheet" href="../assets/style/style.css">
</head>

<body>
    <?php 
        include"header.php";
    ?>
    <h1>Bienvenue sur la page d'accueil, <?php echo $pseudo; ?>!</h1>

    <a href="../controllers/controler_profile.php"><button>Mon profil</button></a>

    <a href="../controllers/controler_trajet.php"><button>Enregistrer un nouveau trajet</button></a>

    <a href="../controllers/controler_history.php"><button>Historique des trajets</button></a>
    
    <form method="POST">
        <input type="submit" name="logout" value="Déconnexion">
    </form>

    <?php
        include"footer.php";
    ?>
</body>

</html>