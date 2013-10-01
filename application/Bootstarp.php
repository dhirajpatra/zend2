<?php
/**
 * Ensure all communications are managed by sessions.
 */
require_once ('Zend/Session.php');
Zend_Session::start();

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap {

	/*protected function _initDoctype() {
		$this->bootstrap( 'view' );
		$view = $this->getResource( 'view' );
		$view->navigation = array();
		$view->subnavigation = array();
		$view->headTitle( 'Module One' );
		$view->headLink()->appendStylesheet('/css/clear.css');
		$view->headLink()->appendStylesheet('/css/main.css');
		$view->headScript()->appendFile('/js/jquery.js');
		$view->doctype( 'XHTML1_STRICT' );
		//$view->navigation = $this->buildMenu();
	}*/
	
	protected function _initView()
	{
		// Initialize view
		$view = new Zend_View();
		$view->doctype('XHTML1_STRICT');
		$view->headTitle('My First Zend Framework Application');
	
		// Add it to the ViewRenderer
		$viewRenderer = Zend_Controller_Action_HelperBroker::getStaticHelper(
				'ViewRenderer'
		);
		$viewRenderer->setView($view);
	
		// Return it, so that it can be stored by the bootstrap
		return $view;
	}

	protected function _initAppAutoload()
	{
		$autoloader = new Zend_Application_Module_Autoloader(array(
				'namespace' => 'default',
				'basePath' => dirname(__FILE__),
		));
		return $autoloader;
	}
	
	
	protected function _initLayoutHelper()
	{
		$this->bootstrap('frontController');
		$layout = Zend_Controller_Action_HelperBroker::addHelper(
		new Americostech_Controller_Action_Helper_Layout());
	} 
	

	public function _initControllers()
	{
		$front = Zend_Controller_Front::getInstance();
		$front->addModuleDirectory(APPLICATION_PATH . '/modules/admin/', 'admin');
	}

	protected function _initAutoLoadModuleAdmin() {
		$autoloader = new Zend_Application_module_Autoloader(array(
				'namespace' => 'Admin',
				'basePath' => APPLICATION_PATH . '/modules/admin'
		));

		return $autoloader;
	}

	protected function _initModuleutoload() {
		$autoloader = new Zend_Application_Module_Autoloader ( array ('namespace' => '', 'basePath' => APPLICATION_PATH ) );
		return $autoloader;
	}
	
	protected function _initFrontController() {
		$this->bootstrap('FrontController');        
		$front = $this->getResource('FrontController');        
		$response = new Zend_Controller_Response_Http;        
		$response->setHeader('Content-Type', 'text/html; charset=UTF-8', true);        
		$front->setResponse($response);
	}

}

/*class ModuleLayoutLoader extends Zend_Controller_Action_Helper_Abstract
// looks up layout by module in application.ini
{
	public function preDispatch()
	{
		$bootstrap = $this->getActionController()
		->getInvokeArg('bootstrap');
		$config = $bootstrap->getOptions();
		echo $module = $this->getRequest()->getModuleName();
		/*echo "Configs : <pre>";
		 print_r($config[$module]);
		if (isset($config[$module]['resources']['layout']['layout'])) {
			$layoutScript = $config[$module]['resources']['layout']['layout'];
			$this->getActionController()
			->getHelper('layout')
			->setLayout($layoutScript);
		}
	}
}*/