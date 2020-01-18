<html>

<head>
    <style>
        #title {
            background-color: Gray;
            font-size: 24px;
            color: #E53935;

            color: Black;
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
            color: Black;
            font-size: 20px;
            text-align: center;
            padding: 16px 20px;
            margin-top: 10px;
            text-decoration: none;
        }

        li a:hover:not(.active) {
            background-color: #cccccc;
            color: Black;
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
            margin-left: 200px;
            margin-right: 200px;
        }

        #done {
            background-color: #00b300;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;

        }

    </style>
</head>

<body>



    <ul>
        <li id="titlehead" style="text-decoration: underline;text-decoration-color:Black;">
            <p id="title" style="font-size:30px;" ;>Criminal Info</p>
        </li>
        <li><a href="about_us.php">About us</a></li>
        <li><a href="admin_login.php">Admin</a></li>
        <li><a class="active" href="officer_login.php">User</a></li>
        <li><a href="home.php">Home</a></li>
    </ul>

    <?php
		
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname ="crimedb";

		$conn = new mysqli($servername, $username, $password, $dbname);
		if ($conn->connect_error) {
			// die("Connection failed: " . $conn->connect_error);
		} 
		
		$sql = "CREATE TABLE IF NOT EXISTS criminal_record (
			criminal_id VARCHAR(50) PRIMARY KEY,
			criminal_name VARCHAR(50),
			dob date,
			police_id VARCHAR(50) references officer_database(police_id),
			case_id VARCHAR(50) references,
			crime_id VARCHAR(50) references crime_record(crime_id),
            court_id varchar(50) references court_record(court_id),
			jail_id VARCHAR(50) references jail_record(jail_id),
            gender  VARCHAR(50)
		)";

		if ($conn->query($sql) === TRUE) {
		  echo "Table crime_database created successfully";
		} else {
        //   echo "Error creating table: " . $conn->error;
		}
		$criminalid = filter_input(INPUT_GET,'criminalid');
		$criminalname = filter_input(INPUT_GET,'criminalname');
        $dob = filter_input(INPUT_GET,'dob');
        $policeid = filter_input(INPUT_GET,'policeid');
		$caseid = filter_input(INPUT_GET,'caseid');
		$crimeid = filter_input(INPUT_GET,'crimeid');
        $courtid= filter_input(INPUT_GET,'courtid');
		$jailid = filter_input(INPUT_GET,'jailid');
		$gender= filter_input(INPUT_GET,'gender');
       

		$sql = " INSERT INTO criminal_record (criminal_id, criminal_name ,dob,police_id,case_id ,crime_id,court_id,jail_id,gender) 
        VALUES ('$criminalid', '$criminalname', '$dob','$policeid','$caseid','$crimeid','$courtid','$jailid','$gender')";
        

        //Trigger Created and triggered here
        $sql2 = "CREATE TRIGGER `casecreated` BEFORE INSERT ON `criminal_record`
        FOR EACH ROW INSERT INTO case_record VALUES(NEW.case_id , NOW())";

        if ($conn->query($sql) === TRUE) {
            
	    echo "<div id='card'><p>Crime Record Successfully Added</p><form action='officer_home.php' method='get'><button type='submit' id='done'>Done</button></form></div>";
		
        }

		$conn->close();
		
		?>

</body>





</html>
