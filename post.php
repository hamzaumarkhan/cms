<?php include('includes/db.php');?>
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
                    <li class="active"><a href="#">Home</a><li>
                    <li><a href="#">Articles</a><li>
                    <li><a href="#">Contact Us</a><li>
                    <li><a href="#">Log Out</a><li>
                </ul>
            </div>
        </header>
        <div class="conntainer">
            <articale class="row">
                <section class="col-lg-8">
                <?php
                    $sel_sql = "SELECT * FROM posts WHERE id = '$_GET[post_id]'";
                    $run_sql = mysqli_query($conn,$sel_sql);
                    while($rows = mysqli_fetch_assoc($run_sql)) {
                            echo '
                            <div class="panel panel-default">
                                <div class="panel-body">
                                  <div class="panel-header">
                                    <h2><a'.$rows['title'].'</h2>
                                    </div>
                                    <img src="'.$rows['image'].'"width="100%">
                                    <p>'.$rows['description'].'</p>
                             </div>
                        </div>
                        ';
                    }
                ?>
                    
                </section>
                <?php include 'includes/sidebar.php';?>
            </articale>
        </div>
        <footer class="navbar navbar-default navbar-fixed-bottom">
            <div class="container">
                <p class="navbar-text pull-left">Created by Hamza Umar</p>
                <a heref="#" class="btn btn-success pull-right navbar-btn">Share</a>
        </footer>    
    </body>   
</html>
