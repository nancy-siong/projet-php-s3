<form method="get" action="">

  <fieldset>

    <legend><?= $pagetitle ?></legend>

    <p><input type='hidden' name='action' value=<?= (isset($u) ? "updated" : "created") ?>/></p>
    <p><input type='hidden' name='controller' value='user'></p>


    <p>
      <label for="password_id">Mot de passe :</label>
      <input type="password" placeholder="Saisissez votre ancien mot de passe" name="newpassword" id="newpassword_id" required />
    </p>

    <p>
      <label for="password_id">Confirmer le mot passe :</label>
      <input type="password" placeholder="Saisissez votre ancien mot de passe pour confirmer" name="confirmed_password" id="confirmed_password_id"required />
    </p>


    <p><input type="submit" value="Envoyer" /></p>

  </fieldset>

</form>