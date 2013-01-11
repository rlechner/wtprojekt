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

		if ($result->isValid()) {
		$this->_helper->FlashMessenger('Erfolgreich angemeldet');
		$this->redirect('/dictro/');
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
