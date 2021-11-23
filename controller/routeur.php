<?php
require_once File::build_path(array('controller','ControllerGlasses.php'));
require_once File::build_path(array('controller','ControllerUser.php'));

$action = "readAll";

if (isset($_GET['action'])) {
    $action = $_GET['action'];
}

$ControllerGlasses_fcts = get_class_methods('ControllerGlasses');
$ControllerUser_fcts = get_class_methods('ControllerUser');
$controller = $_GET['controller'];

if (in_array($action, $ControllerGlasses_fcts) && $controller == "glasses") {
    ControllerGlasses::$action();

}else if(in_array($action, $ControllerUser_fcts) && $controller == "user"){
    ControllerUser::$action();
} else {
    require File::build_path(array('view', 'user', 'errorAction.php'));
}

?>