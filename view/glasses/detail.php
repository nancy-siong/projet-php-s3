<p> ID de l'article :  <?=$g->getId()?></p>
<p> Titre de l'article :  <?=$g->getTitle()?></p>
<p> Description de l'article :  <?=$g->getDescription()?></p>
<p> Prix : <?=$g->getPrice()?></p>

<p> <a href="?action=update&controller=glasses&glassesid=<?= rawurlencode($g->getId()) ?>">Modifier cet article</a></p>
<p> <a href="?action=delete&controller=glasses&glassesid=<?= rawurlencode($g->getId()) ?>">Supprimer cet article</a></p>
