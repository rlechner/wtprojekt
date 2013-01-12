<?php

class AdminController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
    
    }
	
	public function searchvocableAction(){
	
	}

	public function deletevocableAction(){
	}
	
	public function updatevocableAction(){
	}

	public function insertvocableAction(){
		
		$request = $this->getRequest();
    	$formSearch = new Application_Form_SearchVocableAdmin();
    	$result1 = "";
    	$result2 = "";
    	
    	if ($this->getRequest()->isPost()) {
			$this->request = $this->getRequest();
			if (isset($_POST['search_button']) && $formSearch->isValid($this->request->getPost())) {
    			$db = Zend_Registry::get('dbc');
    			$db->query('SET NAMES utf8;');
    				
    			if (! is_null($db)) {
    				$values = $formSearch->getValues();
    				// 					$translation = $db->query('SELECT german, english from vocable WHERE german LIKE "%' . $values['vocable'] . '%";');
    				// 					$wert = mysqli_fetch_assoc($translation);
					$stmt = $db->prepare(
		    						'SELECT
		                                		german, english,
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
    	
		$this->view->formSearch = $formSearch;
		
		$formInsert = new Application_Form_InsertVocableAdmin();
		
		$this->view->formInsert = $formInsert;
	}
	
}

