<?php
require_once "../controllers/controler_history.php";

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/style/style.css">
    <title>Historique</title>
</head>

<body>

    <?php include '../views/header.php'; ?>
    <h1>Historique de vos trajet
        <?php echo $_SESSION['user']['user_pseudo']; ?>!
    </h1>


    <?php foreach ($ride as $element) { ?>
    <div class="historique">

        <p><?= $element['ride_date'] ?></p>

        <p><?= $element['ride_distance'] ?> Km</p>

        <p><?= $element['transport_type'] ?></p>


        <form action="" method="post" onsubmit="return confirm('Voulez-vous supprimer le trajet? (La suppression sera effectuée même en cliquant sur Annuler)')">
            <input type="hidden" name="ride_id" value="<?= $element['ride_id'] ?>">
            <input type="submit" name="delete" value="delete">
        </form>
    </div>
<?php } ?>


    <div id="add">
        <a href="../controllers/controler_trajet.php"><button>Enregistrer un nouveau trajet</button></a>
    </div>

    <a href="../controllers/controler_home.php"><button>retour</button>


</body>

</html>