<html>
	<head>
		<style>
			
			#title{
				background-color:Gray;
				font-size:24px;
				color:white;
				margin-left:20px;
				
				}
				
			ul {
			list-style-type: none;
			margin: 0;
			padding: 0;
			overflow: hidden;
			background-color: Gray;
			}
			
			li {
				float: right;
			}
			
			#titlehead{
				float: left;
			}

			li a {
				display: block;
				color: white;
				font-size:20px;
				text-align: center;
				padding: 16px 20px;
				margin-top:10px;
				text-decoration: none;
			}

			li a:hover:not(.active) {
				background-color: #cccccc;
			}
			
			#home_img{
				padding-left:50px;
				padding-bottom:10px;
				
			}
			
			#bottom_posts{
				
				display: grid;
				grid-template-columns: auto auto auto;
				padding: 10px;
			
			}
			
			#img_title{
				
				display: grid;
				grid-template-columns: auto auto auto;
				padding: 10px;
			
			}
			
			#posts{
				padding: 20px;
				font-size: 30px;
				text-align: center;
			
			}
			#card{
				background-color:#FFFFEF;
				margin:150px;
				height:150px:
				border-radius:5px;
				box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
				text-align:center;
				font-size:24px;
				padding:25px;
				border-collapse:collapse;
				margin-top:75px;
				margin-left:500px;
				
			}
			
			#done{
				background-color: #00b300;
				color: white;
				padding: 12px 20px;
				border: none;
				border-radius: 4px;
				cursor: pointer;
			
			}
			
			table,td,th
			{
				margin-left:10px;
				border:1px #EEEEEE;
				align:center;
				font-size:18px;
				text-align:center;
				
				padding-left:35px;
				padding-right:35px;
				padding-top:15px;
				padding-bottom:15px;
			}
			table{margin:auto;}
			

			
		</style>
	</head>
	
	<body>
		
	
		
		<ul>
			<li id="titlehead"style="text-decoration: underline;text-decoration-color:white;"><p id="title" style="font-size:30px;"><a href="search_home.php">Search Home</a></p></li>
			<li><a href="about_us.php">About us</a></li>
			<li><a href="admin_login.php">Admin</a></li>
			<li><a href="officer_login.php">User</a></li>
			<li><a href="home.php">Home</a></li>
		</ul>
	
		<h2 style="font-style:italic; font-size:30px;padding-left:30px;">Case Details</h2>

<?php
		error_reporting(0);
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname ="crimedb";

		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		} 
		
		$caserecordid = filter_input(INPUT_GET,'caserecordid');
		
		$sql = "SELECT cd.case_date,cr.case_id,cr.criminal_name,crr.crime_name FROM criminal_record cr,crime_record crr,casee cd WHERE cd.case_id=cr.case_id and cr.case_id='$caserecordid' and crr.crime_id=cr.crime_id";
		$result = $conn->query($sql);
		
		
		echo "<table id='card' border='2'>";
	
		if ($result->num_rows > 0) {
			
			while($row = $result->fetch_assoc()) {
				
				
				echo "<tr><td>case_id: </td><td>".$row['case_id']."</td></tr>";
				echo "<tr><td>criminal name: </td><td>".$row['criminal_name']."</td></tr>";
                echo "<tr><td>crime committed: </td><td>".$row['crime_name']."</td></tr>";
 			echo "<tr><td>case registered at: </td><td>".$row['case_date']."</td></tr>";
				
				
			}
		} 
		
		
		
		else {
			echo "<div id='card'><p>Record not Exist</p><form action='case_search.php' method='get'><button type='submit' id='done'>Done</button></form></div>";
		
		}
		
		
		
		?>
		
</body>
	
	
	


</html>