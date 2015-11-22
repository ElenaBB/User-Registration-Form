<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <meta http-equiv='Content-Type' content='text/html; charset=utf-8'>
        <!-- <script src="jquery-1.10.2.min.js"></script> -->
        <script src="http://code.jquery.com/jquery-latest.min.js"></script>
        <title>New Student Registration Form</title>
    </head>

<body>
<h4 align=center> New Student Registration Form</h4>
</br>
</br>

    <!-- JQuery style description-->
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
      
<!-- Form Begins --> 
         <div class="div_form_class">
          <form id="stud_reg_form" action="add_user_data.php" method="post" class="form_class">
         
            <h3> Student Registration Form </h3>
            
            
            <div class="my-row">
            <label>Form of Address: </label>
                <select name="form_of_address" id="form_of_address">
                  <option value="">Please select one</option>
                  <option value="ms">Ms.</option>
                  <option value="ms">Mrs.</option>
                  <option value="mr">Mr.</option>
                  <option value="dr">Dr.</option>
                </select>      
            </div>
            
            
            <div class="my-row">
            <label>Gender: </label>
                <select name="gender" id="gender">
                  <option value="">Please select one</option>
                  <option value="F">Female</option>
                  <option value="M">Male</option>
                  <option value="U">Unknown</option>
                </select>      
            </div>
            
            
            <div class="my-row">
            <label>Last name: </label>
            <input name="lname" type="text" class="lname_class" id="lname" />
            </br>
            </div>
            
            
            <div class="my-row">
            <label>First name: </label>
            <input name="fname" type="text" class="fname_class" id="fname" />
            </br>
            </div>
            
            
            <div class="my-row">
            <label>E-mail address: </label>
            <input name="e_mail" type="text" class="e_mail_class" id="e_mail" />
            </br>
            </div>
            
            
            <div class="my-row">
            <label>Phone number (i.e. +123456789)*: </label>
            <input name="phone_num" type="text" class="ph_num_class" id="ph_num" />
            </br>
            </div>
            
           
            
            <div class = "my-row">
                <label>Date of birth (day/month/year): </label>
                <input name="date_birth" value="" size="2" maxlength="2" id="bd_day"/>
                <select name="month" id="bd_month">
                    <option value="0">--select --</option>
                    <option value="1">January</option>
                    <option value="2">February</option>
                    <option value="3">March</option>
                    <option value="4">April</option>
                    <option value="5">May</option>
                    <option value="6">June</option>
                    <option value="7">July</option>
                    <option value="8">August</option>
                    <option value="9">September</option>
                    <option value="10">October</option>
                    <option value="11">November</option>
                    <option value="12">December</option>
                </select>
                <input name="s_year" value="" size="5" maxlength="4" id="bd_year"/>           
            </div>
            
            
            <div class="my-row">
            <label>Degree program: </label>
            <input name="degree_program" type="text" class="degree_prog_class" id="degree_prog" />
            </br>
            </div>
            
            
            <div class="my-row">
            <label>Subjects*: </label>
            <input name="subject" type="text" class="subj_class" id="subj" />
            </br>
            </div>
            
            
            <div class="my-row">
            <label>Student registration number: </label>
            <input name="stud_reg_number" type="text" class="stud_reg_num_class" id="stud_reg_num" />
            </br>
            </div>
                        
            
            <div class="my-row">
            <label>Comments*: </label>
            </br>
            <textarea name="comments" id="comments" rows="3" cols="40"></textarea>
            </br>
            </div>
            
            <div class="my-row">
            <p>Items marked with an asterisk (*) are optional.</p>
            
            </div>
            
            <!-- <input type="submit" class="btn_submit disabled" value="Create Account" /> -->
            <input type="submit" value="Create Account" />
          </form>
        </div>        
        <!-- Form Ends -->


    <script language="javascript"> 
           
        
            
            // email validation function
            function myValidateEMailAddress(email_address) {
                var email_pattern = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
                return email_pattern.test(email_address);
            }
               
            $(document).ready(function(){
                
                // After pressing Submit, form checking begins 
                $('#stud_reg_form').submit(function(e) {
                    var my_errors = false;
                    $('.my-row > .error').remove();
                    $('.my-row').removeClass('highlighted');
                    
                    
                    // Form of address field checking
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
                    
                    // Date of birth field checking
                    if ( ($('#bd_day').val() == '') || ($('#bd_month').val() == '') || ($('#bd_year').val() == '') ){
                        $('#bd_day').parent().addClass('highlighted');
                        $('#bd_day').parent().append('<div class="error">Please enter correct birthday</div>');
                        my_errors = true;
                    }
                    
                    // Email field checking and further validation for correct syntax
                    
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
                    
                    // Checking the whole registraion form for errors. If there is at least one error (empty field), confirm alert is not displayed
. 
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
</br>
</br>


<a href="index.php">Main Page</a>

</body>
</html>