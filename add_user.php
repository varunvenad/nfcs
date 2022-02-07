<?php
include 'header.php';
//session_start();

?>

<!-- Basic Form-->
<div class="col-lg-6">
              <div class="card" style="max-width:500px;margin:auto;top:50%;left:50%;margin-top:50px;margin-left:50px">
                <div class="card-header border-bottom">
                  <h3 class="h4 mb-0">Add User</h3>
                </div>
                <div class="card-body">
                  <form action="" method="POST">
                    <div class="mb-3">
                      <label class="form-label" for="exampleInputEmail1">Name</label>
                      <input class="form-control" id="exampleInputEmail1" name="fullname" type="text" required>
                    </div>
                    <div class="mb-3">
                      <label class="form-label" for="exampleInputPassword1">Email</label>
                      <input class="form-control" id="exampleInputPassword1" name="email" type="email" required>
                    </div>
                    <div class="mb-3">
                      <label class="form-label" for="exampleInputPassword2">Phone No.</label>
                      <input class="form-control" id="exampleInputPassword2" name="phno" type="tel" pattern="[1-9][0-9]{9}" required>
                    </div>
                    <div class="mb-3">
                      <label class="form-label" for="exampleInputPassword3">Address</label>
                      <textarea class="form-control" id="exampleInputPassword3" name="address" type="textarea" required></textarea>
                    </div>
                    <input class="btn btn-primary" name="adduser" type="submit" style="margin-left:360px;" value="Next">
                  </form>
                </div>
              </div>
            </div>

<?php
if(isset($_POST['adduser']))
{
$con=mysqli_connect('localhost','root','','project');
$fname=$_POST['fullname'];

$email=$_POST['email'];
$phno=$_POST['phno'];
$address=$_POST['address'];
$sql="INSERT INTO registration VALUES (0,'$fname','$address','$email','$phno')";
$result=mysqli_query($con,$sql);
$id=mysqli_insert_id($con);
//$_SESSION['user']=$id;
if($result)
{
echo "<script>window.alert('User Added');window.location='offline_bookings.php?id=".$id."';</script>";
}
}
?>

<?php
include 'footer.php';
?>