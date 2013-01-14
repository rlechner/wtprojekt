<?php

class TranslationController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */

    }

    public function indexAction()
    {
    	$request = $this->getRequest();
    	$form = new Application_Form_Translate();
    	$result1 = "";
    	$result2 = "";
    	
    	if ($this->getRequest()->isPost()) {
    		$this->request = $this->getRequest();
    		if (isset($_POST['index']) && $form->isValid($this->request->getPost())) {
    			$db = Zend_Registry::get('dbc');
    			$db->query('SET NAMES utf8;');
    				
    			if (! is_null($db)) {
    				$values = $form->getValues();
    				// 					$translation = $db->query('SELECT german, english from vocable WHERE german LIKE "%' . $values['vocable'] . '%";');
    				// 					$wert = mysqli_fetch_assoc($translation);
    				if ($values['speech'] == 'deToen')
    					{
		    				$stmt = $db->prepare(
		    						'SELECT
		                                		german, english
		                      		FROM
		                                		VOCABLE
					
		                     		WHERE 		german LIKE "' . mysql_real_escape_string($values['vocable']) . '%";');
		    	
		    				$stmt->execute();
		    				$stmt->bind_result($result1, $result2);
							
							$language = 1;
    					}
    				else 
    					{
    						$stmt = $db->prepare(
    								'SELECT
	                                		english, german
	                      		FROM
	                                		VOCABLE
    					
	                     		WHERE 		english LIKE "' . mysql_real_escape_string($values['vocable']) . '%";');
    					
    						$stmt->execute();
    						$stmt->bind_result($result1, $result2);
							
							$language = 2;
    					}
    						
    				$ergebnis = array();
    				$i = 0;
    				// Array ausgeben
    				while($stmt->fetch()) {
    					$ergebnis[$i][0]=$result1;
    					$ergebnis[$i][1]=$result2;
    					$i++;
    				}
    				$stmt->close();
    	
    				$this->view->translation = $ergebnis;
					$this->view->language = $language;
    				//return $this->_helper->redirector('index');
    			}
    		}
    	}
    	$this->view->form = $form;
    }
 


}

