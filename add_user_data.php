<html>
<body>

<?php
		
	// Connecting db.php - this file connects to MySQL DB
	include('db.php');

    // Checking variables (from the form) if they are filled.
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
    
        
    
    // Checking if Student registration number exists in MySQL DB
    $result = mysql_query("SELECT stud_reg_number FROM students_table",$db);
	$myrow = mysql_fetch_array($result);       
    $stud_reg_num_flag = "1";   
    do {                 
        if (intval($myrow["stud_reg_number"]) == $stud_reg_number){
            $stud_reg_num_flag = "0";         
        }        
    }
    while ($myrow = mysql_fetch_array($result));
    
	// If there is no Student registration number in the database, a new entry is added
    if ($stud_reg_num_flag == "1") {           
        $query = "INSERT INTO students_table (form_of_address,gender,lname,fname,e_mail,phone_num,date_birth,degree_program,subject,stud_reg_number,comments) VALUES('$form_of_address','$gender','$lname','$fname','$e_mail','$phone_num','$date_birth','$degree_program','$subject','$stud_reg_number','$comments')";
        //echo $query; // для отладки
        mysql_query($query) or die(mysql_error()); 
		echo "<p> Your student account was registred successfuly.</p>";
		mysql_close();        
    }
    else {
       echo "<label>Student registration number already exists, please select  the other number on </label>";
	   echo "<a href='http://212.107.229.36/proj3/new_user.php'>New Student Registration Form</a></br> ";       
    }
    
?>



</br>
</br>


<a href="http://212.107.229.36/proj3/index.php">Main Page</a>
</body>
</html>
