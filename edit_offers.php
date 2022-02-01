<?php
date_default_timezone_set('Asia/Kolkata');
echo date('Y-m-d');
include 'header.php';
if(isset($_GET['id']))
{
    $get=$_GET['id'];


$con=mysqli_connect('localhost','root','','project');
$sql="SELECT * FROM add_offers where offer_id=$get";
$result=mysqli_query($con,$sql);
$value=mysqli_fetch_assoc($result);
}

?>

<div class="col-lg-6">
              <div class="card" style="max-width:500px;margin:auto;top:50%;left:50%;margin-top:50px;margin-left:50px">
                <div class="card-header border-bottom">
                  <h3 class="h4 mb-0">Edit Offers</h3>
                </div>
                <div class="card-body">
                  <form action="" method="POST">
                    <div class="mb-3">
                      <label class="form-label" for="exampleInputEmail1">Food Name</label>
                      <input value="<?php echo $value['offer_item_name']?>" class="form-control" id="exampleInputEmail1" name="off_food" type="text" required>
                    </div>
                    <div class="mb-3">
                      <label class="form-label" for="exampleInputPassword5">Offer Description</label>
                      <input value="<?php echo $value['offer_desc']?>" class="form-control" id="exampleInputPassword5" name="off_desc" type="text" required>
                    </div>
                    <div class="mb-3">
                      <label class="form-label" for="exampleInputPassword1">Price</label>
                      <input value="<?php echo $value['offr_price']?>" class="form-control" id="exampleInputPassword1" name="off_price" type="number" required>
                    </div>
                    <div class="mb-3">
                      <label class="form-label" for="exampleInputPassword2">Min Quantity</label>
                      <input value="<?php echo $value['min_quantity']?>" class="form-control" id="exampleInputPassword2" name="off_qty" type="number" required>
                    </div>
                    <div class="mb-3">
                      <label class="form-label" for="exampleInputPassword3">Valid From</label>
                      <input value="<?php echo $value['valid_from']?>" class="form-control" id="exampleInputPassword3" name="valid_frm" type="date" min="<?php echo date('Y-m-d');?>" required>
                    </div>
                    <div class="mb-3">
                      <label class="form-label" for="exampleInputPassword4">Valid To</label>
                      <input value="<?php echo $value['valid_to']?>" class="form-control" id="exampleInputPassword4" name="valid_to" type="date"  min="<?php echo date('Y-m-d');?>" required>
                    </div>
                    <input class="btn btn-primary" name="offersubmit" type="submit">
                  </form>
                </div>
              </div>
            </div>

<?php
if(isset($_POST['offersubmit']))
{
$con=mysqli_connect('localhost','root','','project');
$offood=$_POST['off_food'];
$offdesc=$_POST['off_desc'];
$offprice=$_POST['off_price'];
$offqty=$_POST['off_qty'];
$frm=$_POST['valid_frm'];
$to=$_POST['valid_to'];
$sql="UPDATE add_offers set offer_item_name='$offood', offer_desc='$offdesc', offr_price='$offprice', min_quantity='$offqty', valid_from='$frm', valid_to='$to' where offer_id=$get";
$result=mysqli_query($con,$sql);
if($result)
{
echo "<script>alert('Offer Updated');window.location='add_offers.php'</script>";
}
}
?>

<?php
include 'footer.php';
?>
