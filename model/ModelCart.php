<?php

require_once File::build_path(array('model', 'Model.php'));

class ModelCart extends Model {

    private $login_user;
    private $id_glasses;
    private $quantity;
    protected static $object = 'cart';

    public function __construct($login_user = NULL, $id_glasses = NULL, $quantity = NULL)
    {
        if (!is_null($login_user) && !is_null($id_glasses) && !is_null($quantity)) {
            $this->login_user = $login_user;
            $this->id_glasses = $id_glasses;
            $this->quantity = $quantity;
        }
    }

    public function getLoginUser() {
        return $this->login_user;
    }

    public static function addToCart($login_user, $id_glasses) {
        try {
            $sql = "SELECT * FROM g_cart WHERE login_user = :login_user AND id_glasses = :id_glasses";
            $req_prep = Model::getPDO()->prepare($sql);

            $values = array(
                'login_user' => $login_user,
                'id_glasses' => $id_glasses
            );
            $req_prep->execute($values);
            $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelCart');
            $p = $req_prep->fetch();
            if ($p == false) {
                $sql = "INSERT INTO g_cart(login_user, id_glasses, quantity) VALUES (:login_user, :id_glasses, '1')";
                $req_prep = Model::getPDO()->prepare($sql);

                $values = array(
                    'login_user' => $login_user,
                    'id_glasses' => $id_glasses,
                );
                $req_prep->execute($values);
            } else {
                $sql = "UPDATE `g_cart` SET `quantity` = `quantity` + 1 WHERE login_user = :login_user AND id_glasses = :id_glasses";
                $req_prep = Model::getPDO()->prepare($sql);

                $values = array(
                    'login_user' => $login_user,
                    'id_glasses' => $id_glasses,
                );
                $req_prep->execute($values);
            }
        } catch (PDOException $e) {
            if (Conf::getDebug()) {
                echo $e->getMessage();
            } else {
                echo 'Impossible de récupérer le panier de l\'utilisateur : ', $login_user;
            }
            die();
        }
    }

}