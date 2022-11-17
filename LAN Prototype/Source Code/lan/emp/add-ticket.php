<?php
session_start();
include('includes/dbconnection.php');
include('includes/checklogin.php');
check_login();
if(isset($_POST['submit']))
  {
    $ttitle=$_POST['title'];
	$ttitle=mysqli_real_escape_string($con,$_POST['title']);
    $tdesc=$_POST['desc'];
	$tdesc= mysqli_real_escape_string($con,$_POST['desc']);
    $tprice=$_POST['price'];
    $tquantity=$_POST['quantity'];
    $tdatebegin=$_POST['datebegin'];
	$ttid=$_POST['ttid'];
	$evid=$_POST['evid'];
	$query=mysqli_query($con, "insert into ticket(Title,Description,Price,Quantity,DateBegin,TicketTypeID,EventID) value('$ttitle','$tdesc','$tprice','$tquantity','$tdatebegin','$ttid','$evid')");

    if ($query) {
    
     echo '<script>alert("Ticket has been added.")</script>';
	 echo"<script>window.location = 'manage-ticket.php';</script>";
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
    <title>Add Ticket - LAN Digital Arts Network</title>
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
                                        <h4 class="header-title">Add Ticket Detail</h4>
                                        <form method="post" enctype="multipart/form-data">
                                             <div class="form-group">
                                                <label for="exampleInputEmail1">Title</label>
                                                <input type="text" class="form-control" id="ttitle" name="title" aria-describedby="emailHelp" placeholder="Enter ticket title" value="" required="true">
                                            </div>
																						<div class="form-group">
											<label for="exampleInputEmail1">Ticket Type</label>
						<select id="ttid" name="ttid" class="form-control">
            <option value="">Select Ticket Type</option>
							<?php 
			$query=mysqli_query($con,"SELECT id,  AgeCategory from ticket_type order by ID");
			while ($row=mysqli_fetch_array($query)) {
							?>
			<option value="<?php echo $row['id'];?>"><?php echo $row['AgeCategory'];?>&nbsp;&nbsp;</option>
								<?php } ?>
        </select>
												</div>
																							<div class="form-group">
											<label for="exampleInputEmail1">Event</label>
						<select id="evid" name="evid" class="form-control">
            <option value="">Select Event</option>
							<?php 
			$query=mysqli_query($con,"SELECT id, Name from event order by Name");
			while ($row=mysqli_fetch_array($query)) {
							?>
			<option value="<?php echo $row['id'];?>"><?php echo $row['Name'];?>&nbsp;&nbsp;</option>
								<?php } ?>
        </select>
												</div>
                                              <div class="form-group">
                                                <label for="exampleInputEmail1">Price</label>
                                                <input type="text" class="form-control" id="price" name="price" aria-describedby="emailHelp" placeholder="Enter ticket price" value="" required="true">
                                            </div>
                                           
                                           <div class="form-group">
                                                <label for="exampleInputEmail1">Quantity</label>
                                                <input type="text" class="form-control" id="quantity" name="quantity" aria-describedby="emailHelp" placeholder="Enter ticket quantity" value="" required="true">
                                            </div> 
																						                                           <div class="form-group">
                                                <label for="exampleInputEmail1">Date Begin</label>
											<input type="date" class="form-control" id="datebegin" name="datebegin" aria-describedby="emailHelp" value=""
										   min="2020-01-01" max="2030-12-31" required="true">
											</div> 
											                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Description</label>
												<textarea class="form-control" id="desc" name="desc" rows="2">Enter ticket description</textarea>
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