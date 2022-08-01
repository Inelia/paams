<?php

class Users extends Controller
{
  public function __construct()
  {
    $this->userModel = $this->model('User');
  }
  /**
   * Affichage la vue de la page de connection et gère les erreurs
   *
   * @return void
   */
  public function register()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $data = [
        'title' => "S'inscrire",
        'civility' => $_POST['civility'],
        'first_name' => trim(htmlspecialchars($_POST['first_name'])),
        'last_name' => trim(htmlspecialchars($_POST['last_name'])),
        'birthdate' => trim(htmlspecialchars($_POST['birthdate'])),
        'email' => trim(
          htmlspecialchars($_POST['email'])
        ),
        'password' => trim(htmlspecialchars($_POST['password'])),
        'password_confirmation' => trim(
          htmlspecialchars($_POST['password_confirmation'])
        ),
        'error_message' => ""
      ];
      if (empty($data['civility'] or $data['first_name']) or empty($data['last_name']) or empty($data['birthdate']) or empty($data['email']) or empty($data['password']) or empty($data['password_confirmation'])) {
        $data['error_message'] = "Merci de compléter tous les  champs";
      } else {
        if (!check_password_format($data['password'])) {
          $data['error_message'] = "Mot de passe incorrecte, il doit être supérieur à 8 caractères, et contenir une majuscule, une minuscule et un chiffre";
        } else if ($data['password'] != $data['password_confirmation']) {
          $data['error_message'] = "Les mots de passe ne correspondent pas";
        }
        if ($this->userModel->findUserByEmail($data['email'])) {
          $data['error_message'] = "Email déjà enregistré";
        }
      }
      if (empty($data['error_message'])) {
        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        if ($this->userModel->register($data)) redirect("users/login");
        else die('Une erreur s\'est produite');
      }
    } else {
      $data = [
        'title' => "S'inscrire",
        'civility' => '',
        'first_name' => "",
        'last_name' => "",
        'birthdate' => "",
        'email' => "",
        'password' => "",
        'password_confirmation' => "",
        'error_message' => "",
      ];
    }
    $this->view('users/register', $data);
  }
  /**
   * Undocumented function
   *
   * @return void
   */
  public function login()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $data = [
        'title' => "Se connecter",
        'email' => trim(htmlspecialchars($_POST['email'])),
        'password' => trim(htmlspecialchars($_POST['password'])),
        'error_message' => ""
      ];
      if (empty($data['email']) or empty($data['password'])) {
        $data['error_message'] = "Merci de compléter tous les  champs";
      } else if (!$this->userModel->findUserByEmail($data['email']) or !$this->userModel->comparePasswordWithDB($data['email'], $data['password'])) {
        // si l'email n'est pas dans la base de données OU le mot de passe ne corresponds pas avec celui de la base de données
        $data['error_message'] = "Un des champs est incorrecte";
      }
      if (empty($data['error_message'])) {
        $loggedInUser = $this->userModel->comparePasswordWithDB($data['email'], $data['password']);
        $this->createUserSession($loggedInUser);
      }
    } else {
      $data = [
        'title' => "Se connecter",
        'email' => "",
        'password' => "",
        'error_message' => "",
      ];
    }
    $this->view('users/login', $data);
  }
  /**
   * Methodes pour les sessions
   *
   * @return void
   */
  public function createUserSession($user)
  {
    $_SESSION['user_id'] = $user->id;
    $_SESSION['user_email'] = $user->email;
    $_SESSION['user_first_name'] = $user->first_name;
    redirect('pages/index');
  }

  public function logout()
  {
    unset($_SESSION['user_id']);
    unset($_SESSION['user_email']);
    unset($_SESSION['user_first_name']);
    session_destroy();
    redirect('users/login');
  }
  public function isLoggedIn()
  {
    if (isset($_SESSION['user_id'])) return true;
    else return false;
  }
}
