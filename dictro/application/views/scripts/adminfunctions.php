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
		<div class="search_textfield" style="float: left; width: 450px; height: 50;">
		<form method="get" action="search_admin.php">
				<input type="text" name="search_admin"> 
				<input type="submit" value="search">
		</form> </div>
		<div class="searchbuttonright" style="float: right; width: 250px; text-align: right; height: 50px;">
				<input type="submit" value="Delete">
				<input type="submit" value="Update">
				</div>
	
	<br><br>
	
	<div class="table">
		
			<table border=1>
            <tr>
                 <th width="200">German</th>
                 <th width="200">English</th>
                 <th width="200">Level</th>
            </tr>
            <tr>
                <td width="200">test</td>
                <td width="200">test</td>
                <td width="200">test</td>
            </tr>
			</table>
		
	</div>
	<br><br>
	<div class="insert_textfields">
		<form method="get" action="search_admin.php">
				<input type="text" name="german_voc"> 
				<input type="text" name="english_voc">
				<input type="text" name="level_voc">
		</form>
	</div>
	
	<br>
	<div class="searchbuttonright" style="float: right; width: 250px; text-align: right; height: 50px;">
		<input type="submit" value="Insert">
	</div>
	
	
	</body>
</html>