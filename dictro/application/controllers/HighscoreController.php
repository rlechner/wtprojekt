<?php

class HighscoreController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
    	$request = $this->getRequest();
    	
    	$result1 = "";
    	$result2 = "";
    	 
    	if ($this->getRequest()->isPost()) {
    		$this->request = $this->getRequest();
    		if ($form->isValid($this->request->getPost())) {
    			$db = Zend_Registry::get('dbc');
    			$db->query('SET NAMES utf8;');
    	
    			if (! is_null($db)) {

    					$stmt = $db->prepare(
    							'SELECT
	                                		user_id, score
	                      		FROM
	                                		highscore
    	
	                     		ORDER BY 	score;');
    						
    					$stmt->execute();
    					$stmt->bind_result($result1, $result2);
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
    				 
    				$this->view->highscore = $ergebnis;
    				//return $this->_helper->redirector('index');
    			}
    		}
    	}
    	
    
	
    
    
    
	public function highscoreresetAction(){
	
	}


}

