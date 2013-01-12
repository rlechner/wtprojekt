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
		
		
		$request = $this->getRequest();
		$formSearch = new Application_Form_SearchVocableAdmin();
		$result1 = "";
		$result2 = "";
		$result3 = "";
		 
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
		                                		voc_id, german, english
		                      		FROM
		                                		VOCABLE
					
		                     		WHERE 		german LIKE "' . $values['search_voc'] . '%";');
		    	
		    				$stmt->execute();
					$stmt->bind_result($result1, $result2, $result3);
		
					$ergebnis = array();
					$i = 0;
					// Array ausgeben
					while($stmt->fetch()) {
						$ergebnis[$i][0]=$result1;
						$ergebnis[$i][1]=$result2;
						$ergebnis[$i][2]=$result3;
						$i++;
					}
					$stmt->close();
					 
					$this->view->admin = $ergebnis;
					//return $this->_helper->redirector('index');
				}
			}
		}
		 
		$this->view->formSearch = $formSearch;
		
		$formDelete = new Application_Form_DeleteVocableAdmin();
		
		if ($this->getRequest()->isPost()) {
			$this->request = $this->getRequest();
			if (isset($_POST['delete_button']) && $formDelete->isValid($this->request->getPost())) {
				$db = Zend_Registry::get('dbc');
				if (! is_null($db)) {
					$values = $formDelete->getValues();
		
					$stmt = $db->prepare(
		    						'DELETE
		                                		*
		                      		FROM
		                                		VOCABLE
					
		                     		WHERE 		voc_id = "' . $values['voc_ID'] . '";');
		    	
		    				$stmt->execute();
		
					$this->view->deleteerfolgreich = 'Vocable: "' .  $values['voc_ID'] . '" successful deleted';
					/*
					 }
					else {
		
		
					echo "Registrierung failed";
		
					}*/
		
				}
			}
		}
		$this->view->formDelete = $formDelete;
		
	}
	
	public function updatevocableAction(){
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
		                                		voc_id,german, english, level
		                      		FROM
		                                		VOCABLE
					
		                     		WHERE 		german LIKE "' . $values['search_voc'] . '%";');
		    	
		    				$stmt->execute();
		    				$stmt->bind_result($result1, $result2, $result3, $result4);
    				
    				$ergebnis = array();
    				$i = 0;
    				// Array ausgeben
    				while($stmt->fetch()) {
    					$ergebnis[$i][0]=$result1;
    					$ergebnis[$i][1]=$result2;
						$ergebnis[$i][2]=$result3;
						$ergebnis[$i][3]=$result4;
    					$i++;
    				}
    				$stmt->close();
    	
    				$this->view->admin = $ergebnis;
					
    				//return $this->_helper->redirector('index');
    			}
    		}
    	}
		
		$this->view->formSearch = $formSearch;
		
		$formUpdate = new Application_Form_UpdateVocableAdmin();
		
		if ($this->getRequest()->isPost()) {
			$this->request = $this->getRequest();
			if (isset($_POST['update_button']) && $formUpdate->isValid($this->request->getPost())) {
				 $db = Zend_Registry::get('dbc');
				 if (! is_null($db)) {
    				$values = $formUpdate->getValues();
  
                   $stmt = $db->prepare( '  UPDATE`vocable` 
                                            SET german = "' . $values['german_voc'] . '",
												english = "' . $values['english_voc'] . '",
												level = "' . $values['level'] . '"
											WHERE voc_id = "' . $values['voc_id'] . '"
                                        ');
                       
                    $stmt->execute();
                
				$this->view->updateerfolgreich = 'Vocable: "' .  $values['german_voc'] . '" successful updated';
                /*        
                }
                else {
                    
                    
                    echo "Registrierung failed";
                        
                }*/
				
				}
            }
        }
		$this->view->formUpdate = $formUpdate;
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
    	
		$this->view->formSearch = $formSearch;
		
		$formInsert = new Application_Form_InsertVocableAdmin();
		
		if ($this->getRequest()->isPost()) {
			$this->request = $this->getRequest();
			if (isset($_POST['insert_button']) && $formInsert->isValid($this->request->getPost())) {
				 $db = Zend_Registry::get('dbc');
				 if (! is_null($db)) {
    				$values = $formInsert->getValues();
  
                   $stmt = $db->prepare( '  INSERT INTO `vocable`(`german`, `english`, `level`) 
                                            VALUES ("' . $values['german_voc'] . '",
                                                    "' . $values['english_voc'] . '", 
													"' . $values['level'] . '");  
                                        ');
                       
                    $stmt->execute();
                
				$this->view->inserterfolgreich = 'Vocable: "' .  $values['german_voc'] . '" successful added';
                /*        
                }
                else {
                    
                    
                    echo "Registrierung failed";
                        
                }*/
				
				}
            }
        }
		$this->view->formInsert = $formInsert;
	}
	
}

