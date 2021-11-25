
        <?php
        foreach ($tab_u as $u)
            echo '<p> Utilisateur ' . htmlspecialchars($u->getName()) . ' ' . htmlspecialchars($u->getSurname()) . '<a href=?action=read&controller=user&login=' . rawurlencode($u->getLogin()) . '> Plus d info ici</a>.</p>';
        ?>
