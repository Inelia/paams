<?php require_once APPROOT . '/views/inc/head.php'; ?>
<main class="login">
  <img class="logo" src="../img/PaamS_logo_Blanc_mode.png" alt="logo_paams">
  <form action="<?= URLROOT . '/users/login' ?>" method="post" class="form" name="login">

    <h1 class="form__title">Connexion</h1>
<?= $data['error_message'] == ""?"": '<span class="flash">'. $data['error_message'] .'</span>'; ?>
    <div class="form-control">
      <input id="email" type="email" required name="email" />
      <label for ="email">E-mail</label>
    </div>
    <div class="form-control">
      <input id="password" type="password" required name="password" />
      <label for="password">Mot de passe</label>
    </div>
    <input class="btn--submit" type="submit" value="Se connecter">
    <p class="form__text">Vous n'avez pas encore de compte ?
      <a href="<?= URLROOT . '/users/register'; ?>" class="form__link">Inscrivez-vous</a>
    </p>
  </form>
</main>

<?php require_once APPROOT . '/views/inc/end_page.php';
