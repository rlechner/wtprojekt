<html>
	<head>
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

	
	<body style="background-color:#FFFF90";>
	
	<div id="container">
		<div id="header"><?php include("header.php");?></div>
		<br><br><br><br><br><br><br><br>
		<div id="menue" style="float:left"><?php include("menue.php");?></div>
		<div class="show_highscore" style="float: left; width: 450px; height: 50;">
				<p><span style="font-variant:normal">Highscore: $user_highscore</span><br>
		</div>
		<div class="resetbuttonright" style="float: right; width: 250px; text-align: right; height: 50px;">
				<input type="submit" value="Highscore reset">
				</div>
			
		<br><br>
		
		<div class="delt_user" style="float: left; width: 450px; height: 50;">
				<input type="submit" value="Delete Account?">
				</div>
		
		
	<div>
	
	<br>
	
	</body>
</html>