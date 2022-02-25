<?php
include 'usrheader.php';
?>

<?php
$con=mysqli_connect('localhost','root','','project');
$sql="SELECT * FROM add_packages WHERE package_id=$_GET[id]";
$result=mysqli_query($con,$sql);
$value=mysqli_fetch_assoc($result);
echo "$sql";
?>

<?php
$con=mysqli_connect('localhost','root','','project');
$sql="SELECT * FROM add_packages where package_id=$_GET[id]; ";
$pkgp=0;
$result=mysqli_query($con,$sql);
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
                      <label class="form-label" for="exampleInputPassword1" style="color:black;">Estimated Guests</label>
                      <input class="form-control" onfocusout="calc()" id="est" name="est_guest" type="number" required>
                    </div>

                    <div class="mb-3">
                      <label class="form-label" for="exampleInputEmail1" style="color:black;">Booking Date</label>
                      <input class="form-control" id="exampleInputEmail1"  name="bkdate" type="date" min="<?php echo date('Y-m-d');?>" required>
                      <br>
                      <div class="mb-3">
                      <label class="form-label" for="exampleInputEmail2" style="color:black;">Food Items</label>
                      <p style="color:black;">
                      <?php
                       
                        $fname="";
                      
                        while($row=mysqli_fetch_assoc($result))
                        {
                         $pkgp=$row['pkg_price'];
            
                         $tmp=EXPLODE(',',$row['food_list']);
                         $fname="";
                         $foodItemsID=array_slice($tmp,1,count($tmp)-1);
                        foreach($foodItemsID as $i)
                        {  
       
                        $sql2="SELECT * FROM add_food_item where food_item_id=$i";
    $results=mysqli_query($con,$sql2);
    $tmpp=mysqli_fetch_assoc($results);
    $fname=$fname."<br>".$tmpp['food_name'];
   
        }
      }
      echo $fname;
        ?>
        </p>

        <br>
        <br>
        <h6 style="color:black;" id="total">
      <script>
        function calc()
        {
          var e=document.getElementById('total').innerHTML="Total="+document.getElementById('est').value*<?php echo $pkgp ?>;
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
    $estgst=$_POST['est_guest'];
    $total=$estgst*$pkgp;
    $bkgdate=$_POST['bkdate'];
    $bkddate=date('Y-m-d');
    $sql2="INSERT into booking_details values(0,$uid,$_GET[id],'$bkadd','$bkgdate',$estgst,'$bkddate','package','pending',$total)";
    $result=mysqli_query($con,$sql2);
    //echo $sql2; 

    if($result)
    {
     echo "<script>window.alert('booking added to basket');</script>";
    }
}
?>