<?php require_once APPROOT . '/views/inc/head.php'; ?>
<main class="register">
  <img class="logo" src="../img/PaamS_logo_Blanc_mode.png" alt="logo_paams">
  <form action="<?= URLROOT . '/users/register' ?>" method="post" class="form" name="register">
    <h1 class="form__title">Inscription</h1>
    <?= $data['error_message'] == "" ? "" : '<span class="flash">' . $data['error_message'] . '</span>'; ?>
    <div class="form-control--civility">
      <label>Civilité *</label>
    </div>
    <div class="form-control--radio">
      <input class="form__radio" type="radio" id="monsieur" name="civility" required value="M">
      <label class="form__radio-label" for="monsieur">M</label>
      <input class="form__radio" type="radio" id="madame" name="civility" value="Mme">
      <label class="form__radio-label" for="madame">Mme</label>
    </div>
    <div class="form-control">
      <input id="last_name" type="text" name="last_name" required>
      <label for="last_name">Nom *</label>
    </div>
    <div class="form-control">
      <input id="first_name" type="text" name="first_name" required>
      <label for="first_name">Prénom *</label>
    </div>
    <div class="form-control">
      <input type="date" id="birthdate" name="birthdate">
      <label for="birthdate">Date de naissance</label>
    </div>
    <div class="form-control">
      <input id="email" type="email" required name="email" />
      <label for="email">E-mail *</label>
    </div>
    <div class="form-control">
      <input id="password" type="password" name="password" required>
      <label for="password">Mot de passe *</label>
    </div>
    <div class="form-control">
      <input id="password_confirmation" type="password" name="password_confirmation" required>
      <label for="password_confirmation">Confirmation du mot de passe *</label>
    </div>
    <input class="btn--submit" type="submit" value="S'inscrire">
    <p class="form__text">Vous avez déjà un compte ?
      <a href="<?= URLROOT . '/users/login'; ?>" class="form__link">Connectez-vous</a>
    </p>
  </form>
</main>

<?php require_once APPROOT . '/views/inc/end_page.php';
