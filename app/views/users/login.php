<?php require_once APPROOT . '/views/inc/head.php'; 
$data['error_message'] = "";
?>
<main class="main_login">
  <form action="<?= URLROOT . '/users/login' ?>" method="post" class="form_login" name="login">
  <!-- <p>Merci de remplir tout les champs pour valider votre connexion</p> -->

  <!-- <form class="form_login"> -->

    <h1 class="title_login">Connexion</h1>
<?= $data['error_message'] == ""?"": '<span class="flash">'. $data['error_message'] .'</span>'; ?>
    <div class="form-control">
      <input id="email" type="email" required name="email" />
      <label for ="email">E-mail</label>
    </div>
    <div class="form-control">
      <input id="password" type="password" required name="password" />
      <label for="password">Mot de passe</label>
    </div>
    <input class="btn_login" type="submit" value="Se connecter">
    <!-- <div class="form-control">
      <input type="email" name="email" >
    </div>
    <div>
      <input type="password" name="password" placeholder="Votre mot de passe">
      <span class="invalid-feedback"><?= "tatam" ?></span>
    </div>

      <input type="submit" value="Se connecter">
    <!-- Si on veut mettre une image dans le bouton => changer l'<input /> en <button></button> -->
    <p class="text_login">Vous n'avez pas encore de compte ?
      <a href="<?= URLROOT . '/users/register'; ?>" class="link_login">Inscrivez-vous</a>
    </p>

  </form>
</main>

<?php require_once APPROOT . '/views/inc/end_page.php'; 
