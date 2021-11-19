<?php
require_once File::build_path(array('model','ModelVoiture.php'));

class ControllerGlasses {

    public static function readAll()
    {
        $controller = 'glasses';
        $view = 'list';
        $pagetitle = 'Liste des Lunettes';
        $tab_v = ModelGlasses::getAllGlasses();  
        require File::build_path(array('view','view.php'));

    }
}
?>