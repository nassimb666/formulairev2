<?php require_once "../controllers/controler_profile.php"; ?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        crossorigin="anonymous" />
    <link rel="stylesheet" href="../assets/style/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    <title>Mon Profil</title>
</head>

<body class="bg-gray-100">

    <?php include 'header.php'; ?>

    <div class="container mx-auto my-8 p-8 bg-white rounded-md shadow-md">
        <h1 class="text-3xl mb-6">Votre Profil
            <?= $pseudo; ?>!
        </h1>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="mb-4">
                <p>
                    Nom de famille: <span id="display_name" class="text-gray-700">
                        <?= $name; ?>
                    </span>
                </p>
                <form action="../controllers/controler_profile.php" method="post" class="hidden" id="form_name">
                    <input type="text" name="new_name" placeholder="Nouveau nom" class="input-field">
                    <button class="btn btn-green" name="edit_name">Enregistrer</button>
                </form>
                <button
                    class="h-8 px-4 m-2 text-sm text-green-100 transition-colors duration-150 bg-green-700 rounded-lg focus:shadow-outline hover:bg-green-800"
                    onclick="toggleEdit('form_name', 'display_name')">Modifier</button>
            </div>

            <div class="mb-4">
                <p>
                    Prénom: <span id="display_firstname" class="text-gray-700">
                        <?= $firstname; ?>
                    </span>
                </p>
                <form action="../controllers/controler_profile.php" method="post" class="hidden" id="form_firstname">
                    <input type="text" name="new_firstname" placeholder="Nouveau prénom" class="input-field">
                    <button class="btn-edit" name="edit_firstname">Enregistrer</button>
                </form>
                <button
                    class="h-8 px-4 m-2 text-sm text-green-100 transition-colors duration-150 bg-green-700 rounded-lg focus:shadow-outline hover:bg-green-800"
                    onclick="toggleEdit('form_firstname', 'display_firstname')">Modifier</button>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="mb-4">
                <p>
                    Pseudo: <span id="display_pseudo" class="text-gray-700">
                        <?= $pseudo; ?>
                    </span>
                </p>
                <form action="../controllers/controler_profile.php" method="post" class="hidden" id="form_pseudo">
                    <input type="text" name="new_pseudo" placeholder="Nouveau pseudo" class="input-field">
                    <button
                        class="h-8 px-4 m-2 text-sm text-green-100 transition-colors duration-150 bg-green-700 rounded-lg focus:shadow-outline hover:bg-green-800"
                        name="edit_pseudo">Enregistrer</button>
                </form>
                <button
                    class="h-8 px-4 m-2 text-sm text-green-100 transition-colors duration-150 bg-green-700 rounded-lg focus:shadow-outline hover:bg-green-800"
                    onclick="toggleEdit('form_pseudo', 'display_pseudo')">Modifier</button>
            </div>

            <div class="mb-4">
                <p>
                    Description: <span id="display_description" class="text-gray-700">
                        <?= $description; ?>
                    </span>
                </p>
                <form action="../controllers/controler_profile.php" method="post" class="hidden" id="form_description">
                    <input type="text" name="new_description" placeholder="Nouvelle description" class="input-field">
                    <button
                        class="h-8 px-4 m-2 text-sm text-green-100 transition-colors duration-150 bg-green-700 rounded-lg focus:shadow-outline hover:bg-green-800"
                        name="edit_description">Enregistrer</button>
                </form>
                <button
                    class="h-8 px-4 m-2 text-sm text-green-100 transition-colors duration-150 bg-green-700 rounded-lg focus:shadow-outline hover:bg-green-800"
                    onclick="toggleEdit('form_description', 'display_description')">Modifier</button>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="mb-4">
                <p>
                    Email: <span id="display_mail" class="text-gray-700">
                        <?= $mail; ?>
                    </span>
                </p>
                <form action="../controllers/controler_profile.php" method="post" class="hidden" id="form_mail">
                    <input type="text" name="new_mail" placeholder="Nouveau mail" class="input-field">
                    <button
                        class="h-8 px-4 m-2 text-sm text-green-100 transition-colors duration-150 bg-green-700 rounded-lg focus:shadow-outline hover:bg-green-800"
                        name="edit_mail">Enregistrer</button>
                </form>
                <button
                    class="h-8 px-4 m-2 text-sm text-green-100 transition-colors duration-150 bg-green-700 rounded-lg focus:shadow-outline hover:bg-green-800"
                    onclick="toggleEdit('form_mail', 'display_mail')">Modifier</button>
            </div>

            <div class="mb-4">
                <p>
                    Date de naissance: <span id="display_birthdate" class="text-gray-700">
                        <?= $birthdate; ?>
                    </span>
                </p>
                <form action="../controllers/controler_profile.php" method="post" class="hidden" id="form_birthdate">
                    <input type="date" name="new_birthdate" value="<?= $birthdate ?>" class="input-field">
                    <button
                        class="h-8 px-4 m-2 text-sm text-green-100 transition-colors duration-150 bg-green-700 rounded-lg focus:shadow-outline hover:bg-green-800"
                        name="edit_birthdate">Enregistrer</button>
                </form>
                <button
                    class="h-8 px-4 m-2 text-sm text-green-100 transition-colors duration-150 bg-green-700 rounded-lg focus:shadow-outline hover:bg-green-800"
                    onclick="toggleEdit('form_birthdate', 'display_birthdate')">Modifier</button>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="mb-4">
                <p>
                    Photo de Profil:
                </p>
                <img src="../assets/img/<?= $photo ?>" alt="" id="display_photo"
                    class="profile-pic mb-4 mx-auto md:mx-0 rounded-full shadow-md">
                <form action="../controllers/controler_profile.php" method="post" class="hidden"
                    enctype="multipart/form-data" id="form_photo">
                    <input type="file" name="new_photo" class="input-field">
                    <button
                        class="h-8 px-4 m-2 text-sm text-green-100 transition-colors duration-150 bg-green-700 rounded-lg focus:shadow-outline hover:bg-green-800"
                        name="edit_photo">Enregistrer</button>
                </form>
                <button
                    class="h-8 px-4 m-2 text-sm text-green-100 transition-colors duration-150 bg-green-700 rounded-lg focus:shadow-outline hover:bg-green-800"
                    onclick="toggleEdit('form_photo', 'display_photo')">Modifier</button>
            </div>
        </div>

        <form action="../controllers/controler_profile.php" method="post"
            onsubmit="return confirm('Voulez-vous supprimer le compte? (La suppression sera effectuée même en cliquant sur Annuler)')">
            <input type="hidden" name="user_id_to_delete" value="<?= $userIdToDelete ?>">
            <button
                class="h-8 px-4 m-2 text-sm text-green-100 transition-colors duration-150 bg-green-700 rounded-lg focus:shadow-outline hover:bg-green-800"
                name="delete_user">Supprimer le compte</button>
        </form>

        <a href="../controllers/controler_home.php" class="block mt-4">
            <button
                class="h-8 px-4 m-2 text-sm text-green-100 transition-colors duration-150 bg-green-700 rounded-lg focus:shadow-outline hover:bg-green-800">Retour</button>
        </a>
    </div>


    <?php include 'footer.php'; ?>


    <script>
        function toggleEdit(formId, displayId) {
            var form = document.getElementById(formId);
            var display = document.getElementById(displayId);
            var editButton = document.querySelector('[onclick="toggleEdit(\'' + formId + '\', \'' + displayId + '\')"]');

            if (form && display && editButton) {
                if (form.style.display === "none") {
                    form.style.display = "block";
                    display.style.display = "none";
                    editButton.style.display = "none";
                } else {
                    form.style.display = "none";
                    display.style.display = "inline";
                    editButton.style.display = "inline";
                }
            } else {
                console.error("Les éléments avec les ID spécifiés n'ont pas été trouvés.");
            }
        }
    </script>

</body>

</html>