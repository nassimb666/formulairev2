<?php
class user
{
    public static function create(int $user_validate, string $nom, string $prenom, string $pseudo, string $birthdate, string $email, string $password, int $enterprise)
    {
        try {
            $db = new PDO("mysql:host=localhost;dbname=" . DBNAME, DBUSER, DBPASSWORD);
            // $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Your database query
            $sql = "INSERT INTO `userprofil` (`user_validate`, `user_name`, `user_firstname`, `user_pseudo`, `user_email`, `user_dateofbirth`,`user_password`,`enterprise_id`) 
                                        VALUES (:user_validate,:lastname, :firstname, :pseudo,  :email,:birthdate, :password_utilisateur, :id_enterprise)";

            $query = $db->prepare($sql);
            // Bind values
            $query->bindValue(':user_validate', $user_validate, PDO::PARAM_INT);
            $query->bindValue(':lastname', htmlspecialchars($nom), PDO::PARAM_STR);
            $query->bindValue(':firstname', htmlspecialchars($prenom), PDO::PARAM_STR);
            $query->bindValue(':pseudo', htmlspecialchars($pseudo), PDO::PARAM_STR);
            $query->bindValue(':birthdate', $birthdate, PDO::PARAM_STR);
            $query->bindValue(':email', htmlspecialchars($email), PDO::PARAM_STR);
            $query->bindValue(':password_utilisateur', password_hash($password, PASSWORD_DEFAULT), PDO::PARAM_STR);
            $query->bindValue(':id_enterprise', $enterprise, PDO::PARAM_INT);

            // Execute the query
            $query->execute();
        } catch (PDOException $e) {
            echo 'Erreur :' . $e->getMessage();
        }

    }
}

?>