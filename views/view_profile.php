<?php
require_once "../controllers/controler_profile.php";
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        crossorigin="anonymous" />
    <title>Mon Profil</title>
    <link rel="stylesheet" href="../assets/style/style2.css">
</head>

<body>
    <?php
    include "header.php";
    ?>

    <h1>Votre Profil
        <?php echo $pseudo; ?>!
    </h1>

    <h2>Vos Informations:</h2>


    <div class=" clearfix">
        <div class="info">
            Nom de famille:
            <br>
            <span id="display_name">
                <?php echo $name; ?>
            </span>
            <form action="../controllers/controler_profile.php" method="post" style="display: none;" id="form_name">
                <input type="text" name="new_name" placeholder="Nouveau nom">
                <button class="edit" name="edit_name">Enregistrer</button>
            </form>
            <button class="edit" onclick="toggleEdit('form_name', 'display_name')">Modifier</button>
            <br>

            Prénom:
            <br>
            <span id="display_firstname">
                <?php echo $firstname; ?>
            </span>
            <form action="../controllers/controler_profile.php" method="post" style="display: none;"
                id="form_firstname">
                <input type="text" name="new_firstname" placeholder="Nouveau prénom">
                <button class="edit" name="edit_firstname">Enregistrer</button>
            </form>
            <button class="edit" onclick="toggleEdit('form_firstname', 'display_firstname')">Modifier</button>
            <br>

            pseudo:
            <br>
            <span id="display_pseudo">
                <?php echo $pseudo; ?>
            </span>
            <form action="../controllers/controler_profile.php" method="post" style="display: none;" id="form_pseudo">
                <input type="text" name="new_pseudo" placeholder="Nouveau pseudo">
                <button class="edit" name="edit_pseudo">Enregistrer</button>
            </form>
            <button class="edit" onclick="toggleEdit('form_pseudo', 'display_pseudo')">Modifier</button>
            <br>

            description:
            <br>
            <span id="display_description">
                <?php echo $description; ?>
            </span>
            <form action="../controllers/controler_profile.php" method="post" style="display: none;"
                id="form_description">
                <input type="text" name="new_description" placeholder="Nouvelle description">
                <button class="edit" name="edit_description">Enregistrer</button>
            </form>
            <button class="edit" onclick="toggleEdit('form_description', 'display_description')">Modifier</button>
            <br>

            mail:
            <br>
            <span id="display_mail">
                <?php echo $mail; ?>
            </span>
            <form action="../controllers/controler_profile.php" method="post" style="display: none;" id="form_mail">
                <input type="text" name="new_mail" placeholder="Nouveau mail">
                <button class="edit" name="edit_mail">Enregistrer</button>
            </form>
            <button class="edit" onclick="toggleEdit('form_mail', 'display_mail')">Modifier</button>
            <br>


            date de naissance:
            <br>
            <span id="display_birthdate">
                <?php echo $birthdate; ?>
            </span>
            <form action="../controllers/controler_profile.php" method="post" style="display: none;"
                id="form_birthdate">
                <input type="date" name="new_birthdate" value="<?= $birthdate ?>" placeholder="Nouvelle birthdate">

                <button class="edit" name="edit_birthdate">Enregistrer</button>
            </form>
            <button class="edit" onclick="toggleEdit('form_birthdate', 'display_birthdate')">Modifier</button>
            <br>


        </div>
        <div class='ppics'>
            <p>photo de Profil:</p>
            <img src="../assets/img/<?= $photo ?>" alt="" class="profile-pic">
            <form action="../controllers/controler_profile.php" method="post" style="display: none;"
                enctype="multipart/form-data" id="form_photo">
                <input type="file" name="new_photo">

                <button class="edit" name="edit_photo">Enregistrer</button>
            </form>
            <button class="edit" onclick="toggleEdit('form_photo', 'display_photo')">Modifier</button>
            <br>
        </div>
    </div>

    <form action="../controllers/controler_profile.php" method="post" onsubmit="return confirm('Voulez-vous supprimer le compte? (La suppression sera effectuée même en cliquant sur Annuler)')">
        <input type="hidden" name="user_id_to_delete" value="<?= $userIdToDelete ?>">
        <button class="delete" name="delete_user">Supprimer le compte</button>
    </form>







    <a href="../controllers/controler_home.php"><button class="back-button">Retour</button></a>

    <?php
    include 'footer.php';
    ?>


    <script>
        function toggleEdit(formId, displayId) {
            var form = document.getElementById(formId);
            var display = document.getElementById(displayId);
            var editButton = document.querySelector('[onclick="toggleEdit(\'' + formId + '\', \'' + displayId + '\')"]');

            if (form && display && editButton) {
                if (form.style.display === "none") {
                    form.style.display = "block";
                    display.style.display = "none";
                    editButton.style.display = "none"; // Masquer le bouton "Modifier"
                } else {
                    form.style.display = "none";
                    display.style.display = "inline";
                    editButton.style.display = "inline"; // Afficher à nouveau le bouton "Modifier"
                }
            } else {
                console.error("Les éléments avec les ID spécifiés n'ont pas été trouvés.");
            }
        }
    </script>

</body>

</html>