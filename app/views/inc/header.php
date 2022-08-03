<header>
  <nav>
    <a href="<?= URLROOT ?>/pages/accueil">Go to Accueil</a>
    <br />
    <a href="<?= URLROOT ?>/pages/contact">Go to contact</a>
    <br />
    <a href="<?= URLROOT ?>/pages/welcome">Go to Welcome</a><br>


    <?php
    if (isLoggedIn()) {
      if (isAdmin()) {
        echo '<a href="' . URLROOT . '/admin">Admin Index</a><br><a href="' . URLROOT . '/users/logout">Logout</a><br>';
      } else {
        echo '<a href="' . URLROOT . '/users/logout">Logout</a><br>';
      }
    } else {
      echo '    <a href="' . URLROOT . '/users/login">Login</a><br>';
    }
    ?>
  </nav>
</header>