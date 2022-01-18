<?php
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
                      <label class="form-label" for="exampleInputPassword2">Min Quantity</label>
                      <input class="form-control" id="exampleInputPassword2" name="off_qty" type="number" required>
                    </div>
                    <div class="mb-3">
                      <label class="form-label" for="exampleInputPassword3">Valid From</label>
                      <input class="form-control" id="exampleInputPassword3" name="valid_frm" type="date" required>
                    </div>
                    <div class="mb-3">
                      <label class="form-label" for="exampleInputPassword4">Valid To</label>
                      <input class="form-control" id="exampleInputPassword4" name="valid_to" type="date" required>
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
$offfood=$_POST['off_food'];
$offdesc=$_POST['off_desc'];
$offprice=$_POST['off_price'];
$offqty=$_POST['off_qty'];
$vldfrm=$_POST['valid_frm'];
$vldto=$_POST['valid_to'];
$sql="INSERT INTO add_offers ('offer_id','offer_item_name','offer_desc','offr_price','min_quantity',valid_from,'valid_to') VALUES (0,'$offfood','$offdesc','$offprice','$offqty','$vldfrm','$vldto')";
$result=mysqli_query($con,$sql);
if($result)
{
echo "<script>alert('COffer Added');window.location='add_offers.php'</script>";
}
}
?>

<?php
include 'footer.php';
?>
