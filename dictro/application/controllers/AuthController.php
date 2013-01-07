<?php

class AuthController extends Zend_Controller_Action
{
 
    public function loginAction()
    {
        $db = $this->_getParam('db');
 
        $loginForm = new Application_forms_Auth_Login($_POST);
 
        if ($loginForm->isValid()) {
 
            $adapter = new Zend_Auth_Adapter_DbTable(
                $db,
                'users',
                'name',
                'password'
                );
 
            $adapter->setIdentity($loginForm->getValue('username'));
            $adapter->setCredential($loginForm->getValue('password'));
 
            $result = $auth->authenticate($adapter);
 
            if ($result->isValid()) {
                $this->_helper->FlashMessenger('Erfolgreich angemeldet');
                $this->redirect('/');
                return;
            }
 
        }
 
        $this->view->loginForm = $loginForm;
 
    }
 
    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
		
    }
  
	
}

?>



