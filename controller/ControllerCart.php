<?php
require_once File::build_path(array("model", "ModelCart.php"));
require_once File::build_path(array('model','ModelUser.php'));

class ControllerCart extends Controller
{
    protected static $object = 'cart';


    public static function readAll()
    {
        $controller = 'cart';
        $tab_c = ModelCart::getAllCarts();

        $view = 'list';
        $pagetitle = 'Les paniers des utilisateurs';
        require File::build_path(array("view", "view.php"));
    }

    public static function addToCart() {
        if(!isset($_SESSION['user'])){
            $controller = 'user';
            $view = 'connect';
            $pagetitle = 'Connexion';
            require File::build_path(array('view','view.php'));
            die;
        }
        $controller = 'cart';
        $u = $_SESSION['user']->getLogin();
        $g = $_GET['glassesid'];
        ModelCart::addToCart($u, $g);
        
        $view = 'productAdded';
        $pagetitle = 'Votre panier';
        require File::build_path(array("view", "view.php"));
    }

    public static function read()
    {
        $view = 'cart';
        $pagetitle = "Votre panier";

        $v = ModelCart::select($immatriculation);

        if ($v) {
            $view = 'detail';
            require File::build_path(array("view", "view.php"));
        } else {
            self::error('Immatriculation non reconnue');
        }
    }

    public static function error($error = 'Une erreur est survenue')
    {
        $view = 'error';
        $pagetitle = 'Une erreur est survenue';
        require File::build_path(array("view", "view.php"));
    }


    public static function create()
    {
        $v = NULL;
        $view = 'update';
        $pagetitle = 'Ajouter un trajet';
        require File::build_path(array("view", "view.php"));
    }

    public static function created()
    {
        $r = ModelTrajet::save($_GET);
        if (gettype($r) == "integer" && $r == 2) {
            self::error('Login inconnu !');
        } else {
            $trajet = "{$_GET['depart']} — {$_GET['arrivee']}";
            $pagetitle = 'Liste des trajets';
            $view = 'created';
            $tab_v = ModelTrajet::selectAll();
            require File::build_path(array("view", "view.php"));
        }
    }

    public static function update()
    {
        $trajet = $_GET['trajet'];
        $v = ModelTrajet::select($trajet);

        $view = 'update';
        $pagetitle = "Mise à jour du trajet n°$trajet";
        require File::build_path(array("view", "view.php"));
    }

    public static function updated()
    {
        ModelTrajet::update($_GET);

        $view = 'updated';
        $pagetitle = 'Liste des trajets';
        $trajet = $_GET['id'];

        $tab_v = ModelTrajet::selectAll();
        require File::build_path(array("view", "view.php"));
    }


    public static function delete()
    {
        $trajet = $_GET['trajet'];
        ModelTrajet::delete($trajet);

        $view = 'deleted';
        $pagetitle = 'Liste des trajets';

        $tab_v = ModelTrajet::selectAll();
        require File::build_path(array("view", "view.php"));
    }
}
