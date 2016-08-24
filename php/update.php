<?php
	session_start();
	require_once("connect.php");
	$uid = $_SESSION['uid'];
	
	$fname=$_POST['txtfname'];
	$lname=$_POST['txtlname'];
	$mobile=$_SESSION['btn'];
	$landline=$_POST['txtlandline'];
	$email=$_POST['txtemail'];
	
	$res=mysqli_query($con," update `$uid` set fname='$fname',lname='$lname',email='$email', landline=$landline where mobile=$mobile ") or die("UPdate failed"+mysql_error($con));
	if($res!=0)
	{
		$_SESSION['update_success']=true;
		header("location:../home.php");
		mysqli_close($con); 
	}
	else
		echo "Update Failed : Error in query";
	
?>