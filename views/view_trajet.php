<?php
require_once "../models/transport.php";
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        crossorigin="anonymous" />
    <title>Enregistrement de Trajet</title>
    <link rel="stylesheet" href="../assets/style/style.css">
</head>

<body class="bg-gray-100">
    <?php include '../views/header.php'; ?>

    <div class="container mx-auto my-8 p-8 bg-white rounded-md shadow-md text-center">
        <form method="post" action="" novalidate enctype="multipart/form-data" class="max-w-md mx-auto">
            <div class="mb-4">
                <label for="ride_date" class="block text-sm font-medium text-gray-700">Date:</label>
                <input type="date" name="ride_date" required class="input-field">
            </div>

            <div class="mb-4">
                <label for="ride_distance" class="block text-sm font-medium text-gray-700">Nombre de kilomètres:</label>
                <input type="number" name="ride_distance" id="ride_distance" required class="input-field">
            </div>

            <div class="mb-4">
                <label for="ride_photo" class="block text-sm font-medium text-gray-700">Photo du trajet:</label>
                <input type="file" name="ride_photo" class="input-field">
            </div>

            <div class="mb-4">
                <label for="transport_id" class="block text-sm font-medium text-gray-700">Moyens de transport:</label>
                <select type="text" id="transport" name="transport_id" class="input-field">
                    <option value="">--Quel est votre moyen de transport ?</option>
                    <?php foreach (Transport::getTransport() as $transport) { ?>
                        <option value="<?= $transport["transport_id"] ?>">
                            <?= $transport["transport_type"] ?>
                        </option>
                    <?php } ?>
                </select>
            </div>

            <div>
                <input type="submit" value="Enregistrer le trajet"
                    class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded opacity-100">
            </div>

        </form>

        <a href="../controllers/controler_home.php" class="block text-center mt-4">
            <button
                class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">Retour</button>
        </a>
    </div>

    <?php include '../views/footer.php'; ?>
</body>

</html>