<?php include('db.php');?>
<DOCTYPE html>
<html>
    <head>
        <title>CMS System</title>
        <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
        <script src="bootstrap/css/bootstrap.css"</script>
        <script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
    </head>
    <body>
<header class="navbar navbar-inverse navbar-static-top"> 
               <div class="container">
                <a href="index.php" class="navbar-brand">CMS System</a>
                <ul class="nav navbar-nav navbar-right">
                   
                    <?php
                    $sql_cat = "SELECT * FROM category";
                    $run_cat = mysqli_query($conn,$sql_cat);
                    
                    while($rows = mysqli_fetch_assoc($run_cat)) {

                        if(isset($_GET['cat_name'])) {
                            if($_GET['cat_name'] == $rows['category_name']){
                                $class = 'active';
                            } else {
                                $class = '';
                            }
                        } else {
                            $class = '';
                        }



                        if($rows['category_name'] == 'Home') {
                            if($_SERVER['PHP_SELF'] == '/cms/index.php') {
                                echo '<li class="active"><a href="index.php">'.ucfirst($rows['category_name']).'</a>';
                            } else {
                                echo '<li class=""><a href="index.php">'.ucfirst($rows['category_name']).'</a>';
                            }

                        } else {                          
                            echo '<li class=""><a href="menu.php?cat_name='.$rows['category_name'].'">'.ucfirst($rows['category_name']).'</a>';                            
                        }
                    }
                       
                    ?>
                    
                    <li><a href="contact.php">Contact Us</a><li>
                    
                    <li><a href="registration.php">Registration</a><li>
                </ul>
            </div>
        </header>