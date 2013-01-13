<?php

class UserController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
    		
   	}
   	public function userfunctionAction(){
   		
   		//$db	= Zend_Db_Table_Abstract::getDefaultAdapter();
   		$userForm = new Application_Form_User($_POST);
   		 
   		
   		if ($this->getRequest()->isPost()) {
   			$this->request = $this->getRequest();
   			if (isset($_POST['resetHighscore']) && $userForm->isValid($_POST)) {
   				 
   				$db = Zend_Registry::get('dbc');
   				$db->query('SET NAMES utf8;');
   				/*
   				 $adapter = new Zend_Auth_Adapter_DbTable(
   				 		$db,
   				 		'users',
   				 		'name',
   				 		'password'
   				 );
   				 
   				$adapter->setIdentity($registerForm->getValue('username'));
   				$adapter->setCredential($registerForm->getValue('passwor2'));
   				 
   				$result = $adapter->authenticate($adapter);
   				 
   				if (User nicht vorhanden) {
   				*/
   				//$values = $userForm->getValues();
   				
   				$session = new Zend_Session_Namespace('loggedin');
   				
   				//$session->loggedin_id;

   					$db->query('SET NAMES utf8;');
   					$stmt = $db->prepare  (
   									'DELETE		FROM	highscore
		
		                     		WHERE 		user_id = "' . $session->loggedin_id . '"');
   						
   					$stmt->execute();
   						
   					$success=1;
   						
   					$this->view->success = $success;
   						
   					//$this->redirect('index');
   						
   					//return;
   			}
   			
   		}

   		$this->view->userForm = $userForm;
	
   	} 
   

   	
}

