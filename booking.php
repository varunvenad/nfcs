<?php
include 'usrheader.php';
?>

<?php
//session_start();
$con=mysqli_connect('localhost','root','','project');
$sql="SELECT * FROM food_basket";
$result=mysqli_query($con,$sql);
$value=mysqli_fetch_assoc($result);

?>


<div class="col-lg-6">
              <div class="card" style="max-width:500px;margin:auto;top:50%;left:50%;margin-top:150px;margin-left:150px">
                <div class="card-header border-bottom">
                  <h3 class="h4 mb-0" style="color:black;">Bookings</h3>
                </div>
                <div class="card-body">
                  <form action="" method="POST">
                    
                  <div class="mb-3">
                      <label class="form-label" for="exampleInputPassword1" style="color:black;">Address</label>
                      <input class="form-control" id="addr" name="bk_address" type="text" required>
                    </div>

                    <div class="mb-3">
                      <label class="form-label" for="exampleInputPassword1" style="color:black;">Estimated Guests</label>
                      <input class="form-control"  onfocusout="calc()" id="est" name="est_guest" type="number" required>
                    </div>

                    <div class="mb-3">
                      <label class="form-label" for="exampleInputEmail1" style="color:black;">Booking Date</label>
                      <input class="form-control" id="bdate"  name="bkdate" type="date" min="<?php echo date('Y-m-d');?>" required>
                      <br>
                      <div class="mb-3">
                    </div>

                  <br>
                  <br>
                  <br>
                  <h4 style="color:red;" id="total">
                  <script>
        function calc()
        {
          var e=document.getElementById('total').innerHTML="Total="+document.getElementById('est').value*<?php echo $_SESSION['sum'] ?>;
        }
    </script>
                
                </h4>
                  <br>
                    </div>
                    <input class="btn btn-primary"  name="book" type="submit">
                  </form>
                </div>
              </div>
            </div>


<?php
if(isset($_POST['book']))
{
    $con=mysqli_connect('localhost','root','','project');
    $uid=$_SESSION['login_id'];
    $bkadd=$_POST['bk_address'];
    $estgst=$_POST['est_guest'];
    $t=$estgst*$_SESSION['sum'];
    $bkgdate=$_POST['bkdate'];
    $bkddate=date('Y-m-d');
    $sql2="INSERT into booking_details values(0,$uid,$_SESSION[basketid],'$bkadd','$bkgdate',$estgst,'$bkddate','basket','pending',$t)";
    
    $result=mysqli_query($con,$sql2);
     
if($result)
{
  echo "<script>window.alert('Booked');</script>";
  $sql3="UPDATE food_basket set status='booked' where u_id=$_SESSION[login_id]";
  $result3=mysqli_query($con,$sql3);
}
}
?>