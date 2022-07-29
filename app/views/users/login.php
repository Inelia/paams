<?php require_once APPROOT . '/views/inc/head.php';
echo $data['title']; ?>
<main>
  <span class="flash"><?= $data['error_message']; ?></span>
  <form action="" method="post" name="login">
    <p>Merci de remplir tout les champs pour valider votre connexion</p>

    <div>
      <input type="email" name="email" placeholder="Votre email">
    </div>
    <div>
      <input type="password" name="password" placeholder="Votre mot de passe">
    </div>

    <div>
      <input type="submit" value="Se connecter">
      <!-- Si on veut mettre une image dans le bouton => changer l'<input /> en <button></button> -->
      <p>Vous n'avez pas encore de compte ?
        <a href="<?= URLROOT . '/users/register'; ?>" class="">Inscrivez-vous</a>
      </p>

    </div>


  </form>
</main>

<?php require_once APPROOT . '/views/inc/end_page.php';
