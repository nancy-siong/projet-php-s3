<p>Votre panier contient:</p>

<?php
    foreach ($tab_c as $c) {
        $glassesQuantity = $c->getQuantity();
        $glassesId = htmlspecialchars($c->getIdGlasses());
        $glassesTotal = $glassesQuantity * $glassesId;
        
        echo "<p>" . $glassesQuantity . " x " . htmlspecialchars($c->getIdGlasses()) . " = " . $glassesTotal;
    }
?>
