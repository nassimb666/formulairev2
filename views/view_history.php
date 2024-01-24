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
            <p>
                <?= $element['ride_date'] ?>
            </p>
            
            <p>
                <?= $element['ride_distance'] ?> Km
            </p>
            <p>
                <?= $element['transport_type'] ?>
            </p>
            <button>delete</button>
        </div>



    <?php } ?>

    <a href="../controllers/controler_home.php"><button>retour</button>


</body>

</html>