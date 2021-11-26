<form method="get" action="">

  <fieldset>

    <legend><?= $pagetitle ?></legend>
    <p><input type='hidden' name='action' value=<?= (isset($u) ? "updated" : "created") ?>></p>
    <p><input type='hidden' name='controller' value='user'></p>



      <p>
      <label for="login_id">Login</label> :
      <input type="text" placeholder="exemple@gmail.com" name="newlogin" id="newlogin_id"/>
      </p> 
      <p>
        <label for="surname_id">Nom</label> : 
        <input type="text" placeholder="nouveau nom" name="newsurname" id="newsurname_id" />
      </p>
      <p>
        <label for="name_id">Prénom</label> :
        <input type="text" placeholder="nouveau prénom" name="newname" id="newname_id" />
      </p>
      <p>
        <label for="password_id">Mot de passe</label> : 
        <input type="text" placeholder="Nouveau mot de passe" name="newpassword" id="newpassword_id" />
      </p>
      <p>
        <label for="password_id">Confirmer le mot passe</label> : 
        <input type="text" placeholder="Nouveau mot de passe" name="confirmed_password" id="confirmed_password_id"/>
      </p>


      <p>
        <input type="hidden" name="login" id="login_id" 
        value='<?= (isset($u) ? rawurlencode($u->getLogin()) : "") ?> ' . />
      </p>
      <p>
        <input type="hidden" name="name" id="name_id" 
        value='<?= (isset($u) ? rawurlencode($u->getName()) : "") ?> ' . />
      </p>
      <p>
        <input type="hidden" name="surname" id="surname_id" 
        value='<?= (isset($u) ? rawurlencode($u->getSurname()) : "") ?> ' . />
      </p>
      <p>
        <input type="hidden" name="password" id="password_id" 
        value='<?= (isset($u) ? rawurlencode($u->getPassword()) : "") ?> ' . />
      </p>
      <p>
        <input type="hidden" name="password" id="password_id" 
        value='<?= (isset($u) ? rawurlencode($u->getPassword()) : "") ?> ' . />
      </p>

    <p><input type="submit" value="Envoyer" /></p>

  </fieldset> 

</form>