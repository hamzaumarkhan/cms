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
       echo $result = '';
    if(isset($_POST['update_category'])) {
        $category = strip_tags($_POST['category']);
       //$sql = "INSERT INTO category (category_name) VALUES ('category')";
       $sql = "UPDATE category SET category_name = '$category' WHERE c_id = $_POST[cat_id]";
        if(mysqli_query($conn,$sql)) {
           header('Location: category_list.php');
        }
    }

?>
<DOCTYPE html>
<html>
<head>
        <title>Admin Panel</title>
        <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
        <script  src="bootstrap/js/jquery.js"></script>
        <script  src="bootstrap/js/bootstrap.js"></script>
        <script src="tinymce.cachefly.net/4.2/tinymce.min.js"></script>
        <script tinymce.init((selector:'textarea'));</script>
    </head>
    
<?php include 'includes/header.php';?>
        <div style="width:50px;height:50px;"></div>
    <body class="container-fluid">
    <?php include 'includes/sidebar.php';?>
        <div class="col-lg-10">
        <?php echo $result; ?>
        <?php
             if(isset($_GET['cat_id'])) { 
                    $sql = "SELECT * FROM category WHERE c_id = '$_GET[cat_id]'";
                    $run = mysqli_query($conn,$sql);
                    while($rows = mysqli_fetch_assoc($run)) {
                ?>
                <div style="width:50px;height:50px;"></div> 
                <div class="page-header"><h1>Edit Category</h1></div>
                <div class="container-fluid">
                    <form class="form-horizontal col-lg-5"action="edit_category.php" method="post">
                            <div class="form-group">
                            <input type="hidden" name="cat_id" value="<?php echo $_GET['cat_id'];?>">
                                <lable for="category">Category Name</lable>
                                <input id="category" type="text" value="<?php echo $rows['category_name']; ?>" name="category" class="form-control"> 
                            </div>
                            <div class="form-group">
                                <input type="submit" name="update_category" class="btn btn-danger btn-block"> 
                        </div>
                    </form>
                </div>   
           <?php  }
                } else {
               echo $result = '<div class="alert alert-danger">Please Sdelect a Category</div>';
            }
        ?>

            </div>
        <footer></footer>
    </body>
</html> 


     


           
       
           

       
          

                 
     