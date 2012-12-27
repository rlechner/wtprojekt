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


}

