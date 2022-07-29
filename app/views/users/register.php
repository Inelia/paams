<?php require_once APPROOT . '/views/inc/head.php';
echo $data['title']; ?>
<main>
  <form action="" method="post" name="register">
    <p>Merci de remplir tout les champs pour valider votre inscription</p>
    <span class="flash"><?= $data['error_message']; ?></span>
    <div>
      <select name="civility" id="civility">
        <option value="Mme">Madame</option>
        <option value="M">Monsieur</option>
      </select>
    </div>
    <div>
      <input type="text" name="first_name" placeholder="votre prénom">
    </div>
    <div>
      <input type="text" name="last_name" placeholder="votre nom">
    </div>
    <div>
      <input type="date" name="birthdate" placeholder="votre date de naissance">
    </div>
    <div>
      <input type="email" name="email" placeholder="Votre email">
    </div>
    <div>
      <input type="password" name="password" placeholder="Votre mot de passe">
    </div>
    <div>
      <input type="password" name="password_confirmation" placeholder="Confirmez votre mot de passe" value="">
    </div>
    <div>
      <input type="submit" value="S'inscrire">
      <!-- Si on veut mettre une image dans le bouton => changer l'<input /> en <button></button> -->
      <p>Vous avez déjà un compte ?
        <a href="<?= URLROOT . '/users/login'; ?>" class="">Connectez-vous</a>
      </p>
    </div>
    <!--  -->

  </form>
</main>

<?php require_once APPROOT . '/views/inc/end_page.php';
