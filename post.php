<?php include 'includes/header.php';?>
        <div class="conntainer">
            <articale class="row">
                <section class="col-lg-8">
                <?php
                    if(isset($_GET['post_id'])) {
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
                    } else {
                       echo '<div class="alert alert-danger">No Post You&apos;ve selected to show!<a href="index.php">Click Here</a>t to Select a Post</div>';
                    }
                   
                ?>
                    
                </section>
                <?php include 'includes/sidebar.php';?>
            </articale>
        </div>
 <?php include 'includes/footer.php';?>
