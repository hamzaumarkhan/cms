<?php include('includes/db.php');?> 
<DOCTYPE html>
<html>
    <head>
        <title>CMS System</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
        <script src="bootstrap/css/bootstrap.css"</script>
        <script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
    </head>
    <body>
    <?php include('includes/header.php');?> 
        <div class="container">
            <articale class="row">
                <section class="col-lg-8">
                <?php
                if(isset($_GET['search_submit'])){
                    echo '
                    <div class="panel panel-default">
                        <div class="panel-body">
                        <h4 class="alert alert-success">You Searched for "'.$_GET['search'].'"</h4>
                        </div>
                    </div>
                    ';
                    $sel_sql = "SELECT * FROM posts WHERE title LIKE '%$_GET[search]%' OR description LIKE '%$_GET[search]%'";
                    $run_sql = mysqli_query($conn, $sel_sql);
                    while($rows = mysqli_fetch_assoc($run_sql)) {
                        echo'
                        <div class="panel panel-success">
                        <div class="panel-heading">
                                    <h3><a href="post.php?post_id"'.$rows['id'].'">'.$rows['title'].'</a></h3>
                                </div>
                            <div class="panel-body">
                                <div class="col-lg-4">
                                    <img src="images/img1.jpg" width="100%">
                                </div>
                                <div class="col-lg-8">
                                    <p>'.substr($rows['description'],0,150).'</p>
                                </div> 
                                <a href="post.php?post_id='.$rows['id'].'" class="btn btn-primary">Read More</a>
                            </div>
                        </div>
                       ';

                }
              
                    }
                ?>
               
                </section>
                <?php include 'includes/sidebar.php';?>
            </articale>
        </div>
        <div style="width:50px;height:50px"></div>
            <?php include 'includes/footer.php';?>
        
    </body>   
</html>