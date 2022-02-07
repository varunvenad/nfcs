<?php
include 'header.php';
if(isset($_GET['id']))
{
    $get=$_GET['id'];


$con=mysqli_connect('localhost','root','','project');
$sql="SELECT * FROM add_food_item where food_item_id=$get";
$result=mysqli_query($con,$sql);
$value=mysqli_fetch_assoc($result);
//echo $value['category_id'];
}
?>
<?php
$con=mysqli_connect('localhost','root','','project');
$sql="SELECT * FROM category";
$result=mysqli_query($con,$sql);
?>

<div class="col-lg-6">
              <div class="card" style="max-width:500px;top:50%;left:50%;margin-top:50px;margin-left:50px">
                <div class="card-header border-bottom">
                  <h3 class="h4 mb-0">Edit Food Items</h3>
                </div>

                <div class="card-body">
                  <p class="text-sm">Edit the food details</p>
                  <form action="" method="POST" enctype="multipart/form-data">
                  <div class="col-lg" style="width:300px;margin:auto;padding:10px">
                      <label class="visually-hidden" for="inlineFormSelectPref">Preference</label>
                      <select class="form-select" id="inlineFormSelectPref" name="category_id" type="number">
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
                      <label class="form-label" for="exampleInputName">Item Name</label>
                      <input value="<?php echo $value['food_name']?>"class="form-control" id="exampleInputName" name="itemname" type="text" required>
                      
                    </div>
                    <!--<div class="border-bottom my-5 border-gray-200"></div>
                    <div class="row">-->
                      <label class="col-sm-3 form-label" for="formFile">Select image</label>
                      <div class="col-sm-9" style="padding:10px">
                        <input value="<?php echo $value['food_img']?>"class="form-control" id="formFile" name="itemimg" type="file" required>
                      </div>
                    <!--</div>-->
                    <div class="mb-3">
                      <label class="form-label" for="exampleInputDesc">Item Description</label>
                      <input value="<?php echo $value['food_desc']?>"class="form-control" id="exampleInputDesc" name="itemdesc" type="text" required>
                      
                    </div>
                    <div class="mb-3">
                      <label class="form-label" for="exampleInputPrice">Item Price</label>
                      <input value="<?php echo $value['price']?>"class="form-control" id="exampleInputPrice" name="itemprice" type="number" required>
                    </div>
                    <input class="btn btn-primary" name="additemsubmit" type="submit">
                  </form>
                </div>
              </div>
            </div>


<?php
if(isset($_POST['additemsubmit']))
{
$con=mysqli_connect('localhost','root','','project');
$cat=$value['category_id'];
$iname=$_POST['itemname'];
$filename = $_FILES["itemimg"]["name"]; 
$tempname = $_FILES["itemimg"]["tmp_name"];  
$folder = "images/".$filename;
$idesc=$_POST['itemdesc'];
$iprice=$_POST['itemprice'];
$sql="UPDATE add_food_item set category_id=$cat, food_name='$iname', food_img='$filename', food_desc='$idesc', price=$iprice where food_item_id=$get";
move_uploaded_file($tempname,$folder);
$result=mysqli_query($con,$sql);
if($result)
{
echo "<script>alert('item Updated');window.location='add_food_item.php'</script>";
}
}
?>





<?php
include 'footer.php';
?>