<?php
    
    if(isset($_POST['loginsubmit']))
    {
        
        $user=$_POST['username'];
        $pass=$_POST['password'];
    
     $con = mysqli_connect('localhost','root','','project');
     
     $Sql_Query = "select login_id,usertype from login where username='$user' and password='$pass'";
     $result=mysqli_query($con,$Sql_Query);
     $row=mysqli_fetch_array($result);
     if(mysqli_num_rows($result)==0)
     {
    
     echo "<script>window.alert('invalid username or password');</script>";
     }
     else
     {
      session_start();
      $_SESSION['login_id']=$row['login_id'];
    
       if($row['usertype']=='admin')
       {
        echo "<script>window.location='admin_dashboard.php';</script>";
        exit;
       }
       else if($row['usertype']=='user')
       {
        echo "<script>window.location='user_dashboard.php';</script>";
        exit;
       }
      
     }
     mysqli_close($con);
    }


    ?>



<!DOCTYPE html
<html>
    <head>
        <title>NFCS Login</title>
        <link href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/css/bootstrap.min.css' rel='stylesheet' type='text/css'>
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="log.css">

</head>
        <body>
        <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-2"></div>
            <div class="col-lg-6 col-md-8 login-box">
                <div class="col-lg-12 login-key">
                    <i class="fa fa-key" aria-hidden="true"></i>
                </div>
                <div class="col-lg-12 login-title">
                    NFCS Login
                </div>
 
                <div class="col-lg-12 login-form">
                    <div class="col-lg-12 login-form">
                        <form method="POST">
                            <div class="form-group">
                                <label class="form-control-label">USERNAME</label>
                                <input type="text" name="username" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">PASSWORD</label>
                                <input type="password"  name="password" class="form-control" i>
                            </div>
 
                            <div class="col-lg-12 loginbttm">
                                <div class="col-lg-6 login-btm login-text">
                                    <!-- Error Message -->
                                </div>
                                <div class="col-lg-6 login-btm login-button">
                                    <input type="submit" id="login" name="loginsubmit" class="btn btn-outline-primary">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-3 col-md-2"></div>
            </div>
        </div> 
</body>
</html>



