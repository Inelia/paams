<?php

class Pages extends Controller
{
	public function __construct()
	{
	}

	public function index()
	{
		$data = ['title' => "bubble"];
		$this->view('pages/index', $data);
	}

	public function contact()
	{
		$data = ['title' => 'Nous contacter'];
		$this->view('pages/contact', $data);
	}
}
