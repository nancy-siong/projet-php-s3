<?php
require_once File::build_path(array('controller', 'ControllerGlasses.php'));

$action = "readAll";

if (isset($_GET['action'])) {
    $action = $_GET['action'];
}

$ControllerGlasses_fcts = get_class_methods('ControllerGlasses');

if (in_array($action, $ControllerGlasses)) {
    // Appel de la méthode statifr/~siongn/PHP/TD-PHP/TD6/index.php?action=delete&immat=555BB66que $action de ControllerVoiture
    ControllerGlasses::$action();
} 

else {
    require File::build_path(array('view', 'glasses', 'error.php'));
}

?>