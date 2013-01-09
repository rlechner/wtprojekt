<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
	
	protected function _bootstrap($resource = null)
	{
		require_once "DBSettings.php";
		require_once "Zend/Registry.php";
		require_once 'Zend/Db.php';
		require_once 'Zend/Db/Table.php';
		require_once 'Zend/Debug.php';
		require_once '../application/models/VocableModel.php';
		
		parent::_bootstrap($resource);
		

		require_once "Zend/Loader.php";
		
		//-- Set up Autoload
		Zend_Loader_Autoloader::registerAutoload();
		
		
		$mysqli = new mysqli(DBSettings::HOST, DBSettings::USER, DBSettings::PASSWD, DBSettings::SCHEMA);
			
		if (!$mysqli) {
			printf("Connect failed: %s\n", mysqli_connect_error());
			exit();
		}
		
		$mysqli->set_charset('utf8');
		Zend_Registry::set('dbc', $mysqli);
	

		$params = array ('host'     => DBSettings::HOST,
						'username' => DBSettings::USER,
						'password' => DBSettings::PASSWD,
						'dbname'   => DBSettings::SCHEMA);
				
		$db = Zend_Db::factory('PDO_MYSQL', $params);
		Zend_Db_Table::setDefaultAdapter($db);

	}
		
	protected function _initDoctype()
	{
		$this->bootstrap('view');
		$view = $this->getResource('view');
		$view->doctype('HTML4_STRICT');
	}
	
	
	
}





