<form method="get" action="">
  <fieldset>
    <legend>MAJ des informations de l'article</legend>
    <p>
      <input type='hidden' name='action' value='updated'>
    </p>
    <p>
      <input type='hidden' name='controller' value='glasses'>
    </p>
    <?php
    echo'<p>
    <label for="newglassesid_id">Id</label> :
    <input type="text" placeholder="nouvel ID" name="newglassesid" id="newglassesid_id"/>
    </p> 
    <p>
      <label for="newtitle_id">Titre</label> :
      <input type="text" placeholder="nouveau titre" name="newtitle" id="newtitle_id" />
    </p>
    <p>
      <label for="newdescription_id">Description</label> : 
      <input type="text" placeholder="nouvelle description" name="newdescription" id="newdescription_id" />
    </p>
    <p>
    <label for="newprice_id">Prix</label> : 
    <input type="int" placeholder="nouveau prix" name="newprice" id="newprice_id" />
    </p>
    <p>
      <input type="hidden" name="glassesid" id="glassesid_id" value=' . rawurlencode($g->getId()) . ' . />
    </p>
    <p>
      <input type="hidden" name="title" id="title_id" value=' . rawurlencode($g->getTitle()) . ' . />
    </p>
    <p>
      <input type="hidden" name="description" id="description_id" value=' . rawurlencode($g->getDescription()) . ' . />
    </p>
    <p>
      <input type="hidden" name="price" id="price_id" value=' . rawurlencode($g->getPrice()) . ' . />
    </p>'
    ?>
    <p>
      <input type="submit" value="Envoyer" />
    </p>
  </fieldset> 
</form>