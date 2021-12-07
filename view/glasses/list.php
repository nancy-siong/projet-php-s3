<?php
        foreach ($tab_g as $g) {
            echo '<p> Lunettes ' . htmlspecialchars($g->getId()) . '<a href=?action=read&controller=glasses&glassesid=' . rawurlencode($g->getId()) . "> Plus d'info ici</a>.</p>";
        }
            
?>