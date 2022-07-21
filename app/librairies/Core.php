<?php


/**
 * Classe => noyau de l'app
 * Créée les urls et charge le controleur de base
 * Formate les urls => controllers/methode/params
 */

class Core
{

	protected $currentController = 'Pages';
	protected $currentMethod = 'index';
	protected $params = [];

	public function __construct()
	{

		$url = $this->getURL();


		// on recherche si le controller correspondant au 1er paramettre existe
		if (!is_null($url)) {
			if (file_exists('./app/controllers/' . ucwords($url[0]) . '.php')) {
				$this->currentController = ucwords($url[0]);
				unset($url[0]);
			}
		}
		require_once './app/controllers/' . $this->currentController . '.php';


		// on instancie

		$this->currentController = new $this->currentController;


		// on verifie si il y a un 2em paramettre

		if (isset($url[1])) {
			// on verifie si la methode existe
			if (method_exists($this->currentController, $url[1])) {

				// on met a jours l'attribut currentMethod

				$this->currentMethod = $url[1];

				unset($url[1]);
			}
		}

		//mapping des autres paramettres presents dans l'url => index.php?pages=contact&id=1

		$this->params = $url ? array_values($url) : [];
		// on retourne le tableau de paramettre

		call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
	} // fin du __construct






	public function getURL()
	{

		if (isset($_GET['url'])) {

			$url =  rtrim($_GET['url'], '/');
			$url = filter_var($url, FILTER_SANITIZE_URL);
			$url = explode('/', $url);
			return $url;
		}
	}
}
