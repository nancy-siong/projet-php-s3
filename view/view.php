<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $pagetitle; ?></title>
    </head>

    <body>
        <header>
            <?php 
            if (isset($_SESSION['user'])) { ?>
                <div>Bonjour <?=$_SESSION['user']->getName()?></div>
            <?php } ?>

            <ul>


                <li><a href="index.php?action=readAll&controller=glasses"> Liste des lunettes </a></li>

                <?php
                if (isset($_SESSION['user'])) {
                    if($_SESSION['user']->getIsAdmin() == 1) { ?>
                        <li><a href="index.php?action=read&controller=cart"> Votre panier </a></li>
                    <?php 
                    }
                } ?>

                
                <!-- (ADMIN) Liste des clients -->

                <?php
                if (isset($_SESSION['user'])) {
                    if($_SESSION['user']->getIsAdmin() == 1) { ?>
                        <li><a href="index.php?action=readAll&controller=user"> Liste des clients </a></li>
                    <?php
                    }
                } ?>

                <!-- (ADMIN) Créer un article -->

                <?php
                if (isset($_SESSION['user'])) {
                    if($_SESSION['user']->getIsAdmin() == 1) { ?>
                        <li><a href="index.php?action=create&controller=glasses"> Créer un article </a></li>
                    <?php
                    }
                } ?>

                <!-- (ADMIN & VISITEUR) Créer un compte -->
                
                <?php
                if (isset($_SESSION['user'])) {
                    if($_SESSION['user']->getIsAdmin() == 1) { ?>
                        <li><a href="index.php?action=create&controller=user"> Créer un utilisateur </a></li>
                    <?php 
                    }
                } 
                else { ?>
                        <li><a href="index.php?action=create&controller=user"> S'inscrire </a></li>
                <?php 
                } ?>
                
                    
                <!-- (VISITEUR) Se connecter -->
                
                <?php
                if (!isset($_SESSION['user'])) { ?>
                    <li><a href="index.php?action=connect&controller=user"> Se connecter </a></li>
                <?php
                } 
                else { ?>
                    <li><a href="index.php?action=disconnect&controller=user"> Se déconnecter </a></li>
                <?php
                } ?>

            </ul>

        </header>
        
        <?php
            $filepath = File::build_path(array("view", static::$object, "$view.php"));
            require $filepath;
        ?>

        <p style="border: 1px solid black;text-align:right;padding-right:1em;">
        Site de Lunettes
        </p>


    </body>
</html>
