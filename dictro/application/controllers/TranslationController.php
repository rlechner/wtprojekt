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
		$german = "";
		$english = "";
		
		if ($this->getRequest()->isPost()) {
			$this->request = $this->getRequest();
			$x = $this->request->getParam('vocable');
			var_dump($x);
			if ($form->isValid($this->request->getPost())) {
				$db = Zend_Registry::get('dbc');
			
				if (! is_null($db)) {
					$values = $form->getValues();
// 					$translation = $db->query('SELECT german, english from vocable WHERE german LIKE "%' . $values['vocable'] . '%";');
// 					$wert = mysqli_fetch_assoc($translation);

					$stmt = $db->prepare(
							'SELECT
                                		german, english
                      		FROM
                                		VOCABLE
					
                     		WHERE 		german LIKE "%' . $values['vocable'] . '%";');
						
					$stmt->execute();
					$stmt->bind_result($german, $english);
					
					$ergebnis = array();
					$i = 0;
					// Array ausgeben
					while($stmt->fetch()) {
						$ergebnis[$i][0]=$german;
						$ergebnis[$i][1]=$english;
						$i++;
					}
					$stmt->close(); 

					$this->view->translation = $ergebnis;
					//return $this->_helper->redirector('index');
					}
			}
		}
		$this->view->form = $form;
		
    }
    

}

