<?php
    session_start();

   require_once("connect.php");
    
    $email = $_POST['txtuname'];
    $pass = $_POST['txtpass'];
    
    # Validate login credentials
    
    $result = mysqli_query($con," select * from _login where email='$email';") or die(" Error ");
    $data = mysqli_fetch_array($result);

    if( $data['email']==$email )
    {
        if($data['password']==md5($pass))
        {
            $_SESSION['uid']=$email;
            header('Location: ..\home.php') or die(" Error ");
        }
        
    }
        $_SESSION['login_error']=true;
        header("Location: ..\index.php") or die(" Error ");
    mysqli_close($con);
  

?>