<?php
include 'usrheader.php'
?>

<?php
$con=mysqli_connect('localhost','root','','project');
$sql="SELECT * FROM add_offers where offer_id=$_GET[id]";
$offrpr=0;
$result=mysqli_query($con,$sql);
//echo "$sql";
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
                      <input class="form-control" id="qty" onfocusout="calc()" name="qty" type="number" required>
                    </div>

                    <div class="mb-3">
                      <label class="form-label" for="exampleInputEmail1" style="color:black;">Booking Date</label>
                      <input class="form-control" id="exampleInputEmail1"  name="bkdate" type="date" min="<?php echo date('Y-m-d');?>" required>
                      <div class="mb-3">
                      <!--<label class="form-label" for="exampleInputEmail2" style="color:black;">Food Items</label>-->
                      
                      <?php
                        while($row=mysqli_fetch_assoc($result))
                        {
                          $offrpr=$row['offr_price'];
                     // ?>
                      <br>
                        <?php //echo $row['offer_item_name'];?><br></option>
                        <?php
                        }
                        ?>
                        </p>

<br>
<br>
<h6 style="color:black;" id="total">
<script>
function calc()
{
  var e=document.getElementById('total').innerHTML="Total="+document.getElementById('qty').value*<?php echo $offrpr ?>;
}
</script>

</h6>
                     
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
    $qty=$_POST['qty'];
    $t= $qty*$offrpr;
    $bkgdate=$_POST['bkdate'];
    $bkddate=date('Y-m-d');
    $sql2="INSERT into booking_details values(0,$uid,$_GET[id],'$bkadd','$bkgdate',$qty,'$bkddate','offer','pending',$t)";
    
    $result=mysqli_query($con,$sql2);
    //echo $sql2; 

  if($result)
  {
   echo "<script>window.alert('booking added to basket');</script>";

  }
}
?>