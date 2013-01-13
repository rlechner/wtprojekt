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
                
                $message = 'From: ' . $post['name'] . chr(10) . 'Email: ' . $post['email'] . chr(10);
                $message .= 'Message: ' . $post['message'];
				$headers = 'From: contact@dictro.com' . "\r\n" .
							'Reply-To: webmaster@dictro.com' . "\r\n" .
							'X-Mailer: PHP/' . phpversion();
                
                mail('gumberger.robert@googlemail.com', 'contact: ' . $post['subject'], $message, $headers);
            }
        }
        
        $this->view->form = $form;
    }

}

