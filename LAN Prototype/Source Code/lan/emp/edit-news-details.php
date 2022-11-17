<?php
session_start();
include('includes/dbconnection.php');
include('includes/checklogin.php');
check_login();
if(isset($_POST['submit']))
  {
    $partid=$_GET['editid'];
    $pname=$_POST['pname'];
	$pname= mysqli_real_escape_string($con,$_POST['pname']);
    $cat=$_POST['cat'];
	$desc= mysqli_real_escape_string($con,$_POST['desc']);
    $query=mysqli_query($con, "update news set Title='$pname',Category='$cat',Content='$desc' where ID='$partid'");
    if ($query) {
  
    echo '<script>alert("News details has been updated.")</script>';
	echo"<script>window.location = 'manage-news.php';</script>";
  }
  else
    {
      echo '<script>alert("Something Went Wrong. Please try again.")</script>';
    }
} 
  ?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Edit News - LAN Digital Arts Network</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/metisMenu.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/slicknav.min.css">
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- others css -->
    <link rel="stylesheet" href="assets/css/typography.css">
    <link rel="stylesheet" href="assets/css/default-css.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <!-- modernizr css -->
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
    <script src="/lan/js/nicEdit/nicEdit-latest.js" type="text/javascript"></script>
<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
</head>

<body>
    
    <!-- page container area start -->
    <div class="page-container">
        <!-- sidebar menu area start -->
     <?php include_once('includes/sidebar.php');?>
        <!-- sidebar menu area end -->
        <!-- main content area start -->
        <div class="main-content">
            <!-- header area start -->
          <?php include_once('includes/header.php');?>
            <!-- header area end -->
            <!-- page title area start -->
           <?php include_once('includes/pagetitle.php');?>
            <!-- page title area end -->
            <div class="main-content-inner">
                <div class="row">
          
                    <div class="col-lg-12 col-ml-12">
                        <div class="row">
                            <!-- basic form start -->
                            <div class="col-12 mt-5">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title">Update News Detail</h4>
                                        <form method="post" enctype="multipart/form-data">
                                            <?php
 $partid=$_GET['editid'];
$ret=mysqli_query($con,"select * from news where ID='$partid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
                                             <div class="form-group">
                                                <label for="exampleInputEmail1">Title</label>
                                                <input type="text" class="form-control" id="pname" name="pname" aria-describedby="emailHelp" placeholder="Enter news title" value="<?php  echo $row['Title'];?>" required="true">
                                            </div>
                                       
                                           <div class="form-group">
                                                <label for="exampleInputEmail1">Image</label>
                                                <img src="/lan/images/<?php  echo $row['Image'];?>" width="100" height="100"> <a href="change-news-image.php?editid=<?php echo $row['ID'];?>"> &nbsp; Edit Image</a>
                                            </div>
                                           <div class="form-group">
                                                <label for="exampleInputEmail1">Category</label>
                                                <input type="text" class="form-control" id="cat" name="cat" aria-describedby="emailHelp" placeholder="Enter news category" value="<?php  echo $row['Category'];?>">
                                            </div> 
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Content</label>
												<textarea class="form-control" id="desc" name="desc" rows="2"><?php  echo $row['Content'];?></textarea>
                                            </div>
                                            <?php } ?>
                                            <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4" name="submit">Update</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- basic form end -->
                         
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- main content area end -->
        <!-- footer area start-->
        <?php include_once('includes/footer.php');?>
        <!-- footer area end-->
    </div>
    <!-- page container area end -->
    <!-- offset area start -->
    
    <!-- jquery latest version -->
    <script src="assets/js/vendor/jquery-2.2.4.min.js"></script>
    <!-- bootstrap 4 js -->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/metisMenu.min.js"></script>
    <script src="assets/js/jquery.slimscroll.min.js"></script>
    <script src="assets/js/jquery.slicknav.min.js"></script>

    <!-- others plugins -->
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/scripts.js"></script>
</body>

</html>