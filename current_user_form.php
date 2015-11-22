<html>
<head>
    <script src="http://code.jquery.com/jquery-latest.min.js"></script>
</head>
<body>
<h4 align=center>Change Student Account Page</h4>
    
    <!-- JQuery styles-->
    <style>
            .div_form_class {
                border: solid gray 3px;
                width: 515px;
                padding-left: 10px; 
                background-color: #F9D9E7;
            }
            
        
            .highlighted {
                background-color: #ffffcc;
            }
            
            .error {
                color: #cc0000;
            }
            
            label {
            margin-right: 9px;
             }
             
             
            .my-row {
                width: 500px;
                padding: 5px;
                
            }
    </style>
<?php
    
    ini_set('display_errors',1);
	error_reporting(E_ALL);
		
	// Connecting file db.php - this file connects MySQL DB
	include('db.php');
    
    // Checking variables (from the form) if they are filled/empty
	if(isset($_POST['stud_reg_num'])) {$stud_reg_num = $_POST['stud_reg_num'];}
    
    //echo $stud_reg_num;
    
    
    // Checking if Student registration number exists in MySQL DB
    $result = mysql_query("SELECT stud_reg_number FROM students_table",$db);
	$myrow = mysql_fetch_array($result);       
    $stud_reg_num_flag = "1";   
    do {                 
        if (intval($myrow["stud_reg_number"]) == $stud_reg_num){
            $stud_reg_num_flag = "0";         
        }        
    }
    while ($myrow = mysql_fetch_array($result));
    
	// If Student registration number does not exist in DB, message is displayed 
    if ($stud_reg_num_flag == "1") { 
        echo "Student registration number - ". $stud_reg_num . "was not found in the database.</br>"; 
        echo "Please input correct data on Main Page.";
           
    } 
    // If there is Student registration number in the DB - the form is displayed and all the information is inserted into fields from the DB. Then, correctness is checked with JQuery script after submission
    else {
        
        //echo "Student registration number - ". $stud_reg_num . " is present in the database!";
        
        // Variable result - SQL command, query of account data from MySQL DB,  stud_reg_num of wich is equal to that on index.php	 
        $result = mysql_query("SELECT form_of_address,gender,lname,fname,e_mail,phone_num,date_birth,degree_program,subject,stud_reg_number,comments FROM students_table WHERE stud_reg_number='$stud_reg_num'",$db);
        $myrow = mysql_fetch_array($result);
        
        
 //This function shows the  form with data from the table       

printf("
            <!-- Form Begins --> 
            <div class='div_form_class'>
            <form id='stud_reg_form' action='update_user_data.php' method='post' class='form_class'>
         
            <h3> Student Registration Form </h3>
            
            
            <div class='my-row'>
            <label>Form of Address: </label>
                <select name='form_of_address' id='form_of_address'>
                  <option value='%s'>Please select one</option>
                  <option value='ms'>Ms.</option>
                  <option value='ms'>Mrs.</option>
                  <option value='mr'>Mr.</option>
                  <option value='dr'>Dr.</option>
                </select>      
            </div>
            
            
            <div class='my-row'>
            <label>Gender: </label>
                <select name='gender' id='gender'>
                  <option value='%s'>Please select one</option>
                  <option value='F'>Female</option>
                  <option value='M'>Male</option>
                  <option value='U'>Unknown</option>
                </select>      
            </div>
            
            
            <div class='my-row'>
            <label>Last name: </label>
            <input name='lname' type='text' class='lname_class' id='lname' value='%s' />
            </br>
            </div>
            
            
            <div class='my-row'>
            <label>First name: </label>
            <input name='fname' type='text' class='fname_class' id='fname' value='%s' />
            </br>
            </div>
            
            
            <div class='my-row'>
            <label>E-mail address: </label>
            <input name='e_mail' type='text' class='e_mail_class' id='e_mail' value='%s' />
            </br>
            </div>
            
            
            <div class='my-row'>
            <label>Phone number (i.e. +123456789)*: </label>
            <input name='phone_num' type='text' class='ph_num_class' id='ph_num' value='%s' />
            </br>
            </div>
            
           
            
            <div class='my-row'>
            <label>Date of birth (day/month/year): </label>            
            <input name='date_birth'  value='%s' id='date_birth' />
            </br>
            </div>
                         
            
            <div class='my-row'>
            <label>Degree program: </label>
            <input name='degree_program' type='text' class='degree_prog_class' id='degree_prog' value='%s' />
            </br>
            </div>
            
            
            <div class='my-row'>
            <label>Subjects*: </label>
            <input name='subject' type='text' class='subj_class' id='subj value='%s' />
            </br>
            </div>
            
            
            <div class='my-row'>
            <label>Student registration number: </label>
            <input name='stud_reg_number' type='text' class='stud_reg_num_class' id='stud_reg_num' value='%s' readonly/>
            </br>
            </div>
                        
            
            <div class='my-row'>
            <label>Comments*: </label>
            </br>
            <textarea name='comments' id='comments' rows='3' cols='40'>%s</textarea>
            </br>
            </div>
            
            <div class='my-row'>
            <p>Items marked with an asterisk (*) are optional.</p>
            
            </div>
            
            
            <input type='submit' value='Update Account' />
            </form>
            </div>        
            <!-- Form Ends -->
            
            "
            ,$myrow["form_of_address"],$myrow["gender"],$myrow["lname"],$myrow["fname"],$myrow["e_mail"],$myrow["phone_num"],$myrow["date_birth"],$myrow["degree_program"],$myrow["subject"],$myrow["stud_reg_number"],$myrow["comments"]);
            mysql_close();
     ?>     <!-- PHP is closed to start Javascript script (JQuery) -->
     
     <script language="javascript">
     
            //  email validation function
            function myValidateEMailAddress(email_address) {
                var email_pattern = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
                return email_pattern.test(email_address);
            }
               
            $(document).ready(function(){
                
                // After pressing Submit, form checking starts
                $('#stud_reg_form').submit(function(e) {
                    var my_errors = false;
                    $('.my-row > .error').remove();
                    $('.my-row').removeClass('highlighted');
                    
                    
                    // Checking of Form of address field
                    if ($('#form_of_address').val() == '') {
                        $('#form_of_address').parent().addClass('highlighted');
                        $('#form_of_address').parent().append('<div class="error">Please select one item</div>');
                        my_errors = true;
                        
                    }
                    
                    // Gender field checking
                    if ($('#gender').val() == '') {
                        $('#gender').parent().addClass('highlighted');
                        $('#gender').parent().append('<div class="error">Please select gender</div>');
                        my_errors = true;
                    }
                    
                    // Last name field checking
                    if ($('#lname').val() == '') {
                        $('#lname').parent().addClass('highlighted');
                        $('#lname').parent().append('<div class="error">Please enter correct last name</div>');
                        my_errors = true;
                    }
                    
                    // First name field checking
                    if ($('#fname').val() == '') {
                        $('#fname').parent().addClass('highlighted');
                        $('#fname').parent().append('<div class="error">Please enter correct first name</div>');
                        my_errors = true;
                    }
                    
                    //  Date of birth field checking
                    if ( ($('#bd_day').val() == '') || ($('#bd_month').val() == '') || ($('#bd_year').val() == '') ){
                        $('#bd_day').parent().addClass('highlighted');
                        $('#bd_day').parent().append('<div class="error">Please enter correct birthday</div>');
                        my_errors = true;
                    }
                    
                    // Email field checking and validation for syntax correctness
                    
                    if ($('#e_mail').val() == '') {
                        $('#e_mail').parent().addClass('highlighted');
                        $('#e_mail').parent().append('<div class="error">Please enter e-mail</div>');
                        my_errors = true;
                    }
                    
                    if ($('#e_mail').val() != '') {
                        if (!myValidateEMailAddress($('#e_mail').val())) {
                            $('#e_mail').parent().addClass('highlighted');
                            $('#e_mail').parent().append('<div class="error">Please provide correct e-mail address</div>');
                            my_errors = true;
                        }
                    }
                    
                    // Phone Number field checking

                        if ( ($('#ph_num').val() != '') && ($.isNumeric($('#ph_num').val()) == false) ){
                               $('#ph_num').parent().addClass('highlighted');
                              $('#ph_num').parent().append('<div class="error">Please provide correct phone number</div>');
                               my_errors = true;
                                }
                    
                    
                    // Degree program field checking
                    if ($('#degree_prog').val() == '') {
                        $('#degree_prog').parent().addClass('highlighted');
                        $('#degree_prog').parent().append('<div class="error">Please enter degree program</div>');
                        my_errors = true;
                    }
                    
                    // Student registration number field checking
                    if ($('#stud_reg_num').val() == '') {
                        $('#stud_reg_num').parent().addClass('highlighted');
                        $('#stud_reg_num').parent().append('<div class="error">Please enter student registration number</div>');
                        my_errors = true;
                    }
                    
                    //Checks for a numeric entry
                    if ( ($('#stud_reg_num').val() != '') && ($.isNumeric($('#stud_reg_num').val()) == false) ){
                               $('#stud_reg_num').parent().addClass('highlighted');
                              $('#stud_reg_num').parent().append('<div class="error">Please provide numeric data</div>');
                               my_errors = true;
                                }
                    
                    // Checking the whole form for errors. If there is at least one error (empty field), confirm alert is not displayed.
                    if (my_errors) {
                        return false;
                        }
                    else {
                        //e.preventDefault();
                        if (!confirm('Do you really want to submit the form?')) {
                            return false;
                            
                        }
                    }  
                           
                });
            
            });
        
        </script>
     <!-- Javascript code is closed, PHP code opens below by enetring }. This bracket closes if-else construction on 69 line -->
<?php       
    }
?>




</br>
</br>



<a href="http://212.107.229.36/proj3/index.php">Main Page</a>
</body>
</html>
