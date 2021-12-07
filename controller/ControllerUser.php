<?php
require_once File::build_path(array('model','ModelUser.php'));

Class ControllerUser {

    protected static $object = 'user';

    public static function errorAction() {
        $controller='user';
        $view='errorAction';
        $pagetitle='Erreur!';
        require File::build_path(array('view','view.php'));
    }

    public static function readAll() {
        $tab_u = ModelUser::selectAll(); 

        $view = 'list';
        $pagetitle = 'Liste des utilisateurs';
        require File::build_path(array('view','view.php'));
    }

    public static function read(){
        if (ModelUser::getUserByLogin($_GET['login']) == false){
            require File::build_path(array('view','user','error.php'));
            return false;
        }
        $u = ModelUser::getUserByLogin($_GET['login']);
        $controller='user';
        $view='detail';
        $pagetitle='Informations de lutilisateur';
        require File::build_path(array('view','view.php'));
    }

    public static function update(){
        $login = $_GET['login'];
        $u = ModelUser::getUserByLogin($login);
        $controller='user';
        $view='update';
        $pagetitle="Mise à jour";
        require File::build_path(array('view','view.php'));
    }

    public static function updated(){
        $data = array(
            "login" => $_GET['login'],
            "name" => $_GET['name'],
            "surname" => $_GET['surname'],
            "password" => $_GET['password'],
            "newname" => $_GET['newname'],
            "newsurname" => $_GET['newsurname'],
            "newpassword" => $_GET['newpassword']
        );
        ModelUser::update($data);
        $controller='user';
        $view='updated';
        $pagetitle='Maj dun utilisateur';
        require File::build_path(array('view','view.php'));

    }

    public static function delete(){
        $login = $_GET['login'];
        ModelUser::deleteByLogin($login);
        $tab_u = ModelUser::getAllUsers();
        $controller='user';
        $view='deleted';
        $pagetitle='Suppression utilisateur';
        require File::build_path(array('view','view.php')); 


    }
    
    public static function create() {
        $controller='user';
        $view='create';
        $pagetitle='Inscription';
        require File::build_path(array('view','view.php'));
    }

    public static function created() {
        $data = array (
            "newpassword" => $_GET['newpassword'],
            "confirmedpassword" => $_GET['confirmed_password']
        );
        if (ModelUser::passwordMatched($data)) {
            $u = new ModelUser($_GET['login'], $_GET['password'], $_GET['name'], $_GET['surname']);
            $u -> save();
            $tab_u = ModelUser::getAllUsers();
            $controller='user';
            $view='created';
            $pagetitle='Utilisateur créé';
            require File::build_path(array('view', 'view.php'));
        } else {
            $tab_u = ModelUser::getAllUsers();
            $controller='user';
            $view='errorPasswordConfirmation';
            $pagetitle='Erreur';
            require File::build_path(array('view', 'view.php'));
        }
        
    }

    public static function connect() {
        $controller = 'user';
        $view='connect';
        $pagetitle='Connexion';
        require File::build_path(array('view', 'view.php')); 
    }

    public static function connected() {
        $data = array(
            "login" => $_GET['login'],
            "password" => $_GET['password']
        );
        $u = ModelUser::connect($data);
        if($u == false){
            $controller = 'user';
            $view='errorConnect';
            $pagetitle='Erreur!';
            require File::build_path(array('view','view.php'));
        }else{
            $_SESSION['user'] = $u;
            $controller = 'user';
            $view='connected';
            $pagetitle='Connecté';
            require File::build_path(array('view', 'view.php'));
        }
        
    }

    public static function setAdmin() {
        $login = $_GET['login'];
        ModelUser::setAdmin($login);
        $controller = 'user';
        $view = 'setAdminDone';
        $pagetitle = 'Administrateur créé';
        require File::build_path(array('view', 'view.php')); 
    }

    public static function removeAdmin() {
        $login = $_GET['login'];
        ModelUser::removeAdmin($login);
        $controller = 'user';
        $view = 'removeAdminDone';
        $pagetitle = 'Cet utilisateur n\'est plus administrateur';
        require File::build_path(array('view', 'view.php')); 
    }
}