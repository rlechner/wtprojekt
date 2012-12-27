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
<<<<<<< HEAD
		
		$mysqli = "SELECT * FROM dictro";
		$res = mysql_query($mysqli) or die (mysql_error());
		
		$this->view->res = $this->res;
=======

			$sql = "SELECT * FROM tabelle1";
			$res = mysql_query($sql) or die(mysql_error());
			echo "<table>\n";
			while(($obj = mysql_fetch_object($res)) != NULL){
			echo "<tr><td>$obj->A</td>";
				if (($obj = mysql_fetch_object($res)) != NULL){
					  echo "<td>$obj->B</td></tr>\n";
				}
				else{
					  echo "<td>&nbsp</td></tr>\n";
				}
			}
			"</table>\n";
	
			
	}
>>>>>>> d708f3a6e3d4eec26671e410756a34006f4d4c04

			
	}

}

