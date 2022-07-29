<?php

class Pages extends Controller
{
	public function __construct()
	{
	}

	public function index()
	{
		$data = ['title' => "index"];
		$this->view('pages/index', $data);
	}

	public function contact()
	{
		$data = ['title' => 'Nous contacter'];
		$this->view('pages/contact', $data);
	}

	public function welcome()
	{
		$data = ['title' => 'Bienvenue'];
		$this->view('pages/welcome', $data);
	}
	public function accueil()
	{
		$data = ['title' => 'Accueil'];
		$this->view('pages/accueil', $data);

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