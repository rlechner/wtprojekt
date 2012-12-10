

<html>
	<head>
	
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	
	<style>
	
	
	
	* {
	margin:5;
	padding:0;
	
	}

	body {
	text-align:center; /* horizontal centering for IE Win quirks */
	}

	#container {
	top: 0px;
	margin:0 auto;
	position:relative; /* puts container in front of distance */
	text-align:left;
	height:1024px;
	width:1024px;
	clear:left;
	background-color:#FFFF30;
	
	}
	
	#translate {
    float: right;
    height: 500px;
    width: 750px;
	}
	
	</style>
	</head>

	
	
	

	
	
	<div id="container">
	
		<div id="header"><?php include("header.php");?></div>
		
		<br><br><br><br><br><br><br><br>
		
		<div id="menue" style="float:left"><?php include("menue.php");?></div>
		
		<div class="contact"  style="float:right; height:500px; width: 750px">
			
			<center><h1>Kontakt</h1></center>
			<br>
			<div id="blubb">
				<form action="email.php" method="POST">
					
					
						<div class="form" style="float:right; width:600px">
						<dl>
							<dt>Name:</dt>
							<dd><input type="text" name="Versender" /></dd>
							<dt>E-Mail:</dt>
							<dd><input type="text" name="E-Mail" /></dd>
							<dt>Betreff:</dt>
							<dd><input type="text" name="Betreff" /></dd>
							<dt>Bemerkungen:</dt>
							<dd><textarea name="Bemerkungen" rows="10" cols="50"></textarea></dd>
						</dl>
						
						<div class="send" style="float:right; width:330px">
						<input type="submit" value="Senden" />
						<input type="reset" value="Zurücksetzen" />
					 
						</div>
					</div>
			
				</form>
				
				

				
				
			</div>
			
		</div>
		
		
		

		
	<div>
	
	<br>
	</body>
	
