<?php
include 'usrheader.php'
?>

<?php
$con=mysqli_connect('localhost','root','','project');
$sql="SELECT * FROM add_offers";
$result=mysqli_query($con,$sql);
echo "$sql";
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
                      <input class="form-control" id="exampleInputPassword1" name="bk_address" type="text" required>
                    </div>

                    <div class="mb-3">
                      <label class="form-label" for="exampleInputPassword1" style="color:black;">Quantity</label>
                      <input class="form-control" id="exampleInputPassword1" name="est_guest" type="number" required>
                    </div>

                    <div class="mb-3">
                      <label class="form-label" for="exampleInputEmail1" style="color:black;">Booking Date</label>
                      <input class="form-control" id="exampleInputEmail1"  name="bkdate" type="date" min="<?php echo date('Y-m-d');?>" required>
                      <div class="mb-3">
                      <label class="form-label" for="exampleInputEmail2" style="color:black;">Food Items</label>
                      
                      <?php
                        while($row=mysqli_fetch_assoc($result))
                        {
                          echo "<script>window.alert('".mysqli_num_rows($result)."');</script>";
                      ?>
                      <br>
                        <?php echo $row['offer_item_name'];?><br></option>
                        <?php
                        }
                        ?>
                     
                    </div>
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
    $id=mysqli_insert_id($con);
    $bkadd=$_POST['bk_address'];
    $estgst=$_POST['est_guest'];
    $bkgdate=$_POST['bkdate'];
    $bkddate=date('Y-m-d');
    $sql2="INSERT into booking_details values(0,$uid,$_GET[id],'$bkadd','$bkgdate',$estgst,'$bkddate','offer','pending')";
    $result=mysqli_query($con,$sql2);
    echo $sql2; 
}
if($result)
{
  echo "<script>window.alert('booking added to basket');</script>";

}
?>