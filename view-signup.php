<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" crossorigin="anonymous" />
    <title>Inscription</title>
    <link rel="stylesheet" href="style.css">
</head>
<?php include './head.php'; ?>
<body>
    

    <form method="post" action="votre_script_php.php">

        <label for="nom">Nom:</label>
        <input type="text" name="nom" id="nom" required>
        <!-- Ajoutez l'attribut "required" pour rendre le champ obligatoire -->
        <label for="prenom">Prénom:</label>
        <input type="text" name="prenom" id="prenom" required>
        <label for="date">Date de naissance:</label>
        <input type="date" name="date" required>
        <label for="password">Mot de passe:</label>
        <input type="password" name="password" id="password" required>
        <label for="password2">Confirmer Mot de passe:</label>
        <input type="password" name="password2" id="password2" required>

        <label for="conditions_utilisation">
            <input type="checkbox" name="conditions_utilisation" id="conditions_utilisation" required>
            J'accepte les conditions d'utilisation
        </label>

        <?php if ($passwordError !== ""): ?>
            <div style="color: red;"><?php echo $passwordError; ?></div>
        <?php endif; ?>

        <input type="submit" value="S'inscrire" class="submit-button">
    </form>

    <?php include './footer.php'; ?>
</body>

</html>
