<?php
include 'header.php';
if(isset($_GET['cat']))
{
  $cat=$_GET['cat'];
}
else
{
  $cat="";
}
?>


<?php
$con=mysqli_connect('localhost','root','','project');
if(isset($_GET['cat']))
{
  $sql="SELECT * FROM add_food_item WHERE category_id=$_GET[cat]";
  $exe=mysqli_query($con,$sql);
  
}
?>

<?php
//session_start();
//$id=$_SESSION['user'];
//echo $_SESSION['user'];
$con=mysqli_connect('localhost','root','','project');
$sql="SELECT food_item_id,food_name,category_id,food_name FROM add_food_item";
$result=mysqli_query($con,$sql);
?>
<?php
$con=mysqli_connect('localhost','root','','project');
$sql="SELECT * FROM category";
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
                    </div>
                    <div class="card-body">
                  <p class="text-sm">Add food items into the category</p>
                  <form action="" method="POST" enctype="multipart/form-data">
                  <div class="col-lg" style="width:300px;margin:auto;padding:10px">
                      <label class="visually-hidden" for="inlineFormSelectPref">Preference</label>
                      <select class="form-select" id="cat" onchange="typeSelected()" name="category_id" type="number">
                        <option selected>Choose Category</option>
                        <?php
                        while($row=mysqli_fetch_assoc($result))
                        {
                      ?>
                        <option value="<?php echo $row['category_id'];?>"><?php echo $row['category_name'];?></option>
                        <?php
                        }
                        ?>
                      </select>
                    </div>
                      <div class="mb-3">
                      <label class="form-label" for="exampleInputEmail2">Food Items</label>
                      
                      <?php
                      if(isset($_GET['cat']))
                      {

                        while($row=mysqli_fetch_assoc($exe))
                        {
                      ?>
                      <br>
                        <input type="checkbox" name="pkgitems[]" value="<?php echo $row['food_item_id'];?>-<?php echo $row['price'];?>"><?php echo $row['food_name'];?><br></option>
                        <?php
                        }
                      }
                        ?>
                     
                    </div>
                    </div>
                    <input type="hidden" value="<?php echo $_GET['id'];?>" id="val">
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
    $ar=array();
    $total=0;
    foreach($_POST['pkgitems'] as $i)
    {
     $ar=EXPLODE('-',$i);
    $pkgitems=$pkgitems.",".$ar[0];
    $total=$total+$ar[1];
    }
    $sql="INSERT into food_basket VALUES(0,$_GET[id],'$pkgitems','paid')";
    $result=mysqli_query($con,$sql); 
    //echo $sql;
    $id=mysqli_insert_id($con);
    $bkadd=$_POST['bk_address'];
    $estgst=$_POST['est_guest'];
    $bkgdate=$_POST['bkdate'];
    $total=$total*$estgst;
    $bkddate=date('Y-m-d');
    $sql2="INSERT into booking_details values(0,$_GET[id],$id,'$bkadd','$bkgdate',$estgst,'$bkddate','normal','pending',$total)";
    $result=mysqli_query($con,$sql2);
    //echo $sql2; 

if($result)
{
 echo "<script>window.alert('Offline booking added to basket');</script>";
}
}
?>

<script>
  function typeSelected()
  {
    var select=document.getElementById('cat').value;
    var id=document.getElementById('val').value;
    window.location="offline_bookings.php?id="+id+"&cat="+select+"";
    
    
  }
</script>


<?php
include 'footer.php';
?>