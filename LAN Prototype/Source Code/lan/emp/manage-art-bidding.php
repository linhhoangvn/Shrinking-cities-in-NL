<?php  
session_start();
include('includes/dbconnection.php');
include('includes/checklogin.php');
check_login();
if(isset($_GET['del']))
{
	$id=intval($_GET['del']);
    $query=mysqli_query($con, "delete from art where id=$id");
    if ($query) {
           echo "<script>alert('Art Bidding deleted');</script>" ;
  }
}
?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Manage Art Bidding - LAN Digital Arts Network</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/metisMenu.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/slicknav.min.css">
    <!-- amcharts css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- Start datatable css -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">
    <!-- style css -->
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
                    <!-- data table start -->
                    <div class="col-12 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">Manage Art Bidding</h4>
                                <div class="data-tables">
                <table class="table text-center">
                                        <thead class="bg-light text-capitalize">
                                            <tr>
                                                <th>ACID</th>
                                                <th>Name</th>
                                                <th>Image</th>
												<th>Artist</th>
												<th>User</th>
												<th>Category</th>
												<th>Price</th>
												<th>Review</th>
												<th>StartDate</th>
												<th>EndDate</th>
												<th>CreationDate</th>
												<th>LastUpdate</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <?php
if (isset($_GET['pageno'])) {
            $pageno = $_GET['pageno'];
        } else {
            $pageno = 1;
        }
        // Formula for pagination
        $no_of_records_per_page = 10;
        $offset = ($pageno-1) * $no_of_records_per_page;
        $total_pages_sql = "SELECT COUNT(*) FROM art a INNER JOIN artist ar ON a.ArtistID = ar.ID WHERE a.Review = 0 OR a.Review = 1";
$ret1=mysqli_query($con,"SELECT COUNT(*) FROM art a INNER JOIN artist ar ON a.ArtistID = ar.ID WHERE a.Review = 0 OR a.Review = 1");
$total_rows = mysqli_fetch_array($ret1)[0];
$total_pages = ceil($total_rows / $no_of_records_per_page);
 $query=mysqli_query($con,"SELECT a.ID as ArtID,a.Name as ArtName,a.Price as Price,Category,a.Review as Review,ab.StartDate,ab.EndDate,a.CreationDate,a.LastUpdate, ar.Name as ArtistName,CONCAT(FirstName, ' ', LastName) AS UserName,Image FROM art a INNER JOIN artist ar ON a.ArtistID = ar.ID INNER JOIN art_bidding ab ON a.ID = ab.ArtID LEFT JOIN user u ON a.UserID = u.ID WHERE a.Review = 0 OR a.Review = 1 ORDER BY a.ID LIMIT $offset, $no_of_records_per_page");
 while ($row=mysqli_fetch_array($query)) {

?>
                                        <tbody>
          <tr data-expanded="true">
            <td><?php  echo $row['ArtID'];?></td>
                  <td><?php  echo $row['ArtName'];?></td>
				  <td> <img src="/lan/images/<?php echo $row['Image'];?>" width='50' height='50' alt=" " class="img-responsive" /></td>
				  <td><?php  echo $row['ArtistName'];?></td>
				  <td><?php  echo $row['UserName'];?></td>
				  <td><?php  echo $row['Category'];?></td>
				  <td><?php  echo $row['Price'];?></td>
<td><?php  
				  if($row['Review'] == '0')
{
echo "<b style='color:red'>UNCHECKED</b>";
}
else
{
echo "<b style='color:green'>CHECKED</b>";
}
				  ?></td>
				  <td><?php  echo $row['StartDate'];?></td>
				  <td><?php  echo $row['EndDate'];?></td>
                  <td><?php  echo $row['CreationDate'];?></td>
				  <td><?php  echo $row['LastUpdate'];?></td>
				  <td><a href="edit-art-bidding-details.php?editid=<?php echo $row['ArtID'];?>"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;
					<a onClick="return confirm('Are you sure you want to delete?')" href="manage-art-bidding.php?del=<?php echo $row['ArtID'];?>"><i class="fa fa-close"></i></a></td>
                </tr>
                <?php 
$cnt=$cnt+1;
}?>
 </tbody>
                                    </table>
																		    <ul class="pagination" >
        <li><a href="?pageno=1"><strong>First></strong></a></li>
        <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
            <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>"><strong style="padding-left: 10px">Prev></strong></a>
        </li>
        <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
            <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>"><strong style="padding-left: 10px">Next></strong></a>
        </li>
        <li><a href="?pageno=<?php echo $total_pages; ?>"><strong style="padding-left: 10px">Last</strong></a></li>
    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- data table end -->
                   
                    
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

    <!-- Start datatable js -->
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>
    <!-- others plugins -->
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/scripts.js"></script>
</body>

</html>
