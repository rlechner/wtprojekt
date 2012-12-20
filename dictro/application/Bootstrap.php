<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
	
	protected function _bootstrap($resource = null)
	{
		require_once "DBSettings.php";
	
		parent::_bootstrap($resource);
		$mysqli = new mysqli(DBSettings::HOST, DBSettings::USER, DBSettings::PASSWD, DBSettings::SCHEMA);
			
		if (mysqli_connect_errno()) {
			printf("Connect failed: %s\n", mysqli_connect_error());
			exit();}
				
			$mysqli->set_charset('utf8');
			Zend_Registry::set('dbc', $mysqli);
	
	
			if ( $mysqli )
			{
				echo 'Verbindung erfolgreich: ';
				
			}
			else
			{
				// hier sollte dann später dem Programmierer eine
				// E-Mail mit dem Problem zukommen gelassen werden
				die('keine Verbindung möglich: ' . mysql_error());
			}
		}
		
	protected function _initDoctype()
	{
		$this->bootstrap('view');
		$view = $this->getResource('view');
		$view->doctype('HTML4_STRICT');
	}

}

