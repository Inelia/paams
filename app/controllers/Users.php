<?php
class Users extends Controller {
  
  public function login()
	{
		$data = ['title' => 'Connexion'];
		$this->view('users/login', $data);
	}

	public function register()
	{
		$data = ['title' => 'register'];
		$this->view('users/register', $data);
	}
}