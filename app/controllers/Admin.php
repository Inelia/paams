<?php

class Admin extends Controller
{
  public function __construct()
  {
    if (!isLoggedIn() && !isAdmin()) {
      redirect('users/login');
    } else {
      //je suis connecté et je suis admin
      $this->userModel = $this->model('user');
    }
  }
  public function index()
  {
    var_dump('on est connecté');
  }
}
