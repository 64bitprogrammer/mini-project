<?php 

	session_start();
	
	require_once("connect.php");
	
	$email= $_POST['txtemail'];
	$dob= $_POST['txtdob'];
	$sq= $_POST['sq'];
	$sa= $_POST['sa'];
	$newpass=md5( $_POST['txtpwd']);
	
	#echo $email . $dob . $sq . $sa . $newpass;	
	$result = mysqli_query($con," select email,dob,secquestion,secanswer from _login where email = '$email' ") or die(mysql_error($con));
	if($data=mysqli_fetch_row($result))
	{
		if($data[0]==$email && $data[1]==$dob && $data[2]==$sq && $data[3]==$sa)
		{
			mysqli_query($con," update _login set password='$newpass' where email='$email' ") or die("Error: Update Failed !");
			$_SESSION['recover_success']=true;
		}
		else
			$_SESSION['recover_error']=true;
			
	}
	else
		$_SESSION['recover_error']=true;
		
	header("location: ..\index.php");
	
	mysqli_close($con);

?>