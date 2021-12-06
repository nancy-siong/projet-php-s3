<form method="get" action="">

  <fieldset>

    <legend>Inscription</legend>

    <p>
      <input type='hidden' name='action' value='created'>
    </p>

    <p>
      <input type='hidden' name='controller' value='user'>
    </p>

    <p>
      <label for="login_id">Login</label> :
      <input type="text" placeholder="example@gmail.com" name="login" id="login_id" required/>
    </p>
    
    <p>
      <label for="name_id">Prénom</label> :
      <input type="text" placeholder="Prénom" name="name" id="name_id" required/>
    </p>

    <p>
      <label for="surname_id">Nom</label> :
      <input type="text" placeholder="Nom" name="surname" id="surname_id" required/>
    </p>

    <p>
      <label for="password_id">Mot de passe</label> :
      <input type="text" placeholder="johndeuf123" name="password" id="password_id" required/>
    </p>

    <p>
      <input type="submit" value="Envoyer" />
    </p>

  </fieldset> 

</form>