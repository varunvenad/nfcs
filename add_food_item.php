<?php
include 'header.php';
?>
<?php
$con=mysqli_connect('localhost','root','','project');
$sql="SELECT * FROM category";
$result=mysqli_query($con,$sql);
?>

<div class="col-lg-6">
              <div class="card" style="max-width:500px;top:50%;left:50%;margin-top:50px;margin-left:50px">
                <div class="card-header border-bottom">
                  <h3 class="h4 mb-0">Add Food Items</h3>
                </div>

                <div class="card-body">
                  <p class="text-sm">Add food items into the category</p>
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
                      <input class="form-control" id="exampleInputName" name="itemname" type="text" required>
                      
                    </div>
                    <!--<div class="border-bottom my-5 border-gray-200"></div>
                    <div class="row">-->
                      <label class="col-sm-3 form-label" for="formFile">Select image</label>
                      <div class="col-sm-9" style="padding:10px">
                        <input class="form-control" id="formFile" name="itemimg" type="file" required>
                      </div>
                    <!--</div>-->
                    <div class="mb-3">
                      <label class="form-label" for="exampleInputDesc">Item Description</label>
                      <input class="form-control" id="exampleInputDesc" name="itemdesc" type="text" required>
                      
                    </div>
                    <div class="mb-3">
                      <label class="form-label" for="exampleInputPrice">Item Price</label>
                      <input class="form-control" id="exampleInputPrice" name="itemprice" type="number" required>
                    </div>
                    <input class="btn btn-primary" name="additemsubmit" type="submit">
                  </form>
                </div>
              </div>
            </div>

            <?php
$con=mysqli_connect('localhost','root','','project');
$sql="SELECT * FROM add_food_item";
$result=mysqli_query($con,$sql);
?>
<div class="col-lg-6">
              <div class="card" style= "max-width:1000px;margin:auto;top:50%;left:40%;margin-top:50px;margin-left:50px" >
                <div class="card-header border-bottom">
                  <h3 class="h4 mb-0">Food Items</h3>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table text-sm mb-0 table-striped table-hover">
                      <thead>
                        <tr>
                          <th>Food Item ID</th>
                          <th>Cateory ID</th>
                          <th>Food Name</th>
                          <th>Food Image</th>
                          <th>Food Description</th>
                          <th>Food Price</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        while($row=mysqli_fetch_assoc($result))
                        {
                      ?>
                         <tr>
                          <th scope="row"><?php echo $row['food_item_id'];?></th>
                          <td><?php echo $row['category_id'];?></td>
                          <td><?php echo $row['food_name'];?></td>
                          <td><img src="images/<?php echo $row['food_img'];?>" width="80" height="80"></td>
                          <td><?php echo $row['food_desc'];?></td>
                          <td><?php echo $row['price'];?></td>
                          <td><a href="edit_food_items.php?id=<?php echo $row['food_item_id'];?>">Edit</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="?deleteid=<?php echo $row['food_item_id'];?>">Delete</a></td>
                          
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
  $sql_query="delete from add_food_item where food_item_id=$d_id";
  mysqli_query($con,$sql_query);
  echo "<script>alert('Item deleted');window.location='add_food_item.php'</script>";

}
?>

<?php
if(isset($_POST['additemsubmit']))
{
$con=mysqli_connect('localhost','root','','project');
$icat=$_POST['category_id'];
$iname=$_POST['itemname'];
$filename = $_FILES["itemimg"]["name"]; 
$tempname = $_FILES["itemimg"]["tmp_name"];  
$folder = "images/".$filename;
$idesc=$_POST['itemdesc'];
$iprice=$_POST['itemprice'];
$sql="INSERT INTO add_food_item VALUES (0,$icat,'$iname','$filename','$idesc',$iprice)";
move_uploaded_file($tempname,$folder);
$result=mysqli_query($con,$sql);
if($result)
{
echo "<script>window.alert('Food item Added');window.location='add_food_item.php'</script>";
}
}
?>

<?php
include 'footer.php';
?>