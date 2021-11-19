<?php

require_once File::build_path(array('model','ModelGlasses.php'));

class ControllerGlasses {

    public static function readAll()
    {
        $controller = 'glasses';
        $view = 'list';
        $pagetitle = 'Liste des Lunettes';
        $tab_g = ModelGlasses::getAllGlasses();  
        require File::build_path(array('view','view.php'));

    }

    public static function read(){
        if (ModelGlasses::getGlassesById($_GET['glassesid']) == false){
            require File::build_path(array('view','glasses','error.php'));
            return false;
        }
        $g = ModelGlasses::getGlassesById($_GET['glassesid']);
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

}

?>