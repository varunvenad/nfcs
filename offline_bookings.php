<?php
include 'header.php';
?>
<?php
//session_start();
//$id=$_SESSION['user'];
//echo $_SESSION['user'];
$con=mysqli_connect('localhost','root','','project');
$sql="SELECT food_item_id,food_name FROM add_food_item";
$result=mysqli_query($con,$sql);
?>

<div class="col-lg-6">
              <div class="card" style="max-width:500px;margin:auto;top:50%;left:50%;margin-top:50px;margin-left:50px">
                <div class="card-header border-bottom">
                  <h3 class="h4 mb-0">Offline Bookings</h3>
                </div>
                <div class="card-body">
                  <form action="" method="POST">
                    
                  <div class="mb-3">
                      <label class="form-label" for="exampleInputPassword1">Address</label>
                      <input class="form-control" id="exampleInputPassword1" name="bk_address" type="text" required>
                    </div>

                    <div class="mb-3">
                      <label class="form-label" for="exampleInputPassword1">Estimated Guests</label>
                      <input class="form-control" id="exampleInputPassword1" name="est_guest" type="number" required>
                    </div>

                    <div class="mb-3">
                      <label class="form-label" for="exampleInputEmail1">Booking Date</label>
                      <input class="form-control" id="exampleInputEmail1"  name="bkdate" type="date" min="<?php echo date('Y-m-d');?>" required>
                      <div class="mb-3">
                      <label class="form-label" for="exampleInputEmail2">Food Items</label>
                      
                      <?php
                        while($row=mysqli_fetch_assoc($result))
                        {
                      ?>
                      <br>
                        <input type="checkbox" name="pkgitems[]" value="<?php echo $row['food_item_id'];?>"><?php echo $row['food_name'];?><br></option>
                        <?php
                        }
                        ?>
                     
                    </div>
                    </div>
                    <input class="btn btn-primary"  name="addoffline" type="submit">
                  </form>
                </div>
              </div>
            </div>

<?php
if(isset($_POST['addoffline']))
{
    $con=mysqli_connect('localhost','root','','project');
    //$fdid=$_POST['food_item_id'];
    $pkgitems="";
    foreach($_POST['pkgitems'] as $i)
    {
      $pkgitems=$pkgitems.",".$i;
    }
    $sql="INSERT into food_basket VALUES(0,$_GET[id],'$pkgitems')";
    $result=mysqli_query($con,$sql); 
    $id=mysqli_insert_id($con);
    $bkadd=$_POST['bk_address'];
    $estgst=$_POST['est_guest'];
    $bkgdate=$_POST['bkdate'];
    $bkddate=date('Y-m-d');
    $sql2="INSERT into booking_details values(0,$_GET[id],$id,'$bkadd','$bkgdate',$estgst,'$bkddate','normal','pending')";
    $result2=mysqli_query($con,$sql2);
    echo $sql2; 
}
if($result)
{
  echo "<script>window.alert('Offline booking added to basket');</script>";
}
?>



<?php
include 'footer.php';
?>