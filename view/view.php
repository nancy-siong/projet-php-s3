<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $pagetitle; ?></title>
    </head>

    <body>
        <nav>
            <ul>
                <li><a href=" index.php?action=readAll&controller=utilisateur"> Accueil </a></li>
                <li><a href="index.php?action=readAll"> Liste des lunettes </a></li>
                <li><a href="index.php?action=create"> Créer un article </a></li>
            </ul>
        </nav>
        <?php
            $filepath = File::build_path(array("view", $controller, "$view.php"));
            require $filepath;
        ?>

        <p style="border: 1px solid black;text-align:right;padding-right:1em;">
        Site de Lunettes
        </p>


    </body>
</html>
