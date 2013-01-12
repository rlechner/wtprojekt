<?php


class Application_Form_Search_Vocable_Admin extends Zend_Form
{
    public function init()
    {
        $this->setMethod('post');

		$this->setAction('searchvocable');

        $this->addElement('text', 'search_voc', array(
                'required' => true,
                'filters'    => array('StringTrim'),
            ));
			
		 $this->addElement('submit', 'submit', array(
				'ignore'   => true,
				'label'    => 'Search',
				
			));

    }
}

?>