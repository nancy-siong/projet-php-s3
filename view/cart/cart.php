
<?php
require_once File::build_path(array('model','ModelCart.php'));
        foreach ($tab_c as $c) {
            echo "<p> Article </p> <a href=?action=read&controller=glasses&glassesid=' . rawurlencode($c->getIdGlasses()) . '>' . rawurlencode($c->getIdGlasses()) . '</a>";
        }
            
?>