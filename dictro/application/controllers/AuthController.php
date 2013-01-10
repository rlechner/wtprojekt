<?php

<<<<<<< HEAD
	class AuthController extends Zend_Controller_Action
	{
		
		public function init(){
				
			/* Initialize action controller here */
				
		}
	
		public function indexAction(){
		/*	
			$db = Zend_Registry::get('dbc');
			
			$loginForm = new Application_Form_Login();
			
=======
class AuthController extends Zend_Controller_Action
{

public function init(){

/* Initialize action controller here */

}

	public function indexAction(){
/*
	$db = Zend_Registry::get('dbc');

	$loginForm = new Application_Form_Login();


		if ($loginForm->isValid()) {

		$adapter = new Zend_Auth_Adapter_DbTable(
		$db,
		'users',
		'name',
		'password'
		);

		$adapter->setIdentity($loginForm->getValue('name'));
		$adapter->setCredential($loginForm->getValue('password'));

		$result = $auth->authenticate($adapter);

		if ($result->isValid()) {
		$this->_helper->FlashMessenger('Erfolgreich angemeldet');
		$this->redirect('/');
		return;
		}

		}

	$this->view->loginForm = $loginForm;
*/
	}


>>>>>>> 5dc2cd5dde350f944ac9a725e1ad48e7af721e08

			if ($loginForm->isValid()) {
					
				$adapter = new Zend_Auth_Adapter_DbTable(
						$db,
						'users',
						'name',
						'password'
				);
					
				$adapter->setIdentity($loginForm->getValue('name'));
				$adapter->setCredential($loginForm->getValue('password'));
					
				$result = $auth->authenticate($adapter);
					
				if ($result->isValid()) {
					$this->_helper->FlashMessenger('Erfolgreich angemeldet');
					$this->redirect('/');
					return;
				}
					
			}
			
			$this->view->loginForm = $loginForm;
	*/	
		}
		
	
	
	
	}

}
