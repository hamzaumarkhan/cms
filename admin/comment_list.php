<?php session_start();
    include '../includes/db.php';
    if(isset($_SESSION['user']) && isset($_SESSION['password'])){
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

<?php include 'includes/db.php';?>
<DOCTYPE html>
<html>
<?php include 'includes/header.php';?>
        <div style="width:50px;height:50px;"></div>
    <body class="container-fluid">
    <?php include 'includes/sidebar.php';?>
        <div class="col-lg-10">
        <div style="width:50px;height:50px;"></div>
           
          <!------ Latest Comments Area-->  
            <div class="panel panel-primary">
                <div class="panel-heading"><h3>Latest Comments</h3></div>
                <div class="panel-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>S.NO</th>
                                <th>Date</th>
                                <th>Authore</th>
                                <th>Email</th>
                                <th>Post</th>
                                <th>Comment</th>
                                <th>Status</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>2021-19-21</td>
                                <td>Ali</td>
                                <td>ali@gmail.com</td>
                                <td>1</td>
                                <td>I Like that Post</td>
                                <td><a href="#" class="btn btn-warning btn-xs navbar-btn">Approved</td>
                                <td><a href="#" class="btn btn-danger btn-xs navbar-btn">Delete</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>2021-19-21</td>
                                <td>Smai</td>
                                <td>sami@gmail.com</td>
                                <td>2</td>
                                <td>I Like that Post</td>
                                <td>Approved</td>
                              
                                <td><a href="#" class="btn btn-danger btn-xs navbar-btn">Delete</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>2021-19-21</td>
                                <td>Farman</td>
                                <td>farman@gmail.com</td>
                                <td>3</td>
                                <td>I Like that Post</td>
                                <td><a href="#" class="btn btn-warning btn-xs navbar-btn">Approved</td>
                                <td><a href="#" class="btn btn-danger btn-xs navbar-btn">Delete</td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>2021-19-21</td>
                                <td>Nafees</td>
                                <td>nafees@gmail.com</td>
                                <td>4</td>
                                <td>I Like that Post</td>
                                <td>Approved</td>
                                <td><a href="#" class="btn btn-danger btn-xs navbar-btn">Delete</td>
                            </tr>
                          
                        </tbody>
                    </table>
                </div>     
            </div>

        </div 
        <footer></footer>

        <footer></footer>  
    </body>
</html>
