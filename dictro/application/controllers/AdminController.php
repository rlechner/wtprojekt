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
    	$form = new Application_Form_Search_Vocable_Admin($_POST);
    	$result1 = "";
    	$result2 = "";
    	
    	if ($this->getRequest()->isPost()) {
			$this->request = $this->getRequest();
			if (isset($_POST['submit']) && $form->isValid($_POST)) {
    			$db = Zend_Registry::get('dbc');
    			$db->query('SET NAMES utf8;');
    				
    			if (! is_null($db)) {
    				$values = $form->getValues();
    				// 					$translation = $db->query('SELECT german, english from vocable WHERE german LIKE "%' . $values['vocable'] . '%";');
    				// 					$wert = mysqli_fetch_assoc($translation);
					$stmt = $db->prepare(
		    						'SELECT
		                                		german, english
		                      		FROM
		                                		VOCABLE
					
		                     		WHERE 		german LIKE "' . $values['search_voc'] . '%";');
		    	
		    				$stmt->execute();
		    				$stmt->bind_result($result1, $result2);
    				
    				$ergebnis = array();
    				$i = 0;
    				// Array ausgeben
    				while($stmt->fetch()) {
    					$ergebnis[$i][0]=$result1;
    					$ergebnis[$i][1]=$result2;
    					$i++;
    				}
    				$stmt->close();
    	
    				$this->view->admin = $ergebnis;
    				//return $this->_helper->redirector('index');
    			}
    		}
    	}
    	$this->view->form = $form;
    }

	public function deletevocableAction(){
	}
	
	public function updatevocableAction(){
	}

	public function insertvocableAction(){
	}
}

