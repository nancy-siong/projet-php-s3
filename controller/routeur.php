<?php
require_once File::build_path(array('controller','ControllerGlasses.php'));
require_once File::build_path(array('controller','ControllerUser.php'));
require_once File::build_path(array('controller','ControllerCart.php'));

if (!empty($_GET)) {
    if (isset($_GET['action'])) {
        $action = $_GET['action'];
    }

    $controller = 'glasses';
    if (isset($_GET['controller'])) {
        $controller = $_GET['controller'];
    }

    $controller_class = "Controller" . ucfirst($controller);

    if (class_exists($controller_class)) {
        if (in_array($action, get_class_methods($controller_class))) {
            $controller_class::$action();
        } else {
            ControllerGlasses::error("Action invalide");
        }
    } else {
        ControllerGlasses::error("Controller invalide");
    }
} else {
    ControllerGlasses::readAll();
}

?>