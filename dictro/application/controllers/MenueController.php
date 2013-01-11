<?php

class MenueController extends Zend_Controller_Action
{
	
			
	public function init()
	{
	/* Initialize action controller here */
	}

    public function indexAction()
    {
        // action body
    	require_once 'Zend/Session/Namespace.php';
        
		$db	= Zend_Db_Table_Abstract::getDefaultAdapter();

		$loginForm = new Application_Form_Login($_POST);
		

		if ($this->getRequest()->isPost()) {
			$this->request = $this->getRequest();
			if (isset($_POST['submit']) && $loginForm->isValid($_POST)) {
	
			$adapter = new Zend_Auth_Adapter_DbTable(
			$db,
			'users',
			'name',
			'password'
			);
	
			$adapter->setIdentity($loginForm->getValue('username'));
			$adapter->setCredential($loginForm->getValue('password'));
	
			$result = $adapter->authenticate($adapter);
	
	
				if ($result->isValid()) {
					
					//new Zend_Session_Namespace();
					
					//$this->_helper->FlashMessenger('Erfolgreich angemeldet');
					
					//var_dump ($result);

					new Zend_Session_Namespace($loginForm->getValue('username'));

					echo "Anmeldung erfolgreich";
					
					$vision=1;
						
					$this->view->vision = $vision;
					
					$loginForm=null;
					
					//$this->view->loginForm = $loginForm;

					//$this->redirect('index');
					
					//Zend_Session::start();
					//new Zend_Session_Namespace();
					//session_start();
					
					return;
				}
				else {
					
					echo "Wrong Username or Password";
					
				}
			}
		}
		
	$this->view->loginForm = $loginForm;
	
	}

}





?>
