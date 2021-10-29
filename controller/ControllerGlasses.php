<?php
require_once File::build_path(array('model','ModelVoiture.php'));

class ControllerVoiture {

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