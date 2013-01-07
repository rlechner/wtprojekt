<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
	
	protected function _bootstrap($resource = null)
	{
		require_once "DBSettings.php";
		require_once "Zend/Registry.php";
	
		parent::_bootstrap($resource);
		
		$mysqli = new mysqli(DBSettings::HOST, DBSettings::USER, DBSettings::PASSWD, DBSettings::SCHEMA);
			
		if (!$mysqli) {
			printf("Connect failed: %s\n", mysqli_connect_error());
			exit();
		}

		//DB SELECT
		/*
		$db_selected = mysql_select_db(DBSettings::SCHEMA);
		if (!$db_selected) {
			die ("Kann die Datenbank nicht benutzen : " .mysql_error());
		}
		*/
		
		$mysqli->set_charset('utf8');
		Zend_Registry::set('dbc', $mysqli);
	
	
			if ( $mysqli )
			{
// 				echo 'Verbindung erfolgreich: ';

			}
			else
			{
				// hier sollte dann sp�ter dem Programmierer eine
				// E-Mail mit dem Problem zukommen gelassen werden
				die('keine Verbindung m�glich: ' . mysql_error());
			}

	}
		
	protected function _initDoctype()
	{
		$this->bootstrap('view');
		$view = $this->getResource('view');
		$view->doctype('HTML4_STRICT');
	}
	
	
	
}





