<?php
    echo '<p> ID de l\'article : ' . " " . $g->getId() . '.</p>';
    echo '<p> Titre de l\'article : ' . " " . $g->getTitle() . '.</p>';
    echo '<p> Description de l\'article : ' ." " . $g->getDescription() . '.</p>';
    echo '<p> Prix : ' . " " . $g->getPrice() . '.</p>';
    echo '<p> <a href=?action=update&glassesid=' . rawurlencode($g->getId()) . '> Modifier cet article</a>.</p>'; 
    echo '<p> <a href=?action=delete&glassesid=' . rawurlencode($g->getId()) . '> Supprimer cet article</a>.</p>';
?>