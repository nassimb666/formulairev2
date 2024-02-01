<?php
class transport
{
    private static $db;
    public static function initDatabase()
    {
        if (!isset(self::$db)) {
            self::$db = new PDO("mysql:host=localhost;dbname=" . DBNAME, DBUSER, DBPASSWORD);
            self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
    }

    public static function gettransport()
    {
        try {
            self::initDatabase();
            $sql = "SELECT transport_type, transport_id FROM transport";

            $query = self::$db->prepare($sql);

            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            die("" . $e->getMessage());

        }
    }
}