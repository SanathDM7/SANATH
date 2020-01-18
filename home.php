<html>
	<head>
		<style>
			.bg{
			background-image:url("imgs/homeimage.jpg");
			height:850px;
			background-position:center;
			background-repeat:no-repeat;
			background-size:cover;
		
		   }
			
			
			#title{
				background-color:transparent;
				font-size:24px;
				color:#E53935;
				color:black;
				margin-left:20px;
				
				}
				
			ul {
			list-style-type: none;
			margin: 0;
			padding: 0;
			overflow: hidden;
			background-color:transparent;
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
				font-size:30px;
				text-align: center;
				padding: 16px 20px;
				margin-top:10px;
				text-decoration: none;
				background-color: black;
			}

			li a:hover:not(.active) {
				background-color: #cccccc;
				color:black;
			}

			
			
			#home_img{
				padding-left:50px;
				padding-bottom:10px;
				
			}
			
			#bottom_posts{
				
				display: grid;
				grid-template-columns: auto auto auto;
				padding: 10px;
				margin-top:45%;
			
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
				margin-top:45%;
			
			}
			
		</style>
	</head>
	
	<body class="bg">
		
		<ul>
			<li id="titlehead"><p id="title"style="font-size:50px;" href="home.php">CRMS</p></li>
			<!-- <li><a href="about_us.php"><strong>About us</strong></a></li>
			<li><a href="admin_login.php"><strong>Admin</strong></a></li>
			<li><a href="officer_login.php"><strong>User</strong></a></li>
			<li><a href="home.php"><strong>Home</strong></a></li> -->
		</ul>
		<b style="margin-left:100;font-size:25"> Welcome to the "Criminal Record Management Sytstem"</b><br><br>
		<b style="margin-left:200;font-size:20">The system mainly aims to provide a simple, safe and efficient record</b><br><b style="margin-left:270;font-size:20"> management system.</b><br><br> <b style="margin-left:300;font-size:20">Login to continue.</b>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<li><a href="about_us.php" style="padding-left:30;padding-right:30"><strong>About</strong></a></li><br>
		<li><a href="admin_login.php" style="padding-left:30;padding-right:30"><strong>Admin</strong></a></li><br>
		<li><a href="officer_login.php" style="padding-left:50;padding-right:50"><strong>User</strong></a></li><br>
		
		
		
		
		<?php
		
		$servername = "localhost";
		$username = "root";
		$password = "";

		$conn = new mysqli($servername, $username, $password);
	
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		} 
		
		$sql = "CREATE DATABASE IF NOT EXISTS crimedb";
            if ($conn->query($sql) === TRUE) {
		$conn->close();
		}
		?>
		
	</body>
	
</html>
