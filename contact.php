    <?php include('includes/header.php');?> 
    <div class="container">
                <article class="row">
                  <section class="col-lg-8">
                        <div class="jumbotron">
                            <h2>Contact Us Form</h2>
                    </div>
                    <form class="form-horizontal" action="contact.php" method="post" role="form">
                        <div class="form-group ">
                            <lable for="name" class="col-sm-2 control-lable">Name</lable>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" placeholder="Insert your Name"  id="name">
                           </div>
                        </div>
                        <div class="form-group ">
                            <lable for="email" class="col-sm-2 control-lable">Email Address</lable>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" placeholder="Email Address"  id="email">
                           </div>
                        </div>
                        <div class="form-group ">
                            <lable for="subject" class="col-sm-2 control-lable">Subject</lable>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" placeholder="Subject "  id="subject">
                           </div>
                        </div>
                        <div class="form-group ">
                       
                        <div class="form-group ">
                            <lable for="comments" class="col-sm-2 control-lable ">Comment</lable>
                            <div class="col-sm-8">
                            <textarea class="form-control"  rows="8" style="resize:none;"></textarea>
                           </div>
                        </div>
                         <div class="form-group">
                             <lable  class="col-sm-2 control-lable "></lable>
                            <div class="col-sm-8">
                                <input type="submit" class="btn btn-block btn-"id="subject">
                              </div>
                            </div>
                        </form>            
                </section>
               <?php include 'includes/sidebar.php';?>
        </div>
        <div style="width:50px:height:50px;"></div> 
     <?php include 'includes/footer.php';?>
  