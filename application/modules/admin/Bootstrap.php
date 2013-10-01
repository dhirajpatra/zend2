<?php
class Admin_Bootstrap extends Zend_Application_Module_Bootstrap
{
	/*protected function _initAppAutoload()
	 {
	$autoloader = new Zend_Application_Module_Autoloader(array(
			'namespace' => 'admin',
			'basePath' => APPLICATION_PATH . '/modules/admin/'
	));
	return $autoloader;
	}*/
	protected function _initDoctype() {
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
	}
}