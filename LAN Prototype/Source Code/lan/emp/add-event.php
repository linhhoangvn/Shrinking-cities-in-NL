<?php
session_start();
include('includes/dbconnection.php');
include('includes/checklogin.php');
check_login();
if(isset($_POST['submit']))
  {
    $evname=$_POST['name'];
	$evname=mysqli_real_escape_string($con,$_POST['name']);
	$evimg=$_FILES["image"]["name"];
	$sdate=$_POST['sdate'];
	$edate=$_POST['edate'];
	$evloc=$_POST['loc'];
	$evdesc=$_POST['desc'];
	$evdesc= mysqli_real_escape_string($con,$_POST['desc']);
	$extension = substr($evimg,strlen($evimg)-4,strlen($evimg));
	$allowed_extensions = array(".jpg","jpeg",".png",".gif");
if(!in_array($extension,$allowed_extensions))
{
echo "<script>alert('Image has Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
}
else
{	
$evimg=md5($evimg).time().$extension;
move_uploaded_file($_FILES["image"]["tmp_name"],$_SERVER['DOCUMENT_ROOT']."/lan/images/".$evimg);
$query=mysqli_query($con, "insert into event(Name,Image,StartDate,EndDate,Location,Description) value('$evname','$evimg','$sdate','$edate','$evloc','$evdesc')");

    if ($query) {
    
     echo '<script>alert("Event has been added.")</script>';
	 	 echo"<script>window.location = 'manage-event.php';</script>";
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
    <title>Add Event - LAN Digital Arts Network</title>
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
                                        <h4 class="header-title">Add Event</h4>
                                        <form method="post" enctype="multipart/form-data">
                                             <div class="form-group">
                                                <label for="exampleInputEmail1">Name</label>
                                                <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp" placeholder="Enter event name" value="" required="true">
                                            </div>
                                         <div class="form-group">
                                                <label for="exampleInputEmail1">Image</label>
                                                <input type="file" class="form-control" id="image" name="image" aria-describedby="emailHelp" value="" required="true"> 
                                            </div>
												<div class="form-group">
                                                <label for="exampleInputEmail1">StartDate</label>
											<input type="date" class="form-control" id="sdate" name="sdate" aria-describedby="emailHelp" value=""
										   min="2020-01-01" max="2030-12-31" required="true">
											</div> 
																						                                           <div class="form-group">
                                                <label for="exampleInputEmail1">EndDate</label>
                                            <input type="date" class="form-control" id="edate" name="edate" aria-describedby="emailHelp" value=""
										   min="2020-01-01" max="2030-12-31" required="true">
                                            </div> 
                                           <div class="form-group">
                                                <label for="exampleInputEmail1">Location</label>
                                                <input type="text" class="form-control" id="loc" name="loc" aria-describedby="emailHelp" placeholder="Enter location of event" value="" required="true">
                                            </div> 											
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Description</label>
												<textarea class="form-control" id="desc" name="desc" rows="2">Enter description of event</textarea>
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
	<script type="text/javascript">
	function toggleField(hideObj,showObj){
	  hideObj.disabled=true;        
	  hideObj.style.display='none';
	  showObj.disabled=false;   
	  showObj.style.display='inline';
	  showObj.focus();
	}
	</script>
	<script type="text/javascript">
	var today = new Date();
var dd = today.getDate();
var mm = today.getMonth()+1; //January is 0!
var yyyy = today.getFullYear();
 if(dd<10){
        dd='0'+dd
    } 
    if(mm<10){
        mm='0'+mm
    } 

today = yyyy+'-'+mm+'-'+dd;
document.getElementById("sdate").setAttribute("min", today);
document.getElementById("edate").setAttribute("min", today);
</script>
</body>
</html>