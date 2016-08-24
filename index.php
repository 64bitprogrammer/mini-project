<?php
	session_start();
	unset($_SESSION['uid']);
	$login_error= null;
	$recover_error_var=null;
	$recover_success_var=null;
	if(isset($_SESSION['login_error']))
	{
		$login_error = " Invalid Username / Password ! " ;
		session_unset();
		session_destroy();
	}
	if(isset($_SESSION['recover_error']))
	{
		$recover_error_var = "Error: Try Again !";
		unset($_SESSION['recover_error']);
	}
	if(isset($_SESSION['recover_success']))
	{
		$recover_success_var= " Password Successfully Reset !";
		unset($_SESSION['recover_success']);
	}
?>

<html>
	
<head>
	
	
	

	<link href="bootstrap/global.css" rel="stylesheet" >
	 

	
		<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<script src="bootstrap/js/jquery-1.12.2.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="bootstrap/css/datepicker.css">
	<script src="bootstrap/js/bootstrap-datepicker.js"></script>
	
		
		<title> Log-In </title>

	<script type="text/javascript">
		// When the document is ready
		$(document).ready(function () {

			$('#txtdatepicker').datepicker({
				format: "dd/mm/yyyy"
			});

		});
		
		function validatePassword()
		{

				var x = document.getElementById('pwd1').value;
				var y = document.getElementById('pwd2').value;

				if(x == y)
				{
					return true;
				}
				else
				{
					alert(" Passwords Do Not Match !");
					return false;
				}
				
		}
	</script>
</head>
		
<body >

    <nav class="navbar navbar-inverse">
	
		<div class="container-fluid">
		
			<!-- Logo -->
			<div class="navbar-header">
				<a hre="#" class="navbar-brand" /> ByteMe Directory </a>
			</div>
			
			<!-- Menu on the right -->
			
				<ul class="nav navbar-nav navbar-right">
				
					<li> <a href="public_search.php"> <strong> SEARCH &nbsp;<span class="glyphicon glyphicon-search"></span></strong> </a> </li>
					<li> <a href="signup.php"> SIGN-UP </a> </li>
				
				</ul>
			
			</div>
			
		</div>
		
	</nav>
   
   <div class="container-fluid">
         
    <div class="row">

		<div class="col-xs-4" >

		<p>

		</p>

		</div>

		<div class="col-xs-4" style="background-color:rgba(202, 205, 205, 0.100) " id="menu">
			<?php

				if(isset($_SESSION['success']))
            	{
            					?> <div class="alert alert-success">
                                  <a href="#" class="close" data-dismiss="alert" aria-label="close" hide="true" id="xxx">&times;</a>
                                  <strong text-align="center">Success: You have been successfully registered !</strong>
                                </div>
                                <?php
                                session_destroy();
            	}

            ?>

			<div align="center" class="mylogin">
				<br/>
			<h1> <strong>LOG-IN </strong></h1>
			<br/><span class="text-danger" ><?php echo $login_error; ?> </span>
			<br/><span class="text-danger" ><?php echo $recover_error_var; ?> </span>
			<br/><span class="text-success" ><?php echo $recover_success_var; ?> </span>
			<form method="post" action="php/login.php" role="form">
			<br/><br/>
			<input type="email" class="form-control" name="txtuname" placeholder="Enter Your Email" aria-describedby="basic-addon1" required> <br/><br/>
			<input type="password" class="form-control" name="txtpass" placeholder="Enter Your Password" aria-describedby="basic-addon1" required><br/><br/> <br/>
			<input class="btn btn-primary btn-lg" type="submit" name="btnsub" value="Login"  style=" width:100%"/><br/><br/>

			</form>
			<button class="btn btn-danger btn-lg"  data-toggle="modal" data-target="#popUpWindow"  name="btnsub" style=" width:100%"> Forgot Password </button>
			</div>
			
		</div>
         
		<div class="col-xs-4" >

			<div class="modal fade" id="popUpWindow">

				<div class="modal-dialog">

					<div class="modal-content">

						<div class="modal-header"> <button class="close" data-dismiss="modal"> &times; </button>
						<h2> Recover Account </h2>
						</div>

						<div class="modal-body">

							<!-- Forgot Password Form -->

							<form role="form" method="post" action="php/forgot.php" onsubmit="return validatePassword()">
                            			<div class="form" align="center">

                            			<br/><br/>

                            			<input type="email" class="form-control" name="txtemail"  placeholder="Enter Your Email Address" aria-describedby="basic-addon1" required ><br/><br/>
                            			<input  type="text" class="form-control" name="txtdob" Placeholder="Enter DOB [ DD/MM/YYYY ]"  id="txtdatepicker" required > <br/><br/>
                            			<select class="form-control"  id="sel1" name="sq" data-toggle="tooltip" title="Select Your Security Question" >
                            				<option>Whats your mothers maiden name?</option>
                            				<option>What is your nickname?</option>
                            				<option>Whats your favorite hobby?</option>
                            				<option>Whats was your first gift ever?</option>
                            				<option>Your best friends name?</option>
                            			</select><br/><br/>

                            			<input type="text" name="sa" class="form-control" placeholder="Your Answer"  required  /> <br/><br/>
										<input type="password"  id="pwd1" class="form-control" name="txtpwd" required placeholder="Enter New Password "/><br/><br/>
										<input type="password"  id="pwd2" class="form-control" name="txtcpwd" required placeholder="Confirm Password "/>
										
                            			</div>

                            			</div>

						<div class="modal-footer">
							<input class="btn btn-primary btn-lg" type="submit" name="btnsubmit" value="Reset Password"  style=" width:auto"/><br/>
							</form>
						</div>

					</div>

				</div>

			</div>
			
		</div>
       
    </div>
     
    </div>
 
   
</body>
	
</html>