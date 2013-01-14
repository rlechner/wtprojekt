<?php

class GameController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */

    }

    public function indexAction()
    {     
    	
    	$session = new Zend_Session_Namespace('loggedin');
    	$this->view->user = $session->loggedin_user;
    	
    	$session = new Zend_Session_Namespace('game');
    	$session->level = 1;
    	$session->questioncount = 1;
    	$session->fails = 0;
    	$session->success = 0;
    	
    	if ($this->getRequest()->isPost()) {
    		if (isset($_POST['gamestart_button'])) {
	        	$this->redirect('/game/game');
	        	}
	        }
        	$formGameStart = new Application_Form_GameStart();
        	$this->view->formGameStart = $formGameStart;
    }
    
    
    public function gameAction(){
    	
    	$session = new Zend_Session_Namespace('game');

    	//Wenn quit Button gedrückt wird, starten der QuitMethode
    	if ($this->getRequest()->isPost()) {
    		if (isset($_POST['quitgame_button'])){
    			$this->quitgame();
    		}
    	}
    	//aktuelle Stats an View übergeben
    		$this->view->questioncount = $session->questioncount;
    		$this->view->level = $session->level;
    		$this->view->fails = $session->fails;
    		$this->view->points = $session->points;
    	
    		
    	// Lädt ein neues Frage-Antwort Pack
	    	// $questionpack[0] = question
	    	// $questionpack[1] = answer
    		$questionpack = $this->loadquestion();
    		
    		
    	//Frage laden und an View übergeben   	
    		$this->view->question = $questionpack;
    		
    		
    	//Zugehörige Antwort in Session-Variable '$session->answer' speichern	
    		$session->answer = $questionpack[0][1];
    		
    		
    	//Antwort-Form an View übergeben
	    	$formQuesten = new Application_Form_LoadQuestion();
	    	$this->view->formQuesten = $formQuesten;
    	
    }
	
	public function loadquestion()
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
								LIMIT 1');
				  
					$stmt->execute();
					$stmt->bind_result($question, $answer);

					$ergebnis = array();
					$i = 0;
					// Array ausgeben
					while($stmt->fetch()) {
						$ergebnis[$i][0]=$question;
						$ergebnis[$i][1]=$answer;
						$i++;
					}
					$stmt->close();
					 
					return $ergebnis;
					
				}							
		}
		
		//Wird ausgeführt wenn Answer-Button gedrückt wurde
		public function checkanswerAction(){
			
			//Wenn quit Button gedrückt wird, starten der QuitMethode
			if ($this->getRequest()->isPost()) {
				if (isset($_POST['quitgame_button'])){
					$this->quitgame();
				}
			}
			
			$session = new Zend_Session_Namespace('game');
			$this->view->questioncount = $session->questioncount;
			
			$formQuesten = new Application_Form_LoadQuestion();
				if ($this->getRequest()->isPost()) {
					if (isset($_POST['answer_button']) && $formQuesten->isValid($_POST)) {
						 
						$values = $formQuesten->getValues();
						 
						if($formQuesten->getValue('answer_user') == $session->answer){
							$session->points = $session->points + ($session->level * 10);
							$this->view->result = '<div id=goodjob><h1>GOOD JOB!</h1></div>';
							$this->view->reward = 'Reward: ' . ($session->level * 10) . ' <br> You have got';
							$this->view->reward2 = 'points now!';
						}
						else{
							++$session->fails;
							$this->view->result = '<div id=fail><h1>FAIL!</h1></div>';
							$this->view->reward = 'No Reward: <br> You still have got';
							$this->view->reward2 = 'points!';
						}
					}
					$session->questioncount = $session->questioncount + 1;
					
						if($session->questioncount >= 5){
							$session->level = $session->level + 1;
							$session->questioncount = 0;
						}
				}
			if ($session->fails >= 3){
				$this->redirect('/game/gameover');
			}
			
			// provide the reached stats to the view
			$this->view->level = $session->level;
			$this->view->points = $session->points;
			$this->view->fails = $session->fails;

		}
			
		public function gameoverAction(){
			
			$session = new Zend_Session_Namespace('loggedin');
			$userid = $session->loggedin_id;
			
			$session = new Zend_Session_Namespace('game');
			$points = $session->points;
			
			
				// provide the reached stats to the view
				$this->view->level = $session->level;
				$this->view->points = $session->points;
				$this->view->questioncount = $session->questioncount;
				$this->view->fails = $session->fails;
				
				//Ergebnis in den Highscore schreiben.
				$db = Zend_Registry::get('dbc');
				if (! is_null($db)) {

					$stmt = $db->prepare( '  INSERT INTO `highscore`(`user_id`, `score`)
                                            VALUES ("' . $userid . '",
                                                    "' . $points . '");
                                        ');
					 
					$stmt->execute();
				}
				//reset $session game variables
				$session->level = 1;
				$session->points = 0;
				$session->questioncount = 1;
				$session->fails = 0;
			
		}
		
		public function quitgame(){
			
			$session->level = 1;
			$session->points = 0;
			$session->questioncount = 1;
			$session->fails = 0;
			
			$this->redirect('/');
		}

}

