<?php

class RegistrationController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
        
    }
    
    public function registerAction()
    {
    	$db	= Zend_Db_Table_Abstract::getDefaultAdapter();
    	
    	$registerForm = new Application_Form_Registration($_POST);
    	
    	$this->view->registerForm = $registerForm;
    		
  	}


}

