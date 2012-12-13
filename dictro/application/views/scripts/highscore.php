<html>
	<head><style>	* {
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
	}</style>	</head>

	
	<body style="background-color:#FFFF90";>
	
	<div id="container">
	
	
		<div id="header"><?php include("header.php");?></div>
		
		<br><br><br><br><br><br><br><br>
		
		<div id="menue" style="float:left"><?php include("menue.php");?></div>
		
	
	<br><br>
	
	<div class="table" style="float:right; height:500px; width: 750px">
		
			<center><h1>Highscore</h1></center>
			<br>
			<center>
			<table border=1>
            <tr>
                 <th width="200">User</th>
                 <th width="200">Score</th>
                 
            </tr>
			<tr>
                <td width="200"><center>Maier, Franzl</center></td>
                <td width="200"><center>2000</center></td>
               
            </tr>
			</table>
			</center>
		
	</div>
	<br><br>	
	<br>

	
	
	</body>
</html>