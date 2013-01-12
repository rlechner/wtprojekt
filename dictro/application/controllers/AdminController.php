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
		$result1 = "";
    	$result2 = "";
		
		if ($this->getRequest()->isPost()) {
    		$this->request = $this->getRequest();
			
			if (isset($_POST['submit'])){
    			$db = Zend_Registry::get('dbc');
    			$db->query('SET NAMES utf8;');
				
				if (! is_null($db)) {
					
					$stmt = $db->prepare(
		    						'SELECT
		                                		german, english
		                      		FROM
		                                		VOCABLE
					
		                     		WHERE 		german LIKE "' . $request->search_admin . '%";');
									
					$stmt->execute();
		    		$stmt->bind_result($result1, $result2);
					
					$ergebnis = array();
    				$i = 0;
					
					while($stmt->fetch()) {
    					$ergebnis[$i][0]=$result1;
    					$ergebnis[$i][1]=$result2;
    					$i++;
    				}
    				$stmt->close();
    	
    				$this->view->admin = $ergebnis;
				}
			}
		}
	}

	public function deletevocableAction(){
	}
	
	public function updatevocableAction(){
	}

	public function insertvocableAction(){
	}
}

