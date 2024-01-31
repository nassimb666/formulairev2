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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        crossorigin="anonymous" />
    <title>Inscription</title>
    <link rel="stylesheet" href="../assets/style/style2.css">
</head>



<body>
    <?php include 'header.php'; ?>

    <div class="form_signup">
        <form method="post" action="" novalidate>

            <label for="nom">Nom:</label>
            <input type="text" name="nom" id="nom" required>
            <label for="prenom">Prénom:</label>
            <input type="text" name="prenom" id="prenom" required>
            <label for="pseudo">Pseudo:</label>
            <input type="text" name="pseudo" id="pseudo" required>
            <label for="mail">mail:</label>
            <input type="text" name="mail" id="mail" required>
            <label for="entreprise">Entreprise :</label><br>
            <select type="text" id="enterprise" name="enterprise"
                value="<?= isset($_POST['enterprise']) ? htmlspecialchars($_POST['enterprise']) : '' ?>">
                <option value="">--Quelle est votre entreprise ?</option>
                <?php
                foreach (Entreprise::getEntreprise() as $entreprise) { ?>
                    <option value="<?= $entreprise["enterprise_id"] ?>">
                        <?= $entreprise["enterprise_Name"] ?>
                    </option>
                <?php } ?>

            </select>
            <label for="date">Date de naissance:</label>
            <input type="date" name="date" required>
            <label for="password">Mot de passe:</label>
            <input type="password" name="password" id="password" require>
            <label for="password2">Confirmer Mot de passe:</label>
            <input type="password" name="password2" id="password2" required>

            <label for="conditions_utilisation">
                <input type="checkbox" name="conditions_utilisation" id="conditions_utilisation" required>
                J'accepte les conditions d'utilisation
            </label>

            <?php if ($passwordError !== ""): ?>
                <div style="color: red;">
                    <?php echo $passwordError; ?>
                </div>
            <?php endif; ?>

            <input type="submit" value="S'inscrire" class="submit-button">
        </form>
        <a href="../controllers/controler_signin.php"><button class="return">Retour</button></a>
    </div>


    <?php include '../views/footer.php'; ?>
</body>

</html>