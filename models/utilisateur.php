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

    public static function getInfos(string $email): array
    {
        try {
            self::initDatabase();

            $sql = "SELECT * FROM `userprofil` WHERE `user_email` = :mail";

            $query = self::$db->prepare($sql);
            $query->bindValue(':mail', $email, PDO::PARAM_STR);
            $query->execute();

            return $query->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Lancer une exception ici ou retourner une valeur d'erreur
            throw new Exception('Erreur lors de la récupération des infos de l\'utilisateur : ' . $e->getMessage());
        }
    }

    
}
?>
