<?php
session_start();
include('includes/dbconnection.php');
include('includes/checklogin.php');
check_login();
if(isset($_POST['submit']))
  {
    $partid=$_GET['editid'];
    $acname=$_POST['name'];
    $accat=$_POST['cat'];
	$actype=$_POST['type'];
	$acsize=$_POST['size'];
	$acquantity=$_POST['quantity'];
	$acprice=$_POST['price'];
	$acdesc=$_POST['desc'];
	$acdesc= mysqli_real_escape_string($con,$_POST['desc']);
    $query=mysqli_query($con, "update art set Name='$acname',Category='$accat',Type='$actype',Size='$acsize',Quantity='$acquantity',Price='$acprice',Description='$acdesc' where ID='$partid'");
    if ($query) {
  
    echo '<script>alert("Art Bidding details has been updated.")</script>';
	echo"<script>window.location = 'manage-art-bidding.php';</script>";
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
    <title>Edit Art Bidding - LAN Digital Arts Network</title>
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
                                        <h4 class="header-title">Update Art Bidding Detail</h4>
                                        <form method="post" enctype="multipart/form-data">
                                            <?php
 $partid=$_GET['editid'];
$ret=mysqli_query($con,"SELECT a.ID as ArtID,a.Name as ArtName,a.Image as Image,a.Price as Price,a.Review as Review,a.Category as Category,a.Type as Type,a.Size as Size,a.Quantity as Quantity,a.Description as Description, ar.Name as ArtistName,CONCAT(FirstName, ' ', LastName) AS UserName FROM art a INNER JOIN artist ar ON a.ArtistID = ar.ID LEFT JOIN user u ON a.UserID = u.ID   where a.ID='$partid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
                                             <div class="form-group">
                                                <label for="exampleInputEmail1">Name</label>
                                                <input type="text" class="form-control" id="pname" name="name" aria-describedby="emailHelp" placeholder="Enter art name" value="<?php  echo $row['ArtName'];?>" required="true">
                                            </div>
                                       
                                           <div class="form-group">
                                                <label for="exampleInputEmail1">Image</label>
                                                <img src="/lan/images/<?php  echo $row['Image'];?>" width="100" height="100"> <a href="change-art-bidding-image.php?editid=<?php echo $row['ArtID'];?>"> &nbsp; Edit Image</a>
                                            </div>
                                           <div class="form-group">
                                                <label for="exampleInputEmail1">Category</label>
                                                <input type="text" class="form-control" id="cat" name="cat" aria-describedby="emailHelp" placeholder="Enter art category" value="<?php  echo $row['Category'];?>">
                                            </div> 
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Artist</label>
                                                <input type="text" class="form-control" id="artist" name="artist" aria-describedby="emailHelp" placeholder="Enter artist" value="<?php  echo $row['ArtistName'];?>" readonly>
                                            </div>
											                                            <div class="form-group">
                                                <label for="exampleInputEmail1">User</label>
                                                <input type="text" class="form-control" id="user" name="user" aria-describedby="emailHelp" placeholder="" value="<?php  echo $row['UserName'];?>" readonly>
                                            </div>
											                                           <div class="form-group">
                                                <label for="exampleInputEmail1">Type</label>
                                                <input type="text" class="form-control" id="type" name="type" aria-describedby="emailHelp" placeholder="Enter art type" value="<?php  echo $row['Type'];?>">
                                            </div> 
											                                           <div class="form-group">
                                                <label for="exampleInputEmail1">Quantity</label>
                                                <input type="text" class="form-control" id="quantity" name="quantity" aria-describedby="emailHelp" placeholder="Enter art quantity" value="<?php  echo $row['Quantity'];?>">
                                            </div> 
											                                           <div class="form-group">
                                                <label for="exampleInputEmail1">Size</label>
                                                <input type="text" class="form-control" id="size" name="size" aria-describedby="emailHelp" placeholder="Enter art size" value="<?php  echo $row['Size'];?>">
                                            </div> 
											                                           <div class="form-group">
                                                <label for="exampleInputEmail1">Price</label>
                                                <input type="text" class="form-control" id="price" name="price" aria-describedby="emailHelp" placeholder="Enter art price" value="<?php  echo $row['Price'];?>">
                                            </div> 
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Description</label>
												<textarea class="form-control" id="desc" name="desc" rows="2"><?php  echo $row['Description'];?></textarea>
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