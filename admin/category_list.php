<?php session_start();
    include '../includes/db.php';
    if(isset($_SESSION['user']) && isset($_SESSION['password']) == true){
        $sel_sql = "SELECT * FROM users WHERE user_email = '$_SESSION[user]' AND user_password = '$_SESSION[password]'";
        if($run_sql = mysqli_query($conn,$sel_sql)) {
            if(mysqli_num_rows($run_sql) == 1 ){

            } else {
                header('Location../index.php');
            }
        }
    } else {
        header('Location../index.php');
    }

?>
<DOCTYPE html>
<html>
<?php include 'includes/header.php';?>
        <div style="width:50px;height:50px;"></div>
    <body class="container-fluid">
    <?php include 'includes/sidebar.php';?>
        <div class="col-lg-10">
        <div style="width:50px;height:50px;"></div>
                <div class="col-lg-8"> 
                <div class="panel panel-primary"> 
                    <div class="panel-heading">
                    <h4>Categories</h4>
                    </div>
                    <div class="panel-body"></div>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>S.NO</th>
                                    <th>Category Name</th>
                                    <th>Edit</th> 
                                    <th>Delete</th>                                     
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                                 $sql = "SELECT * FROM category";
                                 $run = mysqli_query($conn,$sql);
                                 $number = 1;
                                 While($rows = mysqli_fetch_assoc($run)) {
                                     if($rows['category_name'] == 'home') {
                                         continue;
                                     } else {
                                         $category_name = ucfirst($rows['category_name']);
                                     }
                                     echo '
                                     <tr>
                                        <td>'.$rows['c_id'].'</td>
                                        <td>'.$rows['category_name'].'</td>
                                         <td><a href="edit_category.php?cat_id='.$rows['c_id'].'" class="btn btn-warning navbar-btn btn-xs">Edit</a></td>
                                         <td><a href="edit_category.php?cat_id='.$rows['c_id'].'" class="btn btn-danger navbar-btn btn-xs">Delete</a></td>


                                     </tr>
                                     
                                     
                                     ';
                                 }
                            ?>
                            </tr>
                                </thead>
                            </tbody>
                        </table>
                    </div>
                 </div>
            </div>
            </div> 
        <footer></footer>

        <footer></footer>  
    </body>
</html>
