<form method="get" action="">
  <fieldset>
    <legend>MAJ des informations</legend>
    <p>
      <input type='hidden' name='action' value='updated'>
    </p>
    <p>
      <input type='hidden' name='controller' value='user'>
    </p>
    <?php
    echo'<p>
    <label for="login_id">Login</label> :
    <input type="text" placeholder="nouveau Login" name="newlogin" id="newlogin_id"/>
    </p> 
    <p>
      <label for="name_id">Prénom</label> :
      <input type="text" placeholder="nouveau prénom" name="newname" id="newname_id" />
    </p>
    <p>
      <label for="password_id">Mot de passe</label> : 
      <input type="text" placeholder="nouveau mot de passe" name="newpassword" id="newpassword_id" />
    </p>
    <p>
      <label for="surname_id">Nom</label> : 
      <input type="text" placeholder="nouveau nom" name="newsurname" id="newsurname_id" />
    </p>
    <p>
      <input type="hidden" name="login" id="login_id" value=' . rawurlencode($u->getLogin()) . ' . />
    </p>
    <p>
      <input type="hidden" name="name" id="name_id" value=' . rawurlencode($u->getName()) . ' . />
    </p>
    <p>
      <input type="hidden" name="surname" id="surname_id" value=' . rawurlencode($u->getSurname()) . ' . />
    </p>
    <p>
      <input type="hidden" name="password" id="password_id" value=' . rawurlencode($u->getPassword()) . ' . />
    </p>'
    ?>
    <p>
      <input type="submit" value="Envoyer" />
    </p>
  </fieldset> 
</form>