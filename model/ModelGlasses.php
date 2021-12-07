<?php

require_once File::build_path(array('model', 'Model.php'));

class ModelGlasses extends Model {
    private $id;
    private $title;
    private $description;
    private $price;

    protected static $object = 'g_glasses';
    protected static $primary = 'id';

    public function __construct($id = NULL, $title = NULL, $description = NULL, $price = NULL)
    {
        if (!is_null($id) && !is_null($title) && !is_null($description) && !is_null($price)) {
            $this->id = $id;
            $this->title = $title;
            $this->description = $description;
            $this->price = $price;
        }
    }
    

    // id      

    public function getId()
    {
        return $this->id;
    }

    public function setMarque($id)
    {
        $this->id = $id;
    }


    // title      

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }


    // description      

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }


    // price      

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }

    // public static function getGlassesById($id)
    // {
    //     try {
    //         $sql = "SELECT * FROM g_glasses WHERE id = :id";
    //         $req_prep = Model::getPDO()->prepare($sql);
    //         $values = array(
    //             "id" => $id,
    //         );
    //         $req_prep->execute($values);
    //         $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelGlasses');
    //         $tab_glasses = $req_prep->fetchAll();
    //         if (empty($tab_glasses)) {
    //             return false;
    //         }
    //         return $tab_glasses[0];

    //     } catch (PDOException $e) {
    //         if (Conf::getDebug()) {
    //             echo $e->getMessage(); // affiche un message d'erreur
    //         } else {
    //             echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';
    //         }
    //         die();
    //     }
    // }


    public function save()
    {
        try {
            $sql = "INSERT INTO g_glasses (id,title,description,price) VALUES (:id,:title,:description,:price)";
            $req_prep = Model::getPDO()->prepare($sql);
            $values = array(
                "id" => $this -> getId(),
                "title" => $this -> getTitle(),
                "description" => $this -> getDescription(),
                "price" => $this -> getPrice()
            );
            $req_prep->execute($values);
        } catch(PDOException $e) {
            if (Conf::getDebug()) {
                echo $e->getMessage(); // affiche un message d'erreur
            } else {
                echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';
            }
            die();
        }
    }


    public static function deleteById($id) {
        $sql = "DELETE FROM g_glasses WHERE id=:id";
        $req_prep = Model::getPDO()->prepare($sql);

        $values = array(
            "id" => $id,
        );

        $req_prep->execute($values);
    }


    public static function update($data){
        try {
            if($data['newglassesid'] == null){
                $data['newglassesid'] = $data['glassesid'];
            }
            if($data['newtitle'] == null){
                $data['newtitle'] = $data['title'];
            }
            if($data['newdescription'] == null){
                $data['newdescription'] = $data['description'];
            }
            if($data['newprice'] == null){
                $data['newprice'] = $data['price'];
            }
            $sql = "UPDATE `g_glasses` SET `id` = :newglassesid, `title` = :newtitle, `description` = :newdescription, `price` = :newprice WHERE `g_glasses`.`id` = :glassesid";
            $req_prep = Model::getPDO()->prepare($sql);
            $values = array(
                "glassesid" => $data['glassesid'],
                "newglassesid" => $data['newglassesid'],
                "newtitle" => $data['newtitle'],
                "newdescription" => $data['newdescription'],
                "newprice" => $data['newprice']
            );
            $req_prep->execute($values);
        } catch (PDOException $e) {
            if (Conf::getDebug()) {
                echo $e->getMessage(); // affiche un message d'erreur
            } else {
                echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';
            }
            die();
        }
    }
}




