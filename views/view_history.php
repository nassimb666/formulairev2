<?php
require_once "../controllers/controler_history.php";
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        crossorigin="anonymous" />
    <link rel="stylesheet" href="../assets/style/style.css">
    <title>Historique</title>
</head>

<body class="bg-gray-100">

    <?php include '../views/header.php'; ?>
    <div class="container mx-auto my-8 p-8 bg-white rounded-md shadow-md text-center">
        <h1 class="text-3xl mb-6">Historique de vos trajets,
            <?= $_SESSION['user']['user_pseudo']; ?>!
        </h1>

        <div class="flex flex-wrap -mx-4">
            <?php foreach ($ride as $element) { ?>
                <div class="card bg-gray-200 p-6 mb-4 mx-4 w-64">
                    <p class="text-lg font-bold">
                        <?= $element['date_FR'] ?>
                    </p>
                    <p class="text-gray-700">
                        <?= $element['ride_distance'] ?> Km
                    </p>
                    <p class="text-gray-700">
                        <?= $element['transport_type'] ?>
                    </p>

                    <form action="" method="POST"
                        onsubmit="return confirm('Voulez-vous supprimer le trajet?')" novalidate>
                        <input type="hidden" name="delete" value="<?= $element['ride_id'] ?>">
                        <button type="submit" 
                            class="text-red-500 hover:text-red-700 py-2 px-4 w-auto">Supprimer</button>
                    </form>

                </div>
            <?php } ?>
        </div>

        <div class="mt-4">
            <a href="../controllers/controler_trajet.php"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Enregistrer
                un nouveau trajet</a>
        </div>

        <a href="../controllers/controler_home.php" class="block mt-4">
            <button
                class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">Retour</button>
        </a>
    </div>

    <?php include '../views/footer.php'; ?>

</body>

</html>