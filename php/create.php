<?php 
	session_start();
	require_once("connect.php");
	
	$uid = $_SESSION['uid'];
	
	# Extract Form values
	$fname = $_POST['txtfname'];
	$lname = $_POST['txtlname'];
	$mobile = $_POST['txtmobile'];
	$landline = $_POST['txtLandline'];
	$email = $_POST['txtemail'];
	$public = $_POST['txtpublic'];
	
	#echo $fname . $lname . $mobile . $landline . $email . $public;
	
	if( mysqli_query($con," insert into `$uid` values('$fname','$lname',$mobile,$landline,'$email','$public')"))
	{
		if($public == "yes")
			mysqli_query($con," insert into _public values('$fname','$lname',$mobile,$landline,'$email') ") or die(" Error in insertion of public");
			
		$_SESSION['insert_success']=1;
		header("Location: ..\create.php");
	}
	else
	{
		$_SESSION['insert_success']=0;
		header("Location: ..\create.php");
	}	
	mysqli_close($con);
?>