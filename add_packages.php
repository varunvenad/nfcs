<?php
include 'header.php'
?>
<?php
$con=mysqli_connect('localhost','root','','project');
$sql="SELECT food_item_id,food_name FROM add_food_item";
$result=mysqli_query($con,$sql);
?>
<div class="col-lg-6">
              <div class="card" style="max-width:500px;margin:auto;top:50%;left:50%;margin-top:50px;margin-left:50px">
                <div class="card-header border-bottom">
                  <h3 class="h4 mb-0">Add Packages</h3>
                </div>
                <div class="card-body">
                  <form action="" method="POST" enctype="multipart/form-data">
                    <!--<div class="border-bottom my-5 border-gray-200"></div>
                    <div class="row">-->
                    <label class="col-sm-3 form-label" for="formFile">Choose image</label>
                      <div class="col-sm-9" style="padding:10px">
                        <input class="form-control" id="formFile" name="pkgimg" type="file" required>
                      </div>
                    <!--</div>-->
                    <div class="mb-3">
                      <label class="form-label" for="exampleInputEmail1">Food Package Description</label>
                      <input class="form-control" id="exampleInputEmail1"  name="pkgdesc" type="text" required>
                      <div class="mb-3">
                      <label class="form-label" for="exampleInputEmail2">Food Items</label>
                      <select class="form-control" id="exampleInputEmail2" name="pkgitems" type="text" multiple="multiple" required>
                      <option selected disabled>Choose items</option>
                      <?php
                        while($row=mysqli_fetch_assoc($result))
                        {
                      ?>
                        <option value="<?php echo $row['food_item_id'];?>"><?php echo $row['food_name'];?></option>
                        <?php
                        }
                        ?>
                      </select>
                    </div>
                    </div>
                    <div class="mb-3">
                      <label class="form-label" for="exampleInputPassword1">Package price/head</label>
                      <input class="form-control" id="exampleInputPassword1" name="pkgprice" type="number" required>
                    </div>
                    <input class="btn btn-primary"  name="addpkgsubmit" type="submit">
                  </form>
                </div>
              </div>
            </div>
            <?php
if(isset($_POST['addpkgsubmit']))
{
  echo $_POST['pkgitems'];
$con=mysqli_connect('localhost','root','','project');
$filename = $_FILES["pkgimg"]["name"]; 
$tempname = $_FILES["pkgimg"]["tmp_name"];  
$folder = "images/".$filename;
$pkgdesc=$_POST['pkgdesc'];
$pkgitm=$_POST['pkgitems'];
$pkgprice=$_POST['pkgprice'];
$sql="INSERT INTO add_packages VALUES (0,$filename,'$pkgdesc','$pkgitm',$pkgprice)";
move_uploaded_file($tempname,$folder);
$result=mysqli_query($con,$sql);
if($result)
{
//echo "<script>window.alert('Package item Added');window.location='add_food_item.php'</script>";
}
}
?>

<?php
include 'footer.php';
?>