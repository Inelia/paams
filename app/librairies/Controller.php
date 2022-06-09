<?php


/*
* Contrôleur de base
* Charge les modèles et les vues
*/

class Controller
{

	//  chargement du modele (données)
	public function model($model)
	{
		// donne le chemin vers le fichier
		require_once '../app/models/' . $model . '.php';

		//instancier la class
		return new $model;
	}

	// plus tard rajouter une verification et une condition

	//  chargement de la vue

	public function view($view, $data = [])
	{

		if (file_exists('../app/views/' . $view . '.php')) {
			require_once '../app/views/' . $view . '.php';
		} else {
			die("La vue n'existe pas");
		}
	}
}
