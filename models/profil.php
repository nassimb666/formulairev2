<?php

class Update
{
    private static $db;

    public static function initDatabase()
    {
        if (!isset(self::$db)) {
            self::$db = new PDO("mysql:host=localhost;dbname=" . DBNAME, DBUSER, DBPASSWORD);
            self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
    }

    public static function update(int $user_validate, string $lastname, string $firstname, string $pseudo, string $email, string $birthdate, string $password_utilisateur, int $id_enterprise)
    {
        try {
            self::initDatabase();

            $sql = "UPDATE userprofil SET user_name = :lastname, user_firstname = :firstname, user_pseudo = :pseudo, user_email = :email, user_dateofbirth = :birthdate, user_password = :password_utilisateur, enterprise_id = :id_enterprise WHERE user_validate = :user_validate";

            $stmt = self::$db->prepare($sql);
            $stmt->bindParam(':lastname', $lastname);
            $stmt->bindParam(':firstname', $firstname);
            $stmt->bindParam(':pseudo', $pseudo);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':birthdate', $birthdate);
            $stmt->bindParam(':password_utilisateur', $password_utilisateur);  // Note: Hash the password before binding in a real-world scenario
            $stmt->bindParam(':id_enterprise', $id_enterprise);
            $stmt->bindParam(':user_validate', $user_validate);

            $stmt->execute();

            // You can check $stmt->rowCount() to see if any rows were affected
            // $rowCount = $stmt->rowCount();

            return true; // Return success or any other indication of success
        } catch (PDOException $e) {
            // Handle exception, log error, etc.
            return false; // Return failure or any other indication of failure
        }
    }
}


