<?php

class AdminController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
    }
	
	public function searchvocableAction(){
		
		$request = $this->getRequest();
		$form = 
		$result1 = "";
    	$result2 = "";
		
		if ($this->getRequest()->isPost()) {
    		$this->request = $this->getRequest();
			
			if (isset($_POST['index']) && $form->isValid($this->request->getPost())) {
    			$db = Zend_Registry::get('dbc');
    			$db->query('SET NAMES utf8;');
				
				if (! is_null($db)) {
    				$values = $form->getValues();
	}

	public function deletevocableAction(){
	}
	
	public function updatevocableAction(){
	}

	public function insertvocableAction(){
	}
}

