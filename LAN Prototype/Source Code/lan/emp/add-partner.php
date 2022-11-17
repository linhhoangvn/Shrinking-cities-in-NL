<?php
session_start();
include('includes/dbconnection.php');
include('includes/checklogin.php');
check_login();
if(isset($_POST['submit']))
  {
	$aid=$_SESSION['lanempid'];
    $mname=$_POST['mname'];
    $mcat=$_POST['mcat'];
    $madd=$_POST['madd'];
    $desc=$_POST['desc'];
	$desc= mysqli_real_escape_string($con,$_POST['desc']);
   $mimg=$_FILES["image"]["name"];
$extension = substr($mimg,strlen($mimg)-4,strlen($mimg));
$allowed_extensions = array(".jpg","jpeg",".png",".gif");
if(!in_array($extension,$allowed_extensions))
{
echo "<script>alert('Image has Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
}
else
{	
$mimg=md5($mimg).time().$extension;
move_uploaded_file($_FILES["image"]["tmp_name"],$_SERVER['DOCUMENT_ROOT']."/lan/images/".$mimg);
$query=mysqli_query($con, "insert into  partner(Name,Category,Address,Description,Image,EmpID) value('$mname','$mcat','$madd','$desc','$mimg','$aid')");

    if ($query) {
    
     echo '<script>alert("Partner has been added.")</script>';
	 echo"<script>window.location = 'manage-partner.php';</script>";
  }
  else
    {
       echo '<script>alert("Something Went Wrong. Please try again.")</script>';
    }
}
}
  ?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Add Partner - LAN Digital Arts Network</title>
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
                                        <h4 class="header-title">Add Partner</h4>
                                        <form method="post" enctype="multipart/form-data">
                                             <div class="form-group">
                                                <label for="exampleInputEmail1">Name</label>
                                                <input type="text" class="form-control" id="mname" name="mname" aria-describedby="emailHelp" placeholder="Enter partner name" value="" required="true">
                                            </div>
                                         <div class="form-group">
                                                <label for="exampleInputEmail1">Image</label>
                                                <input type="file" class="form-control" id="image" name="image" aria-describedby="emailHelp" value="" required="true">
                                                
                                            </div>
                                           
                                           <div class="form-group">
                                                <label for="exampleInputEmail1">Category</label>
                                                <input type="text" class="form-control" id="mcat" name="mcat" aria-describedby="emailHelp" placeholder="Enter category of partner" value="" required="true">
                                            </div> 
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Address</label>
                                                <input type="text" class="form-control" id="madd" name="madd" aria-describedby="emailHelp" placeholder="Enter address of partner" value="" required="true">
                                            </div>
  
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Description</label>
												<textarea class="form-control" id="desc" name="desc" rows="2">Enter description of partner</textarea>
                                            </div>
                                            <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4" name="submit">Submit</button>
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