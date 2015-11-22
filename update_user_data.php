<html>
<body>

<?php

    ini_set('display_errors',1);
	error_reporting(E_ALL);
		
	// Connecting db.php - this file connects to MySQL DB
	include('db.php');

    // Checking variables for being filled
	if(isset($_POST['form_of_address'])) {$form_of_address = $_POST['form_of_address'];}
    if(isset($_POST['gender'])) {$gender = $_POST['gender'];}
    if(isset($_POST['lname'])) {$lname = $_POST['lname'];}
    if(isset($_POST['fname'])) {$fname = $_POST['fname'];}
    if(isset($_POST['e_mail'])) {$e_mail = $_POST['e_mail'];}
    if(isset($_POST['phone_num'])) {$phone_num = $_POST['phone_num'];}
    if(isset($_POST['date_birth'])) {$date_birth = $_POST['date_birth'];}
    if(isset($_POST['degree_program'])) {$degree_program = $_POST['degree_program'];}
    if(isset($_POST['subject'])) {$subject = $_POST['subject'];}
    if(isset($_POST['stud_reg_number'])) {$stud_reg_number = intval($_POST['stud_reg_number']);}
    if(isset($_POST['comments'])) {$comments = $_POST['comments'];}



        // Query to the DB: all fields are updated of the account, which stud_reg_number is equal to that mentioned on the main page
        $query =   "UPDATE students_table 
                    SET form_of_address='$form_of_address',gender='$gender',lname='$lname',fname='$fname',e_mail='$e_mail',phone_num='$phone_num',date_birth='date_birth',degree_program='$degree_program',subject='$subject',comments='$comments' 
                    WHERE stud_reg_number='$stud_reg_number'";
        //echo $query; 
        mysql_query($query,$db) or die(mysql_error());
        echo "<p> Your student account was updated successfuly.</p>";        
        mysql_close();        
?>

</br>
<a href="http://212.107.229.36/proj3/index.php">Main Page</a>
</body>
</html>