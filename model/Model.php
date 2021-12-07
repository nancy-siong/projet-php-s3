<?php

require_once File::build_path(array('config', 'Conf.php'));

class Model
{
    private static $pdo = NULL;
    protected static $object;
    protected static $primary;

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

    public static function selectAll() {
        $table_name = static::$object;
        $class_name = 'Model' . ucfirst(str_replace('g_','',$table_name));

        try {
            $rep = self::getPDO()->query("SELECT * FROM $table_name");
            $rep->setFetchMode(PDO::FETCH_CLASS, $class_name);
        } catch(PDOException $e) {
            if(Conf::getDebug()) {
                echo $e->getMessage();
            } else {
                echo 'Impossible de récupérer les données de la table $table_name';
                echo '<a href=""> retour a la page d\'accueil </a>';
            }
            die();
        }
    }

    public static function select($primary_value) {
        $table_name = static::$object;
        $class_name = 'Model' . ucfirst(str_replace('g_','',$table_name));
        $primary_key = static::$primary;

        try {
            $sql = "SELECT * FROM $table_name WHERE $primary_key = :primary_value";
            $req_prep = self::getPDO()->prepare($sql);

            $values = array(
                "primary_value" => $primary_value,
            );
            $req_prep->execute($values);
            $req_prep->setFecthMode(PDO::FETCH_CLASS, $class_name);
            $tab_selected = $req_prep->fetchAll();
            
            if(empty($tab_selected)) {
                return false;
            }
            return $tab_selected[0]; 
        } catch (PDOExceptions $e) {
            if (Conf::getDebug()) {
                echo $e->getMessage();
            } else {
                echo "Impossible de récupérer $primary_value de la table $class_name";
                echo '<a href=""> retour a la page d\'accueil </a>';
            }
            die();
        }
    }
}

?>