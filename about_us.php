<html>
	<head>
		<style>
			.bg{
			background-image:url("imgs/homeimage.jpg");
			height:1000px;
			background-position:center;
			background-repeat:no-repeat;
			background-size:cover;
			
		   }
			#title{
				background-color:transparent;
				font-size:24px;
                font
				color:#E53935;
				
				color:white;
				margin-left:20px;
				
				}
				
			ul {
			list-style-type: none;
			margin: 0;
			padding: 0;
			overflow: hidden;
			background-color: transparent;
			}
			
			li {
				float: right;
			}
			
			#titlehead{
				float: left;
			}

			li a {
				display: block;
				color: black;
				font-size:20px;
				text-align: center;
				padding: 16px 20px;
				margin-top:10px;
				text-decoration: none;
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
            #f{
                
                color: white;
                font-size: 30px;
                font-style: italic;
                
            
            }
			
		</style>
	</head>
	
	<body>
		
		<div class="bg">
		
		<ul>
			<li id="titlehead"><p id="title"style="font-size:35px;color:black" href="home.php">CRIMINAL RECORD MANAGEMENT SYSTEM</p></li>
			<li><a class="active" href="about_us.php">About us</a></li>
			<li><a href="admin_login.php">Admin</a></li>
			<li><a href="officer_login.php">User</a></li>
			<li><a href="home.php">Home</a></li>
		</ul>
		
		<br>
		<br>
            <p  id="f" ><b style="font-size:30px;color:black">The system provies an easy way to enter and retrieve details about Criminals and their whereabouts  <br>An Admin can update the information if any new Officers,Courts,Jails,Crimes are added<br> Criminal information cab be viewed and updated as per the requirements.</b>
                </p>
		
		
		</div>
	</body>
	
	
	


</html>
