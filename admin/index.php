<?php session_start();
    include '../includes/db.php';
        if(isset($_SESSION['user']) && isset($_SESSION['password']) == true){
            $sel_sql = "SELECT * FROM users WHERE user_email = '$_SESSION[user]' AND user_password = '$_SESSION[password]'";
            if($run_sql = mysqli_query($conn,$sel_sql)) {
                while($rows = mysqli_fetch_assoc($run_sql)) {
                   $name = $rows['user_f_name'].' '.$rows['user_l_name'];
                    $job = $rows['user_designation'];
                    $gender = $rows['user_gender'];
                    $contact_no = $rows['user_phone_no'];
                    if(mysqli_num_rows($run_sql) == 1 ){
                        if($rows['role'] == 'admin') {
                        } else {
                            header('Location../index.php');
                        }

                    } else {
                    header('Location../index.php'); 
                    }
                }
            }
    } else {
    header('Location../index.php');
    }
        // Counting Posts... 
        $sql = "SELECT * FROM posts"; 
        $run = mysqli_query($conn,$sql);
        $total_posts = mysqli_num_rows($run);

        // Counting Categories...

        $sql = "SELECT * FROM category";
        $run = mysqli_query($conn,$sql);
        $total_categories = mysqli_num_rows($run);

        // Counting Users...

        $sql = "SELECT * FROM users";
        $run = mysqli_query($conn,$sql);
        $total_users = mysqli_num_rows($run);

        // Counting Comments.. 

        $sql = "SELECT * FROM comments";
        $run = mysqli_query($conn,$sql);
        $total_comments = mysqli_num_rows($run);
      
