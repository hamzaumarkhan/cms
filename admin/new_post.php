<?php session_start();
    include '../includes/db.php';
    $error = '';
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
$error = '';
if(isset($_FILES['image'])) { 
    $title = strip_tags($_POST['title']);
    $date = date('Y-m-d h:i:s'); 
    if($_FILES['image'] ['name'] != '') {   
        $image_name = $_FILES['image']['name'];
        $image_tmp = $_FILES['image']['tmp_name'];
        $image_size = $_FILES['image']['size'];
        $image_ext = pathinfo($image_name,PATHINFO_EXTENSION);
        $image_path = '../images/'.$image_name;
        $image_db_path = 'images/'.$image_name;

        if($image_size < 10000000){
            if($image_ext == 'jpg' || $image_ext == 'png' || $image_ext == 'gif'){
                if(move_uploaded_file($image_tmp,$image_path)){
                        $ins_sql = "INSERT INTO posts (title, description, image, category, status, date, author) VALUES ('$title', '$_POST[description]',  '$image_db_path', '$_POST[category]', '$_POST[status]' '$date', '$_SESSION[user]')";
                        if(mysqli_query($conn,$ins_sql)){
                            header('post_list.php');
                        } else {
                            $error = '<div class="alert alert-danger">The Query was not Working!</div>';
                        }
                }else {
                    $error = '<div class="alert alert-danger">Sorry, Unfortunately Image has not been uploaded!</div>';
                } 
            } else {
                $error = '<div class="alert alert-danger">Image Formet was not Correct</div>'; 
            }
        } else {
            $error = '<div class="alert alert-danger">Image File Size is much bigger then Expect!</div>';
        }
    } else {
        $ins_sql = "INSERT INTO posts (title, description, image, category, status, date, author) VALUES ('$title', '$_POST[description]', '$_POST[category]', '$_POST[status]', '$date', '$_SESSION[user]')";
        if(mysqli_query($conn,$ins_sql)){
            header('post_list.php');
        } else {
            $error = '<div class="alert alert-danger">The Query was not Working!</div>';
        } 
    }
}
?>
<?php include 'includes/header.php';?>
        <div style="width:50px;height:50px;"></div>
    <body class="container-fluid">
    <?php echo $error; include 'includes/sidebar.php';?>
        <div class="col-lg-10">
        <div style="width:50px;height:50px;"></div> 
        <div class="page-header"><h2>New Post</h2></div>
            <div class="container-fluid">
            <form class="form-horizontal" action="new_post.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                    <lable for="title">Upload Image</lable>
                    <input id="image" type="file" name="image" class="btn btn-primary"> 
                </div>
                <div class="form-group">
                    <lable for="title">Title</lable>
                    <input id="title" type="text" name="title" class="form-control" required > 
                </div>
                <div class="form-group">
                    <lable for="category">Category</lable>
                    <select id="category" name="category" class="form-control">
                        <option value="">Select Any Category</option>
                        <?php $sel_sql =" SELECT * FROM  category";
                        $run_sql = mysqli_query($conn,$sel_sql);
                        while($rows = mysqli_fetch_assoc($run_sql)) {
                            if($rows['category_name'] == 'home') {
                                continue;
                            }
                            echo '<option value="'.$rows['c_id'].'" >'.$rows['category_name'].'</option>';
                        }
                        ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <lable for="description">Description</lable>
                        <textarea id="description" name="description" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                    <lable for="status">Status</lable>
                    <select id="status" name="status" class="form-control">
                        <option value="publish">Draft</option>
                        <option value="publish" >Publish</option>
                        </select>
                    </div>
                    <div class="form-group">
                    <input type="submit" name="submit" class="btn btn-danger btn-block"> 
                </div>
                   </form>
                 </div>   
                </div>
            <footer></footer>
        </body>
     </html> 
    