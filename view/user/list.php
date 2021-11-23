
        <?php
        foreach ($tab_u as $u)
            echo '<p> Utilisateur ' . htmlspecialchars($u->getLogin()) . '<a href=?action=read&controller=user&login=' . rawurlencode($u->getLogin()) . '> Plus d info ici</a>.</p>';
        ?>
