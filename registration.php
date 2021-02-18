<?php include('includes/db.php');
    $match =""; 
    if(isset($_POST['submit_user'])) {

        if($_POST['password'] == $_POST['con_password']){
            $date = date('Y-m-d h:i:s');
            $ins_sql = "INSERT INTO users (user_f_name, user_l_name, user_email, user_password,user_gender,user-marital_status,user_phone_no,user_designation,user_website,user_address,user_about_mess,user_date ) VALUES ('$_POST[first_name]', '$_POST[last_name]', '$_POST[email]', '$_POST[password]', '$_POST[gender]', '$_POST[marital_status]', '$_POST[phone_no]', '$_POST[designation]', '$_POST[website]', '$_POST[address]'. '$_POST[about_me]', '$date')"; 
            $run_sql = mysql_query($conn, $ins_sql);
        }else{ 
            $match = '<div class="alert alert-danger">Password doesn&apos;t match!</div>';
        }
     
    }      
?> 
<DOCTYPE html>
<html>
    <head>
        <title>CMS System</title>
        <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
        <script src="bootstrap/css/bootstrap.css"</script>
        <script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
    </head>
    <body>
   
            <div class="container">
                <article class="row">
                  <section class="col-lg-8">
                        <div class="page-header">
                            <h2>Registration Form</h2>
                    </div>
                    <?php echo  $match; ?>
                    <form class="form-horizontal" action="contact.php" method="post" role="form">
                        <div class="form-group ">
                            <lable for="first_name" class="col-sm-3 control-lable">First_Name *</lable>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="first_name" placeholder="Insert your Name" id="first_name" required>
                           </div>
                        </div>
                        <div class="form-group ">
                            <lable for="last_name" class="col-sm-3 control-lable">Last_Name *</lable>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="last_name" placeholder="Insert your Name" id="last_name" required>
                           </div>
                        </div>
                        <div class="form-group ">
                            <lable for="email" class="col-sm-3 control-lable">Email Address *</lable>
                            <div class="col-sm-8">
                                <input type="email" class="form-control" name="email" placeholder="Email Address" id="email" required>
                           </div>
                        </div>

                        <div class="form-group ">
                            <lable for="password" class="col-sm-3 control-lable">Password *</lable>
                            <div class="col-sm-8">
                                <input type="password" class="form-control" name="password" placeholder="Insert a Password" id="password" required>
                           </div>
                        </div>
                        <div class="form-group ">
                            <lable for="con_password" class="col-sm-3 control-lable">Confirm Password *</lable>
                            <div class="col-sm-8">
                                <input type="password" class="form-control" name="con_password" placeholder="Confirm Password" id="con_password" required>
                           </div>
                        </div>
                        <div class="form-group ">
                            <lable for="gender" class="col-sm-3 control-lable">Gender *</lable>
                            <div class="col-sm-2">
                            <select class="form-control" name="gender" id="gender" required>
                                    <option value="">Select Gender</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option> 
                            </select>
                        </div>
                            <lable for="marital_status" class="col-sm-3 control-lable">Marital Status</lable>
                            <div class="col-sm-3">
                            <select class="form-control" name="marital_status" id="marital_status">
                                    <option value="">Select Status</option>
                                    <option value="single">Single</option>
                                    <option value="married">Married</option> 
                                    <option value="divorced">Divorced</option> 
                                    <option value="other">Other</option> 
                            </select>
                        </div>
                     </div> 
                     <div class="form-group ">
                            <lable for="phone_no" class="col-sm-3 control-lable ">Phone No: *</lable>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="phone_no" id="phone_no" placeholder="Insert your Contact No:" id="phone_no"  required>
                           </div>
                        </div>
                        <div class="form-group ">
                            <lable for="designation" name="designation" class="col-sm-3 control-lable">Designation</lable>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="designation" placeholder="Insert your Designation" id="designation">
                           </div>
                        </div>
                        <div class="form-group ">
                            <lable for="website" class="col-sm-3 control-lable">Official Website:</lable>
                            <div class="col-sm-8">
                                <input type="text" id="website" class="form-control" name="website" placeholder="Insert your Official Website" id="website" required>
                           </div>
                        </div>
                        <div class="form-group ">
                            <lable for="address" class="col-sm-3 control-lable">Address:</lable>
                            <div class="col-sm-8">
                            <textarea class="form-control" name="address" id="address"rows="2"></textarea>
                           </div>
                        </div>
                        <div class="form-group ">
                            <lable for="about_me" class="col-sm-3 control-lable ">About me: *</lable>
                            <div class="col-sm-8">
                            <textarea class="form-control" name="about-me" class="about-me" rows="6" required></textarea>
                           </div>
                        </div>
                         <div class="form-group ">
                            <lable class="col-sm-3 control-lable"></lable>
                            <div class="col-sm-8">
                                <input type="submit" value="Register yourself" name="submit_user" class="btn btn-block btn-danger"id="subject">
                              </div>
                            </div>
                        </form>
                        </section>
                            <?php include'includes/sidebar.php';?>
                        </article>
                    </div>
           <div style="width:50px;height:50px"></div>
            <?php include 'includes/footer.php';?>
    </body>   
</html>