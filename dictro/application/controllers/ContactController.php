<?php

class ContactController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $form = new Application_Form_Contact();
        
        $request = $this->getRequest();
        $post = $request->getPost(); 

        
        if ($request->isPost()) {
            
            if ($form->isValid($post)) {
                
                $message = 'From: ' .  mysql_real_escape_string($post['name']) . chr(10) . 'Email: ' .  mysql_real_escape_string($post['email']) . chr(10);
                $message .= 'Message: ' .  mysql_real_escape_string($post['message']);
				$headers = 'From: contact@dictro.com' . "\r\n" .
							'Reply-To: webmaster@dictro.com' . "\r\n" .
							'X-Mailer: PHP/' . phpversion();
                
                mail('gumberger.robert@googlemail.com', 'contact: ' .  mysql_real_escape_string($post['subject']), $message, $headers);
            }
        }
        
        $this->view->form = $form;
    }

}

