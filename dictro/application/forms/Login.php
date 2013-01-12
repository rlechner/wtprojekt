<?php


class Application_Form_DeleteVocable extends Zend_Form
{
    public function init()
    {
        $this->setMethod('post');

		$this->setAction('index');

        $this->addElement('text', 'vocable', array(
                'label' => 'Vocable:',
                'required' => true,
                'filters'    => array('StringTrim'),
            ));       
	
        $this->addElement('submit', 'submit', array(
            'ignore'   => true,
            'label'    => 'Search',
        	//'label_class' => 'cssKlasseFuerDekorator',
        
            ));
        
        $this->addElement('submit', 'submit', array(
        		'ignore'   => true,
        		'label'    => 'Delete',
        		//'label_class' => 'cssKlasseFuerDekorator',
        
        ));

    }
}

?>