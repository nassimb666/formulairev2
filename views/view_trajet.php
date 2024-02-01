<?php
 require_once"../models/transport.php";
?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        crossorigin="anonymous" />
    <title>Inscription</title>
    <link rel="stylesheet" href="../assets/style/style2.css">
</head>



<body>
    <?php include '../views/header.php'; ?>

    <div class="form_signup">
        <form method="post" action="" novalidate>

            <label for="ride_date">Date:</label>
            <input type="date" name="ride_date" required>
            <label for="ride_distance">nombre de kilometre:</label>
            <input type="number" name="ride_distance" id="ride_distance" required>
            <label for="ride_photo">vous pouvez affichez une photo:</label>
            <input type="file">
            <label for="transport_id">Moyens de transport:</label>
            <select type="text" id="transport" name="transport"
                value="<?= isset($_POST['transport']) ? htmlspecialchars($_POST['tansport']) : '' ?>">
                <option value="">--Quelle est votre moyens de transport ?</option>
                <?php
                foreach (transport::gettransport() as $transport) { ?>
                    <option value="<?= $transport["transport_id"] ?>">
                        <?= $transport["transport_type"] ?>
                    </option>
                <?php } ?>

            </select>
            

            <input type="submit" value="Enregistrer le trajet" class="submit-button">
        </form>
        <a href="../controllers/controler_home.php"><button class="back-button">Retour</button></a>
    </div>


    <?php include '../views/footer.php'; ?>
</body>

</html>