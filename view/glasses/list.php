<!DOCTYPE html>
<html>

<body>
    <?php
    foreach ($tab_v as $v) {

        $vId = htmlspecialchars($v->getId());
        $vIdUrl = rawurlencode($v->getId());

        echo '<p> Lunettes + Nom marque' .
            '<a href="index.php?action=read&id=' . $vId . '">' .
            $vIdUrl . '</a>' .
            '</p>';
    }
    ?>

</body>

</html>