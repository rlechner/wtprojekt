<?php


class Application_Form_GameStart extends Zend_Form
{
    public function init()
    {
        $this->setMethod('post');

		$this->setAction('/game');
        
        $this->addElement('submit', 'gamestart_button', array(
        		'ignore'   => true,
        		'label'    => 'Start',
        		//'label_class' => 'cssKlasseFuerDekorator',
        
        ));

    }
}

?>