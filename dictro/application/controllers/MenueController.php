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
        

		$result1 = 1;


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

					//$db = Zend_Registry::get('dbc');
					$db->query('SET NAMES utf8;');
					$query = ('SELECT
		                                		userstate
		                      		FROM
		                                		USERS
					
		                     		WHERE 		name = "' . $loginForm->getValue('username') . '";');

					$stmt   = $db -> query($query);
					$result1 = $stmt -> fetch();

					$session = new Zend_Session_Namespace('loggedin');
					
					$session->loggedin = $result1['userstate'];

					echo "Anmeldung erfolgreich";
					
					//$vision=1;
						
					//$this->view->vision = $vision;
					
					$loginForm=null;
					
					//$this->view->loginForm = $loginForm;

					$this->redirect('index');
					
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
