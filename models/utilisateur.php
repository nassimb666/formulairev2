<?php
class User
{
    private static $db;

    public static function initDatabase()
    {
        if (!isset(self::$db)) {
            self::$db = new PDO("mysql:host=localhost;dbname=" . DBNAME, DBUSER, DBPASSWORD);
            self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
    }

    public static function create(int $user_validate, string $nom, string $prenom, string $pseudo, string $birthdate, string $email, string $password, int $enterprise)
    {
        try {
            self::initDatabase();

            $sql = "INSERT INTO `userprofil` (`user_validate`, `user_name`, `user_firstname`, `user_pseudo`, `user_email`, `user_dateofbirth`,`user_password`,`enterprise_id`) 
                                        VALUES (:user_validate,:lastname, :firstname, :pseudo,  :email,:birthdate, :password_utilisateur, :id_enterprise)";

            $query = self::$db->prepare($sql);

            $query->bindValue(':user_validate', $user_validate, PDO::PARAM_INT);
            $query->bindValue(':lastname', htmlspecialchars($nom), PDO::PARAM_STR);
            $query->bindValue(':firstname', htmlspecialchars($prenom), PDO::PARAM_STR);
            $query->bindValue(':pseudo', htmlspecialchars($pseudo), PDO::PARAM_STR);
            $query->bindValue(':birthdate', $birthdate, PDO::PARAM_STR);
            $query->bindValue(':email', htmlspecialchars($email), PDO::PARAM_STR);
            $query->bindValue(':password_utilisateur', password_hash($password, PASSWORD_DEFAULT), PDO::PARAM_STR);
            $query->bindValue(':id_enterprise', $enterprise, PDO::PARAM_INT);

            $query->execute();
        } catch (PDOException $e) {
            // Lancer une exception ici ou retourner une valeur d'erreur
            throw new Exception('Erreur lors de la création d\'utilisateur : ' . $e->getMessage());
        }
    }

    public static function isEmailExists(string $email): bool
    {
        try {
            self::initDatabase();

            $sql = "SELECT * FROM `userprofil` WHERE `user_email` = :mail";

            $query = self::$db->prepare($sql);
            $query->bindValue(':mail', $email, PDO::PARAM_STR);
            $query->execute();

            $result = $query->fetch(PDO::FETCH_ASSOC);

            return !empty($result);
        } catch (PDOException $e) {
            // Lancer une exception ici ou retourner une valeur d'erreur
            throw new Exception('Erreur lors de la vérification de l\'email : ' . $e->getMessage());
        }
    }

    public static function getInfos(string $email)
    {
        try {
            self::initDatabase();

            $sql = "SELECT *, DATE_FORMAT(`user_dateofbirth`,'%d/%m/%Y') AS date_FR FROM `userprofil` WHERE `user_email` = :mail";

            $query = self::$db->prepare($sql);
            $query->bindValue(':mail', $email, PDO::PARAM_STR);
            $query->execute();

            return $query->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Lancer une exception ici ou retourner une valeur d'erreur
            throw new Exception('Erreur lors de la récupération des infos de l\'utilisateur : ' . $e->getMessage());
        }
    }



    public static function updateName($user_id, $newName)
    {
        try {
            self::initDatabase();

            $sql = "UPDATE userprofil SET user_name = :newName WHERE user_id = :user_id";
            $query = self::$db->prepare($sql);

            $query->bindValue(':newName', $newName, PDO::PARAM_STR);
            $query->bindValue(':user_id', $user_id, PDO::PARAM_INT);

            $query->execute();
        } catch (PDOException $e) {
            throw new Exception('Erreur lors de la mise à jour du nom : ' . $e->getMessage());
        }
    }

    public static function updateFirstname($user_id, $newFirstname)
    {
        try {
            self::initDatabase();

            $sql = "UPDATE userprofil SET user_firstname = :newFirstname WHERE user_id = :user_id";
            $query = self::$db->prepare($sql);

            $query->bindValue(':newFirstname', $newFirstname, PDO::PARAM_STR);
            $query->bindValue(':user_id', $user_id, PDO::PARAM_INT);

            $query->execute();
        } catch (PDOException $e) {
            throw new Exception('Erreur lors de la mise à jour du prénom : ' . $e->getMessage());
        }
    }

    public static function updatePseudo($user_id, $newPseudo)
    {
        try {
            self::initDatabase();

            $sql = "UPDATE userprofil SET user_pseudo = :newPseudo WHERE user_id = :user_id";
            $query = self::$db->prepare($sql);

            $query->bindValue(':newPseudo', $newPseudo, PDO::PARAM_STR);
            $query->bindValue(':user_id', $user_id, PDO::PARAM_INT);

            $query->execute();
        } catch (PDOException $e) {
            throw new Exception('Erreur lors de la mise à jour du pseudo : ' . $e->getMessage());
        }
    }

    public static function updateDescription($user_id, $newDescription)
    {
        try {
            self::initDatabase();

            $sql = "UPDATE userprofil SET user_describ = :newDescription WHERE user_id = :user_id";
            $query = self::$db->prepare($sql);

            $query->bindValue(':newDescription', $newDescription, PDO::PARAM_STR);
            $query->bindValue(':user_id', $user_id, PDO::PARAM_INT);

            $query->execute();
        } catch (PDOException $e) {
            throw new Exception('Erreur lors de la mise à jour de la description : ' . $e->getMessage());
        }
    }

    public static function updateMail($user_id, $newMail)
    {
        try {
            self::initDatabase();

            $sql = "UPDATE userprofil SET user_email = :newMail WHERE user_id = :user_id";
            $query = self::$db->prepare($sql);

            $query->bindValue(':newMail', $newMail, PDO::PARAM_STR);
            $query->bindValue(':user_id', $user_id, PDO::PARAM_INT);

            $query->execute();
        } catch (PDOException $e) {
            throw new Exception('Erreur lors de la mise à jour du mail : ' . $e->getMessage());
        }
    }

    public static function updateBirthdate($user_id, $newBirthdate)
    {
        try {
            self::initDatabase();

            $sql = "UPDATE userprofil SET user_dateofbirth = :newBirthdate WHERE user_id = :user_id";
            $query = self::$db->prepare($sql);

            $query->bindValue(':newBirthdate', $newBirthdate, PDO::PARAM_STR); // Assurez-vous que le champ dans la base de données est de type date ou datetime
            $query->bindValue(':user_id', $user_id, PDO::PARAM_INT);

            $query->execute();

        } catch (PDOException $e) {
            echo $e->getMessage();

        }
    }

    public static function updatephoto($user_id, $newphoto)
    {
        try {
            self::initDatabase();

            $sql = "UPDATE userprofil SET user_photo = :new_photo WHERE user_id = :user_id";

            $query = self::$db->prepare($sql);

            $query->bindValue("new_photo", $newphoto, PDO::PARAM_STR);
            $query->bindValue("user_id", $user_id, PDO::PARAM_INT);

            $query->execute();

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    public static function deleteuser($user_id)
{
    try {
        self::initDatabase();

        $sql = "DELETE FROM userprofil WHERE user_id = :user_id";

        $query = self::$db->prepare($sql);

        $query->bindValue(':user_id', $user_id, PDO::PARAM_INT);

        $query->execute();

        // Vérifier les erreurs PDO après l'exécution de la requête
        if ($query->errorCode() !== '00000') {
            throw new PDOException(implode(', ', $query->errorInfo()));
        }
    } catch (PDOException $e) {
        // Lancer une exception ici ou retourner une valeur d'erreur
        echo $e->getMessage();
    }
}



}
