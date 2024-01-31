<?php

class Entreprise
{
    private static $db;
    public static function initDatabase()
    {
        if (!isset(self::$db)) {
            self::$db = new PDO("mysql:host=localhost;dbname=" . DBNAME, DBUSER, DBPASSWORD);
            self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
    }

    public static function getentreprise()
    {
        try {
            self::initDatabase();
            $sql = "SELECT enterprise_Name, enterprise_id FROM enterprise";

            $query = self::$db->prepare($sql);

            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            die("" . $e->getMessage());

        }
    }
}