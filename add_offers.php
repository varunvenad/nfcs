<?php
date_default_timezone_set('Asia/Kolkata');
echo date('Y-m-d');
include 'header.php';
?>

<!-- Basic Form-->
<div class="col-lg-6">
              <div class="card" style="max-width:500px;margin:auto;top:50%;left:50%;margin-top:50px;margin-left:50px">
                <div class="card-header border-bottom">
                  <h3 class="h4 mb-0">Add Offers</h3>
                </div>
                <div class="card-body">
                  <form action="" method="POST">
                    <div class="mb-3">
                      <label class="form-label" for="exampleInputEmail1">Food Name</label>
                      <input class="form-control" id="exampleInputEmail1" name="off_food" type="text" required>
                    </div>
                    <div class="mb-3">
                      <label class="form-label" for="exampleInputPassword5">Offer Description</label>
                      <input class="form-control" id="exampleInputPassword5" name="off_desc" type="text" required>
                    </div>
                    <div class="mb-3">
                      <label class="form-label" for="exampleInputPassword1">Price</label>
                      <input class="form-control" id="exampleInputPassword1" name="off_price" type="number" required>
                    </div>
                    <div class="mb-3">
                      <label class="form-label" for="exampleInputPassword2">Min Quantity(in kg/litres)</label>
                      <input class="form-control" id="exampleInputPassword2" name="off_qty" type="number" required>
                    </div>
                    <div class="mb-3">
                      <label class="form-label" for="exampleInputPassword3">Valid From</label>
                      <input class="form-control" id="exampleInputPassword3" name="valid_frm" type="date" min="<?php echo date('Y-m-d');?>" required>
                    </div>
                    <div class="mb-3">
                      <label class="form-label" for="exampleInputPassword4">Valid To</label>
                      <input class="form-control" id="exampleInputPassword4" name="valid_to" type="date"  min="<?php echo date('Y-m-d');?>" required>
                    </div>
                    <input class="btn btn-primary" name="offersubmit" type="submit">
                  </form>
                </div>
              </div>
            </div>

            <?php
$con=mysqli_connect('localhost','root','','project');
$sql="SELECT * FROM add_offers";
$result=mysqli_query($con,$sql);
?>

<div class="col-lg-6">
              <div class="card" style= "max-width:900px;margin:auto;top:50%;left:40%;margin-top:50px;margin-left:50px" >
                <div class="card-header border-bottom">
                  <h3 class="h4 mb-0">Offer Details</h3>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table text-sm mb-0 table-striped table-hover">
                      <thead>
                        <tr>
                          <th>Offer ID</th>
                          <th>Offer Item Name</th>
                          <th>Offer Description</th>
                          <th>Offer Price</th>
                          <th>Minimum Quantity(in kg/litres)</th>
                          <th>Valid From</th>
                          <th>Valid To</th>
                          <th>Action</th>
                          
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        while($row=mysqli_fetch_assoc($result))
                        {
                      ?>
                         <tr>
                          <th scope="row"><?php echo $row['offer_id'];?></th>
                          <td><?php echo $row['offer_item_name'];?></td>
                          <td><?php echo $row['offer_desc'];?></td>
                          <td><?php echo $row['offr_price'];?></td>
                          <td><?php echo $row['min_quantity'];?></td>
                          <td><?php echo $row['valid_from'];?></td>
                          <td><?php echo $row['valid_to'];?></td>
                          <td><a href="edit_offers.php?id=<?php echo $row['offer_id'];?>">Edit</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="?deleteid=<?php echo $row['offer_id'];?>">Delete</a></td>
                          
                        </tr>
                        <?php
                        }
                        ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>

<?php
$con=mysqli_connect('localhost','root','','project');
if(isset($_GET['deleteid']))
{
  $d_id=$_GET['deleteid'];
  $sql_query="delete from add_offers where offer_id=$d_id";
  mysqli_query($con,$sql_query);
  echo "<script>alert('offer deleted');window.location='add_offers.php'</script>";

}
?>

<?php
if(isset($_POST['offersubmit']))
{
$con=mysqli_connect('localhost','root','','project');
$offfood=$_POST['off_food'];
$offdesc=$_POST['off_desc'];
$offprice=$_POST['off_price'];
$offqty=$_POST['off_qty'];
$vldfrm=$_POST['valid_frm'];
$vldto=$_POST['valid_to'];
$sql="INSERT INTO add_offers VALUES (0,'$offfood','$offdesc','$offprice','$offqty','$vldfrm','$vldto')";
$result=mysqli_query($con,$sql);
if($result)
{
echo "<script>alert('Offer Added');window.location='add_offers.php'</script>";
}
}
?>

<?php
include 'footer.php';
?>
