<?php



session_start();


require_once("../models/entreprise.php");
$passwordError = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {


    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $date = $_POST['date'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['password2'];
    $conditionsUtilisation = isset($_POST['conditions_utilisation']);


    if (!empty($nom) && !empty($prenom) && !empty($date) && !empty($password) && !empty($confirmPassword) && $conditionsUtilisation) {

        if ($password === $confirmPassword) {
            echo "Les mots de passe sont identiques.";

            $_SESSION['form_submitted'] = true;
        } else {
            $passwordError = "Les mots de passe ne sont pas identiques. Veuillez réessayer.";
        }
    } else {

        echo "Veuillez remplir tous les champs du formulaire et accepter les conditions d'utilisation.";
    }
}

if (isset($_SESSION['form_submitted']) && $_SESSION['form_submitted']) {
    echo "Le formulaire a été envoyé avec succès.";
    unset($_SESSION['form_submitted']);
}
?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">

    <?php include 'header.php'; ?>

    <div class="container mx-auto my-8 p-8 bg-white rounded-md shadow-md max-w-md">
        <form method="post" action="" novalidate>
            <label for="nom" class="block mb-2 text-sm font-medium text-gray-700">Nom:</label>
            <input type="text" name="nom" id="nom" required
                class="input-field mb-2 p-2.5 rounded-lg w-full focus:ring-blue-500 focus:border-blue-500">

            <label for="prenom" class="block mb-2 text-sm font-medium text-gray-700">Prénom:</label>
            <input type="text" name="prenom" id="prenom" required
                class="input-field mb-2 p-2.5 rounded-lg w-full focus:ring-blue-500 focus:border-blue-500">

            <label for="pseudo" class="block mb-2 text-sm font-medium text-gray-700">Pseudo:</label>
            <input type="text" name="pseudo" id="pseudo" required
                class="input-field mb-2 p-2.5 rounded-lg w-full focus:ring-blue-500 focus:border-blue-500">

            <label for="mail" class="block mb-2 text-sm font-medium text-gray-700">Mail:</label>
            <input type="text" name="mail" id="mail" required
                class="input-field mb-2 p-2.5 rounded-lg w-full focus:ring-blue-500 focus:border-blue-500">

            <label for="enterprise" class="block mb-2 text-sm font-medium text-gray-700">Entreprise :</label>
            <select type="text" id="enterprise" name="enterprise"
                value="<?= isset($_POST['enterprise']) ? htmlspecialchars($_POST['enterprise']) : '' ?>"
                class="input-field mb-2 p-2.5 rounded-lg w-full focus:ring-blue-500 focus:border-blue-500">
                <option value="">--Quelle est votre entreprise ?</option>
                <?php
                foreach (Entreprise::getEntreprise() as $entreprise) { ?>
                    <option value="<?= $entreprise["enterprise_id"] ?>">
                        <?= $entreprise["enterprise_Name"] ?>
                    </option>
                <?php } ?>
            </select>

            <label for="date" class="block mb-2 text-sm font-medium text-gray-700">Date de naissance:</label>
            <input type="date" name="date" required
                class="input-field mb-2 p-2.5 rounded-lg w-full focus:ring-blue-500 focus:border-blue-500">

            <label for="password" class="block mb-2 text-sm font-medium text-gray-700">Mot de passe:</label>
            <input type="password" name="password" id="password" required
                class="input-field mb-2 p-2.5 rounded-lg w-full focus:ring-blue-500 focus:border-blue-500">

            <label for="password2" class="block mb-2 text-sm font-medium text-gray-700">Confirmer Mot de passe:</label>
            <input type="password" name="password2" id="password2" required
                class="input-field mb-2 p-2.5 rounded-lg w-full focus:ring-blue-500 focus:border-blue-500">

            <label for="conditions_utilisation" class="block mb-2 text-sm font-medium text-gray-700">
                <input type="checkbox" name="conditions_utilisation" id="conditions_utilisation" required class="mr-2">
                J'accepte les conditions d'utilisation
            </label>

            <?php if ($passwordError !== ""): ?>
                <div class="text-red-500 mb-4">
                    <?php echo $passwordError; ?>
                </div>
            <?php endif; ?>

            <input type="submit" value="S'inscrire"
                class="bg-green-500 hover:bg-gray-700 text-white  font-bold py-2 px-4 rounded focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 w-full cursor-pointer">

        </form>
        <a href="../controllers/controler_signin.php" class="block text-center mt-4">
            <button
                class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 w-full">
                Retour
            </button>
        </a>
    </div>

    <?php include '../views/footer.php'; ?>

</body>

</html>