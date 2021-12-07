<?php
require_once File::build_path(array('model','Model.php'));

class ModelUser extends Model{
    private $login;
    private $name;
    private $surname;
    private $password;
    private $isAdmin;

    protected static $object = 'g_user';
    protected static $primary = 'login';

    public function getLogin() {
        return $this->login;
    }

    public function getName() {
        return $this->name;
    }

    public function getSurname() {
        return $this->surname;
    }

    public function getPassword(){
        return $this->password;
    }

    public function getIsAdmin(){
        return $this->isAdmin;
    }

    public function setLogin($l) {
        return $this->login = $l;
    }

    public function setName($n) {
        return $this->name = $n;
    }

    public function setSurname($s) {
        return $this->surname = $s;
    }

    public function setPassword($p) {
        return $this->password = $p;
    }

    public static function getAllUsers(){

        try {
            $rep = Model::getPDO()->query("SELECT * FROM g_user");
            $rep->setFetchMode(PDO::FETCH_CLASS, 'ModelUser');
            $tab_user = $rep->fetchAll();
            return $tab_user;
        } catch(PDOException $e) {
            if (Conf::getDebug()) {
                echo $e->getMessage(); 
            } else {
                echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';
            }
            die();
        }
    }

    public static function getUserByLogin($login){
        try {
            $sql = "SELECT * FROM g_user WHERE login = :login";
            $req_prep = Model::getPDO()->prepare($sql);
            $values = array(
                "login" => $login,
            );
            $req_prep->execute($values);
            $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelUser');
            $tab_user = $req_prep->fetchAll();
            if (empty($tab_user)){
                return false;
            }
            return $tab_user[0];
        } catch(PDOException $e) {
            if (Conf::getDebug()) {
                echo $e->getMessage();
            } else {
                echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';
            }
            die();
        }
       
    }

    public function save(){
        try {
            $sql = "INSERT INTO g_user (login,name,surname,password) VALUES (:login,:name,:surname,:password)";
            $req_prep = Model::getPDO()->prepare($sql);
            $values = array(
                "login" => $this -> getLogin(),
                "name" => $this -> getName(),
                "surname" => $this -> getSurname(),
                "password" => $this -> getPassword()
            );
            $req_prep->execute($values);
        } catch(PDOException $e) {
            if (Conf::getDebug()) {
                echo $e->getMessage();
            } else {
                echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';
            }
            die();
        }
    }

    public static function update($data){
        try {
           
            if($data['newname'] == null){
                $data['newname'] = $data['name'];
            }
            if($data['newsurname'] == null){
                $data['newsurname'] = $data['surname'];
            }
            if($data['newpassword'] == null){
                $data['newpassword'] = $data['password'];
            }
            $sql = "UPDATE `g_user` SET `name` = :newname, `surname`= :newsurname, `password` = :newpassword WHERE `login` = :login";
            $req_prep = Model::getPDO()->prepare($sql);
            $values = array(
                "login" => $data['login'],
                "newname" => $data['newname'],
                "newsurname" => $data['newsurname'],
                "newpassword" => $data['newpassword']
            );
            $req_prep->execute($values);
        } catch (PDOException $e) {
            if (Conf::getDebug()) {
                echo $e->getMessage();
            } else {
                echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';
            }
            die();
        }
    }

    public static function deleteByLogin($login){
        try {
            $sql = "DELETE FROM g_user
                    WHERE login = :login";
            $req_prep = Model::getPDO()->prepare($sql);
            $values = array(
                "login" => $login
            );
            $req_prep->execute($values);
        } catch (PDOException $e) {
            if (Conf::getDebug()) {
                echo $e->getMessage(); 
            } else {
                echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';
            }
            die();
        }
    }

    public static function setAdmin($login) {
        try {
            $sql = "UPDATE `g_user` SET `isAdmin` = '1' WHERE `g_user`.`login` = :login";
            $req_prep = Model::getPDO()->prepare($sql);
            $values = array(
                "login" => $login
            );
            $req_prep->execute($values);
            $isAdmin = true;
        } catch (PDOException $e) {
            if (Conf::getDebug()) {
                echo $e->getMessage();
            } else {
                echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';
            }
            die();
        }
    }

    public static function removeAdmin($login) {
        try {
            $sql = "UPDATE `g_user` SET `isAdmin` = '0' WHERE `g_user`.`login` = :login";
            $req_prep = Model::getPDO()->prepare($sql);
            $values = array(
                "login" => $login
            );
            $req_prep->execute($values);
            $isAdmin = false;
        } catch (PDOException $e) {
            if (Conf::getDebug()) {
                echo $e->getMessage();
            } else {
                echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';
            }
            die();
        }
    }

    public static function passwordMatched($data) {
        return $data['newpassword'] == $data['confirmedpassword'];
    }
    
    public static function connect($data) {
        try {
            $sql = "SELECT * FROM g_user WHERE g_user.login = :login AND g_user.password = :password";
        $req_prep = Model::getPDO()->prepare($sql);
        $values = array(
            "login" => $data['login'],
            "password" => $data['password']
        );
        $req_prep->execute($values);
        $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelUser');
        return $req_prep->fetch();
        } catch (PDOException $e) {
            if (Conf::getDebug()) {
                echo $e->getMessage();
            } else {
                echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';
            }
            die();
        }
        
    }
        
    public function __construct($l=NULL,$p=NULL,$n=NULL,$s=NULL){
        if(!is_null($l) && !is_null($p) && !is_null($n) && !is_null($s)){
            $this->login = $l;
            $this->name = $n;
            $this->surname = $s;
            $this->password = $p;
        }
    }



}

