<?php

class MenueController extends Zend_Controller_Action
{

<<<<<<< HEAD
	public function init()
	{
	/* Initialize action controller here */
	}
	
	public function indexAction()
	{
		// action body
		
		$db = Zend_Db_Table_Abstract::getDefaultAdapter();
		
		$loginForm = new Application_Form_Login($_POST);
		
		if ($this->getRequest()->isPost()) {
		$this->request = $this->getRequest();
		if ($loginForm->isValid($this->request->getPost())) {
		
		$adapter = new Zend_Auth_Adapter_DbTable(
													$db,
													'users',
													'name',
													'password'
												);
		
		$adapter->setIdentity($loginForm->getValue('username'));
		$adapter->setCredential($loginForm->getValue('password'));
		
		$result = $adapter->authenticate($adapter);
		
=======
    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
	
		 $db	= Zend_Db_Table_Abstract::getDefaultAdapter();

		$loginForm = new Application_Form_Login($_POST);

	if ($this->getRequest()->isPost()) {
		$this->request = $this->getRequest();
		if ($loginForm->isValid($this->request->getPost())) {

		$adapter = new Zend_Auth_Adapter_DbTable(
		$db,
		'users',
		'name',
		'password'
		);

		$adapter->setIdentity($loginForm->getValue('username'));
		$adapter->setCredential($loginForm->getValue('password'));

		$result = $adapter->authenticate($adapter);

>>>>>>> 5dc2cd5dde350f944ac9a725e1ad48e7af721e08
		if ($result->isValid()) {
		$this->_helper->FlashMessenger('Erfolgreich angemeldet');
		$this->redirect('/dictro/');
		return;
		}
		else {
<<<<<<< HEAD
		echo "Wrong Username or Password";
		
		}
	}
	
	
	}
	$this->view->loginForm = $loginForm;
	
	}

}
?>
=======
            	echo "Wrong Username or Password"; 
				
            }
		} 

		
	}
	$this->view->loginForm = $loginForm;

    }


}
?>
>>>>>>> 5dc2cd5dde350f944ac9a725e1ad48e7af721e08
