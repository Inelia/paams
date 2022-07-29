<?php require_once APPROOT . '/views/inc/head.php';
$data['error_message'] = "";
?>
<main class="main_register">
<img class="register_logo" src="../img/PaamS_logo_Blanc_mode.png" alt="logo_paams">
  <form action="<?= URLROOT . '/users/register' ?>" method="post" class="form_register" name="register">
  <h1 class="title_login">Inscription</h1>
    <?= $data['error_message'] == ""?"": '<span class="flash">'. $data['error_message'] .'</span>'; ?>
    <div class="form-civilite">
    <label class="label-civilite">Civilité *</label>
    </div>
    <div class="radio_register">
      <input class="input_radio_men" type="radio" id="monsieur" name="madame">
      <label class="label_radio" for="monsieur">M</label>
      <input class="input-radio-right" type="radio" id="madame" name="madame">
      <label class="label_radio" for="madame">Mme</label>
    </div>
    <div class="form-control">
      <input id="name" type="text" name="name" required>
      <label for="name">Nom *</label>
    </div>
    <div class="form-control">
      <input id="first-name" type="text" name="name" required>
      <label for="first-name">Prénom *</label>
    </div>
    <div class="form-control">
      <input type="date" id="birthday" name="birthday">
      <label for="birthday">Date de naissance</label>
    </div>
    <div class="form-control">
      <input id="email" type="email" required name="email" />
      <label for ="email">E-mail *</label>
    </div>
    <div class="form-control">
      <input id="password" type="password" name="password" required>
      <label for="password">Mot de passe *</label>
    </div>
    <div class="form-control">
      <input id="password_confirmation" type="password" name="password_confirmation" required>
      <label for="password_confirmation">Confirmation du mot de passe *</label>
    </div>
    <input class="btn_login" type="submit" value="S'inscrire">
      <p class="text_login">Vous avez déjà un compte ?
        <a href="<?= URLROOT . '/users/login'; ?>" class="link_login">Connectez-vous</a>
      </p>
  </form>
</main>

<?php require_once APPROOT . '/views/inc/end_page.php';
