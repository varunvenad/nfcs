<!DOCTYPE html
<html>
    <head>
        <title>NFCS Registration</title>
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
                <div class="col-lg-12">
                    <i class="fa fa-key" aria-hidden="true"></i>
                </div>
                <div class="col-lg-12 login-title">
                    REGISTRATION
                </div>
 
                <div class="col-lg-12 login-form">
                    <div class="col-lg-12 login-form">
                        <form action="" method="POST">
                            <div class="form-group">
                                <label class="form-control-label">NAME</label>
                                <input type="text" name="fname" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">USERNAME</label>
                                <input type="text" name="username" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">EMAIL</label>
                                <input type="email" name="email" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">PHONE NO.</label>
                                <input type="number" name="phno" class="form-control" pattern="[1-9][0-9]{10}" required>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">ADDRESS</label>
                                <input type="text" name="address" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">PASSWORD</label>
                                <input type="password"  name="password" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label"> CONFIRM PASSWORD</label>
                                <input type="password"  name="cpass" class="form-control" required>
                            </div>
                            <div class="col-lg-12 loginbttm">
                                <div class="col-lg-6 login-btm login-text">
                                    <!-- Error Message -->
                                </div>
                                <div class="col-lg-6 login-btm login-button">
                                    <input type="submit" id="login" name="regsubmit" class="btn btn-outline-primary">
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
<?php

if(isset($_POST['regsubmit']))
{

    $pass=$_POST['password'];
    $cpass=$_POST['cpass'];
if($pass!=$cpass) {

    echo "<script>alert('no match')</script>";
} 
if (strlen($_POST["password"]) <= '8') {
    echo "<script>alert('Your Password Must Contain At Least 8 Characters!')</script>";
}
elseif(!preg_match("#[0-9]+#",$pass)) {
    echo "<script>alert('Your Password Must Contain At Least 1 Number!')</script>";
}
elseif(!preg_match("#[A-Z]+#",$pass)) {
    echo "<script>alert('Your Password Must Contain At Least 1 Capital Letter!')</script>";
}
elseif(!preg_match("#[a-z]+#",$pass)) {
    echo "<script>alert('Your Password Must Contain At Least 1 Lowercase Letter!')</script>";
}
else{

$con=mysqli_connect('localhost','root','','project');
$fname=$_POST['fname'];
$uname=$_POST['username'];
$email=$_POST['email'];
$phno=$_POST['phno'];
$address=$_POST['address'];
$sql="INSERT INTO registration VALUES (0,'$fname','$address','$email','$phno')";
$result=mysqli_query($con,$sql);
$id=mysqli_insert_id($con);
$sql1="INSERT into login values($id,'$uname','$pass','user')";
$result=mysqli_query($con,$sql1);
echo "<script>window.location='log.php';</script>";
}
}
?>
