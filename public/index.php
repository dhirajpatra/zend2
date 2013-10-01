<?php

// Define path to application directory
defined('APPLICATION_PATH')
    || define('APPLICATION_PATH',
              realpath(dirname(__FILE__) . '/../application'));

if (!defined('APPLICATION_ROOT')) {
	define('APPLICATION_ROOT', realpath(dirname(__FILE__) . '/..'));
}
 
// Define application environment
defined('APPLICATION_ENV')
    || define('APPLICATION_ENV',
              (getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV')
                                         : 'production'));
 
// Typically, you will also want to add your library/ directory
// to the include_path, particularly if it contains your ZF installed
set_include_path(implode(PATH_SEPARATOR, array(
    dirname(dirname(__FILE__)) . '/library',
    get_include_path(),
)));
 
/** Zend_Application */
require_once 'Zend/Application.php';

$app = new Zend_Application(APPLICATION_ENV); echo 'here'; exit;
$app->run();
/*
$autoloader = Zend_Loader_Autoloader::getInstance();

// Create application, bootstrap, and run
$application = new Zend_Application(
    APPLICATION_ENV,
    APPLICATION_PATH . '/configs/application.ini'
);

$application->bootstrap()
            ->run();*/