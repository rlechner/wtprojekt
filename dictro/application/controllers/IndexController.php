<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
    }
	
	public function translateAction()
	{
		
		$mysqli = "SELECT * FROM dictro";
		$res = mysql_query($mysqli) or die (mysql_error());
		
		$this->view->res = $this->res;

			
	}

}

