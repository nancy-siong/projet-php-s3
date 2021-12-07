<?php

require_once File::build_path(array('model','ModelGlasses.php'));

class ControllerGlasses {

    protected static $object = 'glasses';

    public static function readAll()
    {
        $view = 'list';
        $pagetitle = 'Liste des Lunettes';
        $tab_g = ModelGlasses::selectAll();
        require File::build_path(array('view','view.php'));
    }

    public static function read(){
        if (ModelGlasses::select($_GET['glassesid']) == false){
            require File::build_path(array('view','glasses','error.php'));
            return false;
        }
        $g = ModelGlasses::select($_GET['glassesid']);
        $controller='glasses';
        $view='detail';
        $pagetitle='Informations de la paire de lunettes';
        require File::build_path(array('view','view.php'));
    }

    public static function create(){
        $controller='glasses';
        $view='create';
        $pagetitle='Inscription';
        require File::build_path(array('view','view.php'));
    }

    public static function created(){
        $g = new ModelGlasses($_GET['glassesid'], $_GET['title'], $_GET['description'], $_GET['price']);
        $g -> save();
        
        $tab_g = ModelGlasses::getAllGlasses();
        $controller='glasses';
        $view='created';
        $pagetitle='Article créé';
        require File::build_path(array('view', 'view.php'));
    }

    public static function delete() {
        $id = $_GET['glassesid'];
        ModelGlasses::deleteById($id);
        $controller='glasses';
        $view='deleted';
        $pagetitle='Article supprimé';
        require File::build_path(array('view', 'view.php'));
    }

    public static function update(){
        $id = $_GET['glassesid'];
        $g = ModelGlasses::getGlassesById($id);
        $controller='glasses';
        $view='update';
        $pagetitle='Maj dun article';
        require File::build_path(array('view','view.php'));
    }

    public static function updated(){
        $data = array(
            "glassesid" => $_GET['glassesid'],
            "title" => $_GET['title'],
            "description" => $_GET['description'],
            "price" => $_GET['price'],
            "newglassesid" => $_GET['newglassesid'],
            "newtitle" => $_GET['newtitle'],
            "newdescription" => $_GET['newdescription'],
            "newprice" => $_GET['newprice']
        );
        $id = $_GET['glassesid'];
        ModelGlasses::update($data);
        $controller='glasses';
        $view='updated';
        $pagetitle='Maj dun article';
        require File::build_path(array('view','view.php'));
    }


}

?>