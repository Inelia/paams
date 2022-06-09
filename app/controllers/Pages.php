<?php

class Pages extends Controller
{
	public function __construct()
	{
	}

	public function index()
	{
		$data = ['title' => "Bienvenue sur l'index"];
		$this->view('pages/index', $data);
	}

	public function contact()
	{
		$data = ['title' => 'Contactez-nous'];
		$this->view('pages/contact', $data);
	}
}
