<?php

class GameController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    	$session = new Zend_Session_Namespace('game');
    	
    	$session->level = 1;
    	$session->questioncount = 1;
    }

    public function indexAction()
    {     
    	$session = new Zend_Session_Namespace('loggedin');
    	$this->view->user = $session->loggedin_user;
    	
	        if ($this->getRequest()->isPost()) {
	        	$this->request = $this->getRequest();
	        	if (isset($_POST['gamestart_button'])) {
	        		$this->view->question = $this->loadquestionAction();
	        	}
        	}
        	
        	$formGameStart = new Application_Form_GameStart();
        	$this->view->formGameStart = $formGameStart;
    }
	
	public function loadquestionAction()
	{
		$session = new Zend_Session_Namespace('game');
		$question = "";
		$answer = "";
		mb_regex_encoding('UTF-8');
		mb_internal_encoding("UTF-8");


				$db = Zend_Registry::get('dbc');
				$db->query('SET NAMES utf8;');
		
				if (! is_null($db)) {

					$stmt = $db->prepare(
								'SELECT german, english FROM vocable
								WHERE (level = "' . $session->level . '")
								ORDER BY RAND()
								LIMIT 5');
				  
					$stmt->execute();
					$stmt->bind_result($question, $answer);
		
					$ergebnis = array();
					$i = 0;
					// Array ausgeben
					while($stmt->fetch()) {
						$ergebnis[$i][0] = mb_split(' ', $question);
						$ergebnis[$i][1]= mb_split(' ', $answer);
						$i++;
					}
					$stmt->close();
					 
					return($ergebnis);
					//return $this->_helper->redirector('index');
				}	
	
	}


}

