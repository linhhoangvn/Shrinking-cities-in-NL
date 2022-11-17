<?php
session_start();
include('includes/dbconnection.php');
include('includes/checklogin.php');
check_login();
  ?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>LAN User Control Panel | Dashboard</title>
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
    <?php include_once('includes/sidebar.php');?>
    <!-- page container area start -->
    <div class="page-container">
        <!-- sidebar menu area start -->
     
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
                <!-- report area start -->
                <div class="sales-report-area sales-style-two">
                    <div class="row">
									 <?php if($_SESSION['lanusertype']=='1')
{ ?>			
											                        <div class="col-xl-3 col-ml-3 col-md-6 mt-5">
                            <div class="single-report">
                                <div class="s-sale-inner pt--30 mb-3">
                                    <div class="s-report-title d-flex justify-content-between">
                                        <?php
//total art collection
		$userid=$_SESSION['lanuserid'];
 $query=mysqli_query($con,"select count(*) as totalac from art where review is null AND UserID='$userid'");
$result=mysqli_fetch_array($query);
$count_total_ac=$result['totalac'];
 ?>  
                                        <h3 class="header-title mb-0">Total number of Art Collection</h3>
                                       <p style="font-size: 20px;color: red"><?php echo $count_total_ac?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
						<?php }
?>	
					
						                        <div class="col-xl-3 col-ml-3 col-md-6 mt-5">
                            <div class="single-report">
                                <div class="s-sale-inner pt--30 mb-3">
                                    <div class="s-report-title d-flex justify-content-between">
                                        <?php
//total art bidding
		$userid=$_SESSION['lanuserid'];
 $query=mysqli_query($con,"select count(*) as totalab from art where review = 0 or review = 1 AND UserID='$userid'");
$result=mysqli_fetch_array($query);
$count_total_ab=$result['totalab'];
 ?>  
                                        <h4 class="header-title mb-0">Total number of Art Bidding</h4>
                                        <p style="font-size: 20px;color: red"><?php echo $count_total_ab?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
						
						                        <div class="col-xl-3 col-ml-3 col-md-6  mt-5">
                            <div class="single-report">
                                <div class="s-sale-inner pt--30 mb-3">
                                    <div class="s-report-title d-flex justify-content-between">
                                        <?php
//total art order
		$userid=$_SESSION['lanuserid'];
 $query=mysqli_query($con,"select count(*) as totalao from art_order where UserID='$userid'");
$result=mysqli_fetch_array($query);
$count_total_ao=$result['totalao'];
 ?>
                                        <h4 class="header-title mb-0">Total number of Art Order</h4>
                                        <p style="font-size: 20px;color: red"><?php echo $count_total_ao?></p>
                                    </div>
                                </div>
            
                            </div>
                        </div>
						

						                        <div class="col-xl-3 col-ml-3 col-md-6 mt-5">
                            <div class="single-report">
                                <div class="s-sale-inner pt--30 mb-3">
                                    <div class="s-report-title d-flex justify-content-between">
                                        <?php
		$userid=$_SESSION['lanuserid'];
 $query=mysqli_query($con,"select count(*) as totalbid from bid where UserID='$userid'");
$result=mysqli_fetch_array($query);
$count_total_bid=$result['totalbid'];
 ?>
                                        <h4 class="header-title mb-0">Total number of Bid</h4>
                                        <p style="font-size: 20px;color: red"><?php echo $count_total_bid?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- report area end -->
             
                
            </div>

        </div>
        <!-- main content area end -->
        <!-- footer area start-->
       <?php include_once('includes/footer.php');?>
        <!-- footer area end-->
    </div>
    <!-- page container area end -->
    <!-- offset area start -->
 
    <!-- offset area end -->
    <!-- jquery latest version -->
    <script src="assets/js/vendor/jquery-2.2.4.min.js"></script>
    <!-- bootstrap 4 js -->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/metisMenu.min.js"></script>
    <script src="assets/js/jquery.slimscroll.min.js"></script>
    <script src="assets/js/jquery.slicknav.min.js"></script>

    <!-- start chart js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
    <!-- start highcharts js -->
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <!-- start zingchart js -->
    <script src="https://cdn.zingchart.com/zingchart.min.js"></script>
    <script>
    zingchart.MODULESDIR = "https://cdn.zingchart.com/modules/";
    ZC.LICENSE = ["569d52cefae586f634c54f86dc99e6a9", "ee6b7db5b51705a13dc2339db3edaf6d"];
    </script>
    <!-- all line chart activation -->
    <script src="assets/js/line-chart.js"></script>
    <!-- all bar chart activation -->
    <script src="assets/js/bar-chart.js"></script>
    <!-- all pie chart -->
    <script src="assets/js/pie-chart.js"></script>
    <!-- others plugins -->
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/scripts.js"></script>
</body>

</html>