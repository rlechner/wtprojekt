<?php

class HighscoreController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
    	
    	$result1 = "";
    	$result2 = "";
    	 

    			$db = Zend_Registry::get('dbc');
    			$db->query('SET NAMES utf8;');
    	
    			if (! is_null($db)) {

    					$stmt = $db->prepare(
    							'SELECT
	                                		name, score
	                      		FROM
	                                		highscore, users
    							WHERE
    										users.user_id = highscore.user_id
	                     		ORDER BY 	
    										score DESC;');
    						
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
    		
    	
    	
    
	
    
    
    
	public function highscoreresetAction(){
	
	}


}

