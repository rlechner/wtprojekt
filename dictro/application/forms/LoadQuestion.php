<?php


class Application_Form_LoadQuestion extends Zend_Form
{
    public function init()
    {
        $this->setMethod('post');
        
		$this->setAction('/game/checkanswer');

        $this->addElement('text', 'answer_user', array(
                'label' => 'Translate into German:',
                'required' => true,
                'filters'    => array('StringTrim'),
            ));
        
        $this->addElement('submit', 'answer_button', array(
            'ignore'   => true,
            'label'    => 'OK',
            ));
        
        $this->addElement('submit', 'quitgame_button', array(
        		'ignore'   => true,
        		'label'    => 'quit',
        ));

    }
}

?>