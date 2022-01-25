<?php
date_default_timezone_set('Asia/Kolkata');
echo date('Y-m-d');
include 'header.php';
?>

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
include 'footer.php';
?>
