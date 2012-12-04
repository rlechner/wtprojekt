
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
		<div id ="translate"  style="float:right"><?php include ("translate.php");?></div>
		
		
	<div>
	
	<br>
	</body>
</html>