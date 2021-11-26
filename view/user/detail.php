<div>
    <p> Login <?=$u->getLogin()?> </p>
    <p> Prénom <?=$u->getName()?> </p>
    <p> Nom <?=$u->getSurname() ?> </p>
    <p> Mot de passe <?=$u->getPassword()?> </p>
</div>

<div>
    <p> <a href="?action=update&controller=user&login=<?=rawurlencode($u->getLogin())?>"> Modifier cet utilisateur</a> </p>
    <p> <a href="?action=delete&controller=user&login=<?=rawurlencode($u->getLogin())?>"> Supprimer cet utilisateur</a> </p>
</div>

<?php
    if ($u->getIsAdmin() == false) { ?>
        <p> <a href="?action=setAdmin&&controller=user&login=<?= rawurlencode($u->getLogin()) ?>"> Faire de cet utilisateur un administrateur</a> </p>
<?php
    } else { ?>
        <p> <a href="?action=removeAdmin&&controller=user&login=<?=rawurlencode($u->getLogin())?>"> Retirer le rôle d'administrateur à cet utilisateur</a> </p>
    <?php
    }
?>
