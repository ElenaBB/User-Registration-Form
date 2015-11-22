<?php
	// Defining variables to connect to  MySQL server

	// MySQL . Web-server and MySQL server are located on one server, that is why they are connected locally via localhost
	$host = "localhost";
      
	
	// Database (DB) name on MySQL server
	$db_name = "students";
	
	// Username and password to MySQL server
	$username = "stud_admin";
	$password = "123456st";
	
	// Variable db is defined as connection to MySQL server with parameters mentioned above 
	$db = mysql_connect("$host","$username","$password");
	
	if (!$db) {
		// If connection to MySQL failes, the program stops and error message is displayed 
		exit(mysql_error());
		//echo "DB not connected!";
	}
	else {
		// If connection to MySQL is successful, the DB is selected with mysql_select_db
		mysql_select_db("$db_name",$db);		
		//echo "DB connected. </br>";		
	}
	//coding
	mysql_query("SET NAMES utf8");
?>