<?php
require_once "../controllers/controler_signin.php";
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connectez-vous - EcoTrajet</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="text-center bg-green-50">

    <h1 class="text-3xl font-extrabold text-green-700 mt-8 mb-4">Connectez-vous à EcoTrajet</h1>

    <div class="max-w-md mx-auto bg-white p-8 rounded-md shadow-md mt-4">
        <form action="" method="POST" novalidate>
            <div class="mb-4">
                <label for="mail" class="block text-sm font-medium text-gray-700">Identifiant:</label>
                <input type="text" name="mail" id="mail" placeholder="exemple@mail.fr"
                    class="mt-1 p-2.5 block w-full border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500">
            </div>

            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">Mot de passe:</label>
                <input type="password" name="password" id="password" placeholder="********"
                    class="mt-1 p-2.5 block w-full border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500">
                <p class="text-red-500 text-xs mt-1">
                    <?= $errors['mot_de_passe'] ?? '' ?>
                </p>
            </div>

            <div class="mb-4 flex items-start">
                <input id="remember" type="checkbox" value=""
                    class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-2 focus:ring-green-500 focus:border-green-500">
                <label for="remember" class="ms-2 text-sm font-medium text-gray-700">Remember me</label>
            </div>

            <button type="submit"
                class="w-full bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                Se connecter
            </button>
        </form>
    </div>

    <div id="setbutton" class="mt-4">
        <p class="text-gray-700">Pas encore de compte ? Inscrivez-vous:</p>
        <a href="../controllers/controler-signup.php">
            <button class="mt-2 inline-block bg-green-700 hover:bg-green-800 text-white font-bold py-2 px-4 rounded focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 mx-auto">
                S'inscrire
            </button>
        </a>
    </div>

</body>

</html>
