<?php 
    require_once "../controllers/controler_home.php";
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" crossorigin="anonymous" />
    <link rel="stylesheet" href="../assets/style/style.css">
    <title>Accueil</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
</head>

<body class="bg-gray-100">

    <?php include "header.php"; ?>

    <div class="container mx-auto my-8 p-8 bg-white rounded-md shadow-md">
        <h1 class="text-3xl mb-6">Bienvenue sur la page d'accueil, <?php echo $pseudo; ?>!</h1>

        <a href="../controllers/controler_profile.php" class="block mb-4">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                Mon profil
            </button>
        </a>

        <a href="../controllers/controler_trajet.php" class="block mb-4">
            <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                Enregistrer un nouveau trajet
            </button>
        </a>

        <a href="../controllers/controler_history.php" class="block mb-4">
            <button class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500">
                Historique des trajets
            </button>
        </a>
        
        <form method="POST" class="mb-4">
            <input type="submit" name="logout" value="Déconnexion" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
        </form>
    </div>

    <?php include "footer.php"; ?>

</body>

</html>
