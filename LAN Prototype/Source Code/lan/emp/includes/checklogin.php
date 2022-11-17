<?php
function check_login()
{
if(strlen($_SESSION['lanempid'])==0)
	{	
		header("Location: index.php");
	}
}

function check_emptype()
{
	if($_SESSION['lanemptype']!='1')
	{
		echo"<script>alert('You dont have permission to access in this area');</script>";
		header("Location: index.php");
	}	
}

?>