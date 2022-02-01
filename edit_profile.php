<?php
include 'usrheader.php';
?>



<?php
//session_start();
$con=mysqli_connect('localhost','root','','project');
$sql="SELECT * from registration where u_id=$_SESSION[login_id]";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($result);
?>
            <form action="" method="POST">
                    <div class="col-md-8" style="margin-top:250px;margin-left:30px">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="row" style="padding:10px">
                                            <div class="col-md-6">
                                                <label>User Id</label>
                                            </div>
                                            <div class="col-md-6">
                                                <input name="tname" value="<?php echo $row['u_id'];?>">
                                            </div>
                                        </div>
                                        <div class="row" style="padding:10px">
                                            <div class="col-md-6">
                                                <label>Full Name</label>
                                            </div>
                                            <div class="col-md-6">
                                                <input name="fname" value="<?php echo $row['full_name'];?>">
                                            </div>
                                        </div>
                                        <div class="row" style="padding:10px">
                                            <div class="col-md-6">
                                                <label>Email</label>
                                            </div>
                                            <div class="col-md-6">
                                                <input name="email" value="<?php echo $row['email_id'];?>">
                                            </div>
                                        </div>
                                        <div class="row" style="padding:10px">
                                            <div class="col-md-6">
                                                <label>Address</label>
                                            </div>
                                            <div class="col-md-6">
                                                <input name="address" value="<?php echo $row['address'];?>">
                                            </div>
                                        </div>
                                        <div class="row" style="padding:10px">
                                            <div class="col-md-6">
                                                <label>Phone no.</label>
                                            </div>
                                            <div class="col-md-6">
                                                <input name="phno" value="<?php echo $row['phone_no'];?>">
                                            </div>

                                            <div class="col-md-2" style="padding:60px;margin-left:540px;">
                                                <input type="submit" class="profile-edit-btn" name="save_edit" value="Save Changes"/>
                                            </div>
                                        </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </form>           
        </div>



        
<?php
if(isset($_POST['save_edit']))
{
$con=mysqli_connect('localhost','root','','project');
$fname=$_POST['fname'];
$email=$_POST['email'];
$addr=$_POST['address'];
$phno=$_POST['phno'];
$sql="UPDATE registration set  full_name='$fname', address='$addr', email_id='$email', phone_no=$phno where u_id=$_SESSION[login_id]";
$result=mysqli_query($con,$sql);

if($result)
{
    echo "<script>window.location='user_profile.php'</script>";
}
}
?>

<?php
//include 'usrfooter.php';
?>