?>
<DOCTYPE html>
<html>
<?php include 'includes/header.php';?>
        <div style="width:50px;height:50px;"></div>
    <body class="container-fluid">
    <?php echo $_SESSION['user']; include 'includes/sidebar.php';?>
        <div class="col-lg-10">
        <div style="width:50px;height:50px;"></div>
            <div class="col-md-3"> 
                <div class="panel panel-danger"> 
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3"><i class="glyphicon glyphicon-signal" style="font-size:4.5em"></i></div>
                             <div class="col-xs-9 text-right">
                                <div style="font-size:2.5em"><?php echo $total_posts; ?></div>
                                <div>Posts</div>
                             </div>
                        </div>
                    </div>
                    <a href="post_list.php">
                        <div class="panel-footer">
                            <div class="pull-left">View Posts</div>
                            <div class="pull-right"><i class="glyphicon glyphicon-circle-arrow-right"></i></div>
                            <div class="clearfix"></div>                            
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-md-3"> 
                <div class="panel panel-success"> 
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3"><i class="glyphicon glyphicon-th-list" style="font-size:4.5em"></i></div>
                             <div class="col-xs-9 text-right">
                                <div style="font-size:2.5em"><?php echo $total_categories; ?></div>
                                <div>Categories</div>
                             </div>
                        </div>
                    </div>
                    <a href="category_list.php">
                        <div class="panel-footer">
                            <div class="pull-left">View Categories</div>
                            <div class="pull-right"><i class="glyphicon glyphicon-circle-arrow-right"></i></div>
                            <div class="clearfix"></div>                            
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-md-3"> 
                <div class="panel panel-warning"> 
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3"><i class="glyphicon glyphicon-user" style="font-size:4.5em"></i></div>
                             <div class="col-xs-9 text-right">
                                <div style="font-size:2.5em"><?php echo $total_users; ?></div>
                                <div>Users</div>
                             </div>
                        </div>
                    </div>
                    <a href="#">
                        <div class="panel-footer">
                            <div class="pull-left">View Users</div>
                            <div class="pull-right"><i class="glyphicon glyphicon-circle-arrow-right"></i></div>
                            <div class="clearfix"></div>                            
                        </div>
                    </a>
                </div>
            </div>
            
            <div class="col-md-3"> 
                <div class="panel panel-info"> 
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3"><i class="glyphicon glyphicon-comment" style="font-size:4.5em"></i></div>
                             <div class="col-xs-9 text-right">
                                <div style="font-size:2.5em"><?php echo $total_categories; ?></div>
                                <div>Comments</div>
                             </div>
                        </div>
                    </div>
                    <a href="#">
                        <div class="panel-footer">
                            <div class="pull-left">View Comments</div>
                            <div class="pull-right"><i class="glyphicon glyphicon-circle-arrow-right"></i></div>
                            <div class="clearfix"></div>                            
                        </div>
                    </a>
                </div>
            </div>
            <div class="clearfix"></div>
            <!------- Top Blocks Ends  ------>
            <!-------- Users Area  ------->
            <div class="col-lg-8"> 
                <div class="panel panel-primary"> 
                    <div class="panel-heading">
                    <h4>Users List</h4>
                    </div>
                    <div class="panel-body"></div>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>S.NO</th>
                                    <th>Name</th>
                                    <th>Role</th>                                    
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $sql = "SELECT * FROM users";
                                $run = mysqli_query($conn,$sql);
                                $number = 1;
                                while($rows = mysqli_fetch_assoc($run)) {
                                    echo '
                                    <tr>
                                    <td>'.$number.'</td>
                                    <td>'.$rows['user_f_name'].' '.$rows['user_l_name'].'</td>
                                    <td>'.$rows['role'].'</td>
                                </tr>
                                ';
                                    $number++;
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="clearfix"></div>
          <!------ Profile Area ------->  
            <div class="col-lg-10">
                <div class="panel panel-primary">
                <div class="panel-heading">

                <?php 

                $sql = "SELECT * FROM users where user_email=' $_SESSION[user]' ";
                $run=mysqli_query($conn,$sql);
                while($row=mysqli_fetch_assoc($run)) {
                
                    ?>
                    <div class="col-md-7"> 
                <div class="page-header"><h4></h4></div>
                </div>
                <div class="col-md8">
                    <img src="images/Hamza.png" width="25%" class="img-circle">
                </div>               
                    <div class="panel-body"></div>
                        <table class="table table-condensed">
                            <tbody>
                            <tr>
                                    <th >Job</th>
                                    <td><?php echo $job; ?></td>
                                </tr>
                                <tr>
                                    <th>Role</th>
                                    <td><?php echo $_SESSION['role']; ?></td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td><?php echo $_SESSION['user']; ?></td>
                                </tr>
                                <tr>
                                    <th>Contact</th>
                                    <td><?php echo $contact_no; ?></td>
                                </tr>
                                <tr>
                                    <th>Gender</th>
                                    <td><?php echo $gender; ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                </div>
                <?php
    
}
?>
            </div>
            <div class="clearfix"></div>

            <!------- Posts Lists Starts  ------>
            <div class="panel panel-primary">
            <div class="panel-heading"><h3>Recent Posts</a></h3></div>
            <div class="panel-body">
             <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>date</th>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Category</th>
                        <th>Author</th>
                    </tr>
                </thead>
        <tbody>
            <?php
                    $sel_sql = "SELECT * FROM posts";
                    $run_sql = mysqli_query($conn, $sel_sql);
                    $number = 1;
                    while($rows = mysqli_fetch_assoc($run_sql)) {
                        echo'
                        
                    <tr>
                        <td>'.$rows['id'].'</td>
                        <td>'.$rows['date'].'</td>
                        <td>'.$rows['image'].'<img src="../images/img1.jpg" width="50px"></td>
                        <td>'.$rows['title'].'</td>
                        <td>'.substr($rows['description'],0,20).'</td>';
                    if($rows['category']=='nature') {
                        echo ' <td class="bg-warning">'.$rows['category'].'</td>';
                    }
                    else {
                        echo ' <td class="bg-danger">'.$rows['category'].'</td>';
                    }

                        echo ' <td>'.$rows['author'].'</td>
                        </tr>
                        ';
                        $number++;
                    }
                ?>

                    </tbody>
            </table>
        </div>     
    </div>
    </div>
    <div class="clearfix"></div>
          <!------ Latest Comments Area-->                  
            <div class="panel panel-primary">
                <div class="panel-heading"><h3>Latest Comments</h3></div>
                <div class="panel-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>S.NO</th>
                                <th>Date</th>
                                <th>Author</th>
                                <th>Email</th>
                                <th>Post</th>
                                <th>Comment</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                    $sel_sql = "SELECT * FROM posts  WHERE author = '$_SESSION[user]' AND status = 'published'";
                    $run_sql = mysqli_query($conn, $sel_sql);
                    $number = 1;
                    while($rows = mysqli_fetch_assoc($run_sql)) {
                        echo'
                            <tr>
                                <td>'.$number.'</td>
                                <td>'.$rows['date'].'</td>
                                <td>'.$rows['author'].'</td>
                                <td>'.$rows['email'].'</td>
                                <td>'.$rows['post'].'</td>
                                <td>'.$rows['comment'].'</td>
                            </tr>
                            ';
                        }
                    ?>
                        </tbody>
                    </table>
                </div>     
            </div>

        </div 
        <footer></footer>

        <footer></footer>  
    </body>
</html>
