<?php
    echo '<p> Login ' . " " . $u->getLogin() . '.</p>';
    echo '<p> Prénom' . " " . $u->getName() . '.</p>';
    echo '<p> Nom' . " " . $u->getSurname() . '.</p>';
    echo '<p> Mot de passe' . " " . $u->getPassword() . '.</p>';
    echo '<p> <a href=?action=update&&controller=user&login=' . rawurlencode($u->getLogin()) . '> Modifier cet utilisateur</a>.</p>'; 
    echo '<p> <a href=?action=delete&&controller=user&login=' . rawurlencode($u->getLogin()) . '> Supprimer cet utilisateur</a>.</p>';

    if ($u->getIsAdmin() == false) {
                echo '<p> <a href=?action=setAdmin&&controller=user&login=' . rawurlencode($u->getLogin()) . '> Faire de cet utilisateur un administrateur</a>.</p>';
    }
    else {
        echo '<p> <a href=?action=removeAdmin&&controller=user&login=' . rawurlencode($u->getLogin()) . '> Retirer le rôle d\'administrateur à cet utilisateur</a>.</p>';
    }
?>
