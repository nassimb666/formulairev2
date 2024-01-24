<?php

class ride
{
    private static $db;

    public static function initDatabase()
    {
        if (!isset(self::$db)) {
            self::$db = new PDO("mysql:host=localhost;dbname=" . DBNAME, DBUSER, DBPASSWORD);
            self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
    }

    public static function create(string $ride_date, int $ride_distance, ?string $ride_photo, int $transport_id, int $user_id)
    {
        try {
            self::initDatabase();

            $sql = "INSERT INTO `ride` (`ride_date`, `ride_distance`, `ride_photo`, `transport_id`, `user_id`) 
                VALUES (:ride_date, :ride_distance, :ride_photo, :transport_id, :user_id)";

            $query = self::$db->prepare($sql);

            $query->bindValue(':ride_date', $ride_date, PDO::PARAM_STR);
            $query->bindValue(':ride_distance', $ride_distance, PDO::PARAM_INT);

            // Vérifier si $ride_photo est null avant d'appeler htmlspecialchars
            if ($ride_photo !== null) {
                $query->bindValue(':ride_photo', htmlspecialchars($ride_photo), PDO::PARAM_STR);
            } else {
                $query->bindValue(':ride_photo', null, PDO::PARAM_NULL);
            }

            $query->bindValue(':transport_id', $transport_id, PDO::PARAM_INT);
            $query->bindValue(':user_id', $user_id, PDO::PARAM_INT);

            $query->execute();
        } catch (PDOException $e) {
            // Lancer une exception ici ou retourner une valeur d'erreur
            echo ('Erreur lors de la création d\'utilisateur : ' . $e->getMessage());
        }
    }

    public static function getHistory($user_id)
    {
        try {
            self::initDatabase();

            $sql = "SELECT ride.*, transport.transport_type
            FROM ride
            NATURAL JOIN transport
            WHERE ride.user_id = :user_id
            ORDER BY ride.ride_date DESC";

            $query = self::$db->prepare($sql);
            $query->bindValue(':user_id', $user_id, PDO::PARAM_INT);
            $query->execute();

            return $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Lancer une exception ici ou retourner une valeur d'erreur
            echo ('Erreur lors de la création d\'utilisateur : ' . $e->getMessage());
        }
    }

   
public static function delete($ride_id)
    {
        try {
            self::initDatabase();

            $sql = "DELETE FROM ride WHERE ride_id = :ride_id";

            $query = self::$db->prepare($sql);

            $query->bindValue(':ride_id', $ride_id, PDO::PARAM_STR);
           

            $query->execute();
        } catch (PDOException $e) {
            // Lancer une exception ici ou retourner une valeur d'erreur
            echo ('Erreur lors de la création d\'utilisateur : ' . $e->getMessage());
        }
    }
}
