<?php

require_once File::build_path(array('config', 'Conf.php'));

class Model
{
    private static $pdo = NULL;


    private static function init()
    {

        $hostname = Conf::getHostname();
        $database_name = Conf::getDatabase();
        $login = Conf::getLogin();
        $password = Conf::getPassword();


        try {
            self::$pdo = new PDO("mysql:host=$hostname;dbname=$database_name", $login, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

            self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo $e->getMessage();
            die();
        }
    }


    public static function getPDO()
    {

        if (is_null(self::$pdo)) {
            self::init();
        }
        return self::$pdo;
    }
}

?>