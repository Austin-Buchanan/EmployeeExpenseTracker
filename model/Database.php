<?php
class Database {
    private static $dsn = 'mysql:host=localhost;dbname=CSIS279';
    private static $username = 'app_user';
    private static $password = '5UfBZyVgdGruQAW';
    private static $db;
    
    private function __construct() {}
    
    public static function getDB () {
        if (!isset(self::$db)) {
            try {
                self::$db = new PDO(self::$dsn, self::$username, self::$password);
            } catch (Exception $e) {
                $error_message = $e->getMessage();
                include('../view/database_error.php');
                exit();
            }
        }
        return self::$db;
    }
    
    public function getCategories() {
        $db = self::getDB();
        $query = "SELECT * FROM ExpCategories";
        return $db->query($query);
    }
    
    public function getPaymentMethods() {
        $db = self::getDB();
        $query = "SELECT * FROM PayMethods";
        return $db->query($query);
    }
}

