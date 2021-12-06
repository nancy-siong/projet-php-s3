<?php foreach ($tab_g as $g)?>
        <p>Lunettes</p>
        <?php htmlspecialchars($g->getId())?>
        <a href="?action=read&controller=glasses&glassesid=<?= rawurlencode($g->getId()) ?>">Plus d'info ici</a>