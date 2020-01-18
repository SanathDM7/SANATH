<html>

<head>
    <style>
        #title {
            background-color: Gray;
            font-size: 24px;
            color: white;
            margin-left: 20px;

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

        #titlehead {
            float: left;
        }

        li a {
            display: block;
            color: white;
            font-size: 20px;
            text-align: center;
            padding: 16px 20px;
            margin-top: 10px;
            text-decoration: none;
        }

        li a:hover:not(.active) {
            background-color: #cccccc;
        }

        #home_img {
            padding-left: 50px;
            padding-bottom: 10px;

        }

        #bottom_posts {

            display: grid;
            grid-template-columns: auto auto auto;
            padding: 10px;

        }

        #img_title {

            display: grid;
            grid-template-columns: auto auto auto;
            padding: 10px;

        }

        #posts {
            padding: 20px;
            font-size: 30px;
            text-align: center;

        }

        #card {
            background-color: #FFFFEF;
            margin: 150px;
            height: 150px: border-radius:5px;
            box-shadow: 0 12px 16px 0 rgba(0, 0, 0, 0.24), 0 17px 50px 0 rgba(0, 0, 0, 0.19);
            text-align: center;
            font-size: 24px;
            padding: 25px;
            border-collapse: collapse;
            margin-top: 75px;
            margin-left: 250px;

        }

        #done {
            background-color: #00b300;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;

        }

        table,
        td,
        th {
            margin-left: 10px;
            border: 1px #EEEEEE;
            align: center;
            font-size: 18px;
            text-align: center;

            padding-left: 35px;
            padding-right: 35px;
            padding-top: 15px;
            padding-bottom: 15px;
        }

        table {
            margin: auto;
        }

    </style>
</head>

<body>



    <ul>
        <li id="titlehead" style="text-decoration: underline;text-decoration-color:white;">
            <p id="title" style="font-size:30px;"><a href="search_home.php">Search Home</a></p>
        </li>
        <li><a href="about_us.php">About us</a></li>
        <li><a href="admin_login.php">Admin</a></li>
        <li><a href="officer_login.php">User</a></li>
        <li><a href="home.php">Home</a></li>
    </ul>

    <h2 style="font-style:italic; font-size:30px;padding-left:30px;">Court Details</h2>

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
		
		$courtsearchid = filter_input(INPUT_GET,'courtsearchid');
		
		$sql = "SELECT cc.court_id,cc.court_type,jr.jail_loc,cr.criminal_name,crr.crime_name
        from court_record cc,jail_record jr,criminal_record cr,crime_record crr
        WHERE cr.court_id='$courtsearchid' and cr.court_id=cc.court_id and
        cr.jail_id=jr.jail_id and cr.crime_id=crr.crime_id";
		$result = $conn->query($sql);
		
		
		echo "<table id='card' border='2'>";
	
		if ($result->num_rows > 0) {
            $c=false;
			
			while($row = $result->fetch_assoc()) {
                if($c==false)
                {
                    echo "<tr><td>Court Id : </td><td>".$row['court_id']."</td>";
                     echo "<td>Court type: </td><td>".$row['court_type']."</td></tr>";
                    
                    $c=true;
                }
               
                echo "<tr><td>Criminal Name: </td><td>".$row['criminal_name']."</td>";
                echo "<td>Crime Committed: </td><td>".$row['crime_name']."</td>";
                echo "<td>Jail Location : </td><td>".$row['jail_loc']."</td></tr>";
				
				
			}
		} 
		
		
		
		else {
			echo "<div id='card'><p>Record not Exist</p><form action='court_search.php' method='get'><button type='submit' id='done'>Done</button></form></div>";
		
		}
		
		
		
		?>

</body>





</html>
