<?php session_start();
    include '../includes/db.php';
    if(isset($_SESSION['user']) && isset($_SESSION['password']) == true){
        $sel_sql = "SELECT * FROM users WHERE user_email = '$_SESSION[user]' AND user_password = '$_SESSION[password]'";
        if($run_sql = mysqli_query($conn,$sel_sql)) {
            while($rows = mysqli_fetch_assoc($run_sql)) {
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
    $result = '';
    if(isset($_GET['new_status'])) {
        $new_status =$_GET['new_status'];
        $sql = "UPDATE posts SET status='$new_status' WHERE id = $_GET[id] ";
        if($run = mysqli_query($conn,$sql)){
            $result = '<div class="alert alert-success">We just Update the Status</div>';
        } 
    }

    if(isset($_GET['del_id'])) {
        $del_id = $_GET['del_id'];
        $sql = "DELETE FROM posts WHERE id = '$del_id'";
        if($run = mysqli_query($conn,$sql)) {
            $result = '<div class="alert alert-success">You Deleted A Row no. '.$del_id. 'From Database</div>';
        }
    }

?>
<?php include 'includes/header.php';?>
        <div style="width:50px;height:50px;"></div>
    <body class="container-fluid">
    <?php include 'includes/sidebar.php';?>
        <div class="col-lg-10">
        <div style="width:50px;height:50px;"></div>

            <?php
                echo $result;
            ?>
            <!------- Posts Lists Starts  ------>
           
            <div class="panel panel-primary">

                <div class="panel-heading"><h3>Posts</a></h3></div>
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
                                <th>Status</th>
                                <th>Action</th>
                                <th>Edit Post</th>
                                <th>View Post</th>
                                <th>Delete Post</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                    //$sel_sql = "SELECT * FROM posts ORDER BY ID DESC";
                    $sel_sql = "SELECT * FROM posts ORDER BY ID DESC";
                    $run_sql = mysqli_query($conn,$sel_sql);
                    while($rows = mysqli_fetch_assoc($run_sql)) {
                            echo '
                            <tr>
                                <td>'.$rows['id'].'</td>
                                <td>'.$rows['date'].'</td>
                                <td width="10%">'.($rows['image'] == '' ? 'No Image' : '<img src="../'.$rows['image'].'" width="100px">').'</td>
                                <td>'.$rows['title'].'</td>
                                <td>'.substr($rows['description'],0,30).'</td>
                                <td>'.$rows['category'].'</td>
                                <td>'.$rows['author'].'</td>
                                <td>draft</td>
                                <td>'.($rows['status'] == 'draft'? '<a href="post_list.php?new_status=published&id'.$rows['id'].'" class="btn btn-primary btn-xs navbar-btn">Publish</a>': '<a href="post_list.php?new_status=draft&id'.$rows['id'].'" class="btn btn-info btn-xs navbar-btn">Published</a>').'</td>
                                <td><a href="#" class="btn btn-warning btn-xs navbar-btn">Edit</a></td>
                                <td><a href="../post.php?post_id='.$rows['id'].'" class="btn btn-success btn-xs navbar-btn">View</a></td>
                                <td><a href="post_list.php?del_id='.$rows['id'].'" class="btn btn-danger btn-xs navbar-btn">Delete</a></td>
                                
                            </tr>  
                        
                        ';
                    }
                        ?>
                         </tbody>
                        </table>
                    </div>     
                    </div>
                    <div class="text-center">
                    <ul class="pagination">
                        <li><a href="#">1</a></lu>
                        <li><a href="#">2</a></lu>
                        <li><a href="#">3</a></lu>
                        <li><a href="#">4</a></lu>
                        <li><a href="#">5</a></lu>
                        <li><a href="#">6</a></lu>
                    </ul>
                    </div>
            </div>
      
