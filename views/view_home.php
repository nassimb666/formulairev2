<?php 
    require_once"../controllers/controler_home.php";
?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link rel="stylesheet" href="../assets/style/style.css">
</head>

<body>
    <h1>Bienvenue sur la page d'accueil, <?php echo $pseudo; ?>!</h1>

    <form action="profile.php" method="GET">
        <input type="submit" value="Mon Profil">
    </form>

    <a href="../controllers/controler_trajet.php"><button>Enregistrer un nouveau trajet</button></a>

    <a href="../controllers/controler_history.php"><button>Historique des trajets</button></a>
    
    <form method="POST">
        <input type="submit" name="logout" value="Déconnexion">
    </form>

    
</body>

</html>