<<<<<<< HEAD


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
	
=======
<html>
<head>
</head>
<body>
<table width="100%" border="0" cellspacing="0" cellpadding="2" bgcolor="$border">
  <tr bgcolor="green">
    <td class="title">Contact</td>
  </tr>
  <tr><td bgcolor="green"></td></tr>
  <tr bgcolor="green">
    <td>
    <table width="100%" border="0" cellspacing="0" cellpadding="2">
      <tr>
               <div align="center">
        </div>
        <form action="index.php?site=contact" method="post">
        <input type="hidden" name="action" value="send" />
        <table width="75%" border="0" cellspacing="0" cellpadding="2" align="center">
          <tr>
            <td>Name</td>
            <td><input name="name" value="$name" size="40" /></td>
          </tr>
          <tr>
            <td>Email</td>
            <td><input name="from" value="$from" size="40" /></td>
          </tr>
          <tr>
            <td>Subject</td>
            <td><input name="subject" value="$subject" size="40" /></td>
          </tr>
          <tr>
            <td>Message</td>
            <td><textarea name="text" cols="50" rows="6" style="width:99%;">$text</textarea></td>
      
           </tr>
          <tr>
            <td><center><input type="submit" value="Send" /></center></td>
          </tr>
        </table>
        </form>
        </td>
      </tr>
    </table>
    </td>
  </tr>
</table>

</body>

>>>>>>> 6f6f55a882e0bb2592c0a1d2a64cee1c1b9ba667
</html>