<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="de">
	<head>
		
		<meta http-equiv="content-type" content="text/html;charset=ISO-8859-15" />
		<meta http-equiv="Content-Style-Type" content="text/css" />
	
	<style>
		
	</style>
	</head>
	
	
	<body>
	
	
		<?php
		require_once ('connection.php');
		session_start();
		?>
		
		<?php
		$link = mysql_connect($host, $user, $pass) or die ("Keine Verbindung zu der Datenbank m�glich.");
		mysql_select_db($db) or die ("Fehler bei select_db: ".mysql_error());
		
		

		if ( $link )
		{
			echo 'Verbindung erfolgreich: ';
			echo $link;
		}
		else
		{
			// hier sollte dann sp�ter dem Programmierer eine
			// E-Mail mit dem Problem zukommen gelassen werden
			die('keine Verbindung m�glich: ' . mysql_error());
		}
		
		
		?>

		<div  style="background-color:#FF2222";>
		
			<form method="get" action="translate.php">
				<input type="text" name="search"> 
				<input type="submit" value="uebersetzten">
			</form> 

						

			<?php
				//$translate = $search;
				//echo "$translate";
			?> 
=======




			<?php
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
			?> 
		
		
		</div>
		
	</body>
</html>