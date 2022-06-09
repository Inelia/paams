<?php

require_once 'config/config.php';

// Charge la librairie

// Autoload
spl_autoload_register(function($className){

	require_once 'librairies/' . $className . '.php';
});