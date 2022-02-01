<?php
include 'usrheader.php'
?>


<?php
//session_start();
$con=mysqli_connect('localhost','root','','project');
$sql="SELECT * from registration where u_id=$_SESSION[login_id]";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($result);
?>



 <div style="margin-top:250px;">
 <div class="container emp-profile">
            <form method="post">
                <div class="row">
                    <div class="col-md-6">
                        <div class="profile-head">
                                    <h5>
									<?php echo $row['full_name'];?>  
                                    </h5>
                                    <hr></hr>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <input type="submit" class="profile-edit-btn" name="editprofile" value="Edit Profile"/>
                    </div>
                </div>
                    <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>User Id</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $row['u_id'];?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Full Name</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $row['full_name'];?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Email</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $row['email_id'];?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Address</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $row['address'];?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Phone no.</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $row['phone_no'];?></p>
                                            </div>
                                        </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </form>           
        </div>


<?php
if(isset($_POST['editprofile']))
{
	echo "<script>window.location='edit_profile.php?id=1'</script>";
}
?>

<?php
//include 'usrfooter.php';
?>