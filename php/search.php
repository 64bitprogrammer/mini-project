<html>
	
<head>
	<link href="..\bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<script src="..\bootstrap/js/jquery-1.12.2.js"></script>
	<script src="..\bootstrap/js/bootstrap.min.js"></script>

		<!-- Date time picker attachement -->
		<link rel="stylesheet" href="..\bootstrap/css/datepicker.css">

	<!--	<script src="bootstrap/js/jquery-1.9.1.min.js"></script> -->

		<script src="..\bootstrap/js/bootstrap-datepicker.js"></script>
		<title> Results </title>
		


</head>
<body>
			<script>
			
			function f1()
			{
				alert("Done");
			}
			
			</script>
<?php

session_start();

require_once("connect.php");



list($key,$criteria) = split(":",$_POST['str']);
$uid = $_SESSION['uid'];

$result = mysqli_query($con," select fname, lname, mobile, email,landline from `$uid` where $criteria='$key' ") or die("Error " . mysql_error());

if(!$result || mysqli_num_rows($result)==0)
{
	?>
	<div class="text-danger"> No Results Found !</div>
	<?php
}
else
{
	?><table class="table table-bordered">
	<tr>
		<th> First Name</th>
		<th> Last Name</th>
		<th> Mobile Number</th>
		<th> Landline </th>	
		<th> Email </th>
	<tr>
	<?php
	while($data=mysqli_fetch_Array($result))
	{
		echo "<tr>";
		echo "<td> $data[0] </td> ";
		echo "<td> $data[1] </td> ";
		echo "<td> $data[2] </td> ";
		echo "<td> $data[4] </td> ";
		echo "<td> $data[3] </td> ";
		echo "<td> <form  method='post' action='update.php'> <button class='btn btn-default' name='btn' type='submit' value='".$data[2]."'>&nbsp;<span class='glyphicon glyphicon-pencil'></span>&nbsp;</button> </form></td>";
		echo "</tr>";
	}
	?></table><?php
}

mysqli_close($con);


 
?>


</body>
</html>