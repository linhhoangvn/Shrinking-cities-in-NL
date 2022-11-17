<?php
session_start();
include('includes/dbconnection.php');
include('includes/checklogin.php');
check_login();
    if(isset($_POST['submit']))
  {
    $id=$_SESSION['lanuserid'];
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
     $query=mysqli_query($con, "update user set FirstName='$fname',LastName='$lname' where ID='$id'");
    if ($query) {
    
    echo '<script>alert("Profile has been updated")</script>';
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
    <title>User Profile - LAN Digital Arts Network</title>
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
                                        <h4 class="header-title">Profile</h4>

   <?php
$id=$_SESSION['lanuserid'];
$ret=mysqli_query($con,"select * from user where ID='$id'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
                                        <form method="post" action="">
                                             <div class="form-group">

                                                <label for="exampleInputEmail1">First Name</label>
                                                <input type="text" class="form-control" id="fname" name="fname" aria-describedby="emailHelp" placeholder="First Name" value="<?php  echo $row['FirstName'];?>">
                                                
                                            </div>
 <div class="form-group">

                                                <label for="exampleInputEmail1">Last Name</label>
                                                <input type="text" class="form-control" id="lname" name="lname" aria-describedby="emailHelp" placeholder="First Name" value="<?php  echo $row['LastName'];?>">
                                                
                                            </div>
                                            <div class="form-group">

                                                <label for="exampleInputEmail1">Account Type</label>
                                                <input type="text" class="form-control" id="acctype" name="acctype" aria-describedby="emailHelp" readonly="true" value="<?php  
				  if($row['Type'] == '1')
{
echo "Organisation";
}
else
{
echo "Individual";
}
				  ?>">
                                                
                                            </div>

                                            <div class="form-group">

                                                <label for="exampleInputEmail1">Email address</label>
                                                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" readonly="true" value="<?php  echo $row['Email'];?>">
                                                <small id="emailHelp" class="form-text text-muted">We'll never share your
                                                    email with anyone else.</small>
                                            </div>
                                         
                                            <?php }  ?>
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