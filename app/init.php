<?php

session_start();
require_once 'config/config.php';
require_once 'helpers/urlHelper.php';
require_once 'helpers/sessionHelper.php';
require_once 'helpers/globalHelpers.php';


// Autoload
spl_autoload_register(function ($className) {

	require_once 'librairies/' . $className . '.php';
});
