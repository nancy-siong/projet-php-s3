<p> ID de l'article :  <?=htmlspecialchars($g->getId())?></p>
<p> Titre de l'article :  <?=htmlspecialchars($g->getTitle())?></p>
<p> Description de l'article :  <?=htmlspecialchars($g->getDescription())?></p>
<p> Prix : <?=htmlspecialchars($g->getPrice())?></p>

<p> <a href="?action=update&controller=glasses&glassesid=<?= rawurlencode($g->getId()) ?>">Modifier cet article</a></p>
<p> <a href="?action=delete&controller=glasses&glassesid=<?= rawurlencode($g->getId()) ?>">Supprimer cet article</a></p>
<p> <a href="?action=addToCart&controller=cart&glassesid=<?= rawurlencode($g->getId()) ?>">Ajouter Au Panier</a></p>
