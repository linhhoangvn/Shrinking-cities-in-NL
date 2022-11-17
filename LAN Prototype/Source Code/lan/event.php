<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
?>
<!DOCTYPE HTML>
<html>
<head>
<title>LAN - Digital Arts Network | Event</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/bootstrap.js"></script>
<!--lightbox-->
<link rel="stylesheet" type="text/css" href="css/jquery.lightbox.css">
<script src="js/jquery.lightbox.js"></script>
<script>
  // Initiate Lightbox
  $(function() {
    $('.gallery a').lightbox(); 
  });
</script>
<!--lightbox-->
</head>
<body>
<?php include_once('includes/header.php');?>
		<div class="banner-header">
			<div class="container">
				<h2>Event</h2>
			</div>
			</div>
	<div class="content">
	<!--gallery-->
			<div class="gallery-section">
					<div class="container">
					<div class="welcome-grid">
				
			<?php 
			if (isset($_GET['pageno'])) {
            $pageno = $_GET['pageno'];
        } else {
            $pageno = 1;
        }
        // Formula for pagination
        $no_of_records_per_page = 4;
        $offset = ($pageno-1) * $no_of_records_per_page;
        $total_pages_sql = "SELECT COUNT(*) FROM event";
$ret1=mysqli_query($con,"select COUNT(*) from  event");
$total_rows = mysqli_fetch_array($ret1)[0];
$total_pages = ceil($total_rows / $no_of_records_per_page);
 $query=mysqli_query($con,"select * from event LIMIT $offset, $no_of_records_per_page");
 while ($row=mysqli_fetch_array($query)) {
 ?>
		<div class="panel panel-default search-result">
				<div class="panel-body">
					<div class="row">
										<div class="col-md-4">
						<img src="images/<?php echo $row['Image'];?>" width='50' height='500'/>
						</div>
						<div class="col-sm-8">
										<div class="panel-heading">
						<div class="wel-info">
						<h4><a href="event-details.php?id=<?php echo $row['ID'];?>"><?php echo $row['Name'];?></a></h4>
						</div>
				</div>
							<div class="details">
						<h4 style="padding-top: 20px"><p>Location: <?php echo $row['Location'];?></p></h3><br>
						<p>Start Date: <?php echo $row['StartDate'];?></p>
						<p>End Date: <?php echo $row['EndDate'];?></p>
						<br>
														<p class="description">
								<?php echo substr($row['Description'],0,500);?> .......
								</p>								
							</div>
						</div>
					</div>
				</div>
			</div><?php }?>
				
				<div class="clearfix"> </div>
			</div>
	<div align="center">
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
	<div align="center">
    <ul class="pagination" >
        <li><strong>Page <?php echo $pageno ; ?> / <?php echo $total_pages; ?></strong></li>
    </ul>
</div>
		</div>
	</div>
<!--gallery-->
<!--specials-->
		<?php include_once('includes/special.php');?>
			</div>
		<?php include_once('includes/footer.php');?>
			<script type="text/javascript">
	function toggleField(hideObj,showObj){
	  hideObj.disabled=true;        
	  hideObj.style.display='none';
	  showObj.disabled=false;   
	  showObj.style.display='inline';
	  showObj.focus();
	}
	</script>
</body>
</html>