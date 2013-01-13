<?php


class Application_Form_User extends Zend_Form
{
    public function init()
    {
        $this->setMethod('post');

		$this->setAction('user/userFunction');

		 $this->addElement('submit', 'resetHighscore', array(
				'ignore'   => true,
				'label'    => 'Reset Highscore',
				
			));
		 
		 $this->addElement('submit', 'deleteAccount', array(
		 		'ignore'   => true,
		 		'label'    => 'Delete Account',
		 
		 ));
	}
}