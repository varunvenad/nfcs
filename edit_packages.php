<?php
include 'header.php';
if(isset($_GET['id']))
{
    $get=$_GET['id'];


$con=mysqli_connect('localhost','root','','project');
               
$sql="SELECT * FROM add_packages where package_id=$get";

$result=mysqli_query($con,$sql);
$value=mysqli_fetch_assoc($result);

}
?>

<?php
$con=mysqli_connect('localhost','root','','project');
$sql="SELECT * FROM add_packages";
$result=mysqli_query($con,$sql);
?>
<div class="col-lg-6">
              <div class="card" style= "width:1000px;margin:auto;top:50%;left:20%;margin-top:50px;margin-left:20px" >
                <div class="card-header border-bottom">
                  <h3 class="h4 mb-0">Manage Packages</h3>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table text-sm mb-0 table-striped table-hover">
                      <thead>
                        <tr>
                          <th>Package ID</th>
                          <th>Package Image</th>
                          <th>Package Description</th>
                          <th>Food items</th>
                          <th>Package Price</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $fname="";
                        while($row=mysqli_fetch_assoc($result))
                        {
                            $tmp=EXPLODE(',',$row['food_list']);
                            $fname="";
                            $foodItemsID=array_slice($tmp,1,count($tmp)-1);
                            foreach($foodItemsID as $i)
                                {  
                               
                            $sql2="SELECT * FROM add_food_item where food_item_id=$i";
                            $results=mysqli_query($con,$sql2);
                            $tmpp=mysqli_fetch_assoc($results);
                            $fname=$fname.$tmpp['food_name'].",";
                                }
                              ?>
                         <tr>
                          <th scope="row"><?php echo $row['package_id'];?></th>
                          <td><img src="images/<?php echo $row['pkg_img'];?>" width="80" height="80"></td>
                          <td><?php echo $row['pkg_desc'];?></td>
                          <td><?php echo $fname;
                           ?></td>
                          <td><?php echo $row['pkg_price'];?></td>
                          <td><a href="?edtid=<?php echo $row['package_id'];?>">edit</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="?deleteid=<?php echo $row['package_id'];?>">Delete</a></td>
                          
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
  $sql_query="delete from add_packages where package_id=$d_id";
  mysqli_query($con,$sql_query);
  echo "<script>alert('Item deleted');window.location='add_food_item.php'</script>";

}

if(isset($_GET['edtid']))
{
  $edtid=$_GET['edtid'];
  $sql_query="select * from add_packages where package_id=$edtid";
  $v=mysqli_query($con,$sql_query);
  $value=mysqli_fetch_assoc($v);

?>

<div class="col-lg-6">
              <div class="card" style="max-width:500px;margin:auto;top:50%;left:50%;margin-top:50px;margin-left:50px">
                <div class="card-header border-bottom">
                  <h3 class="h4 mb-0">Edit Packages</h3>
                </div>
                <div class="card-body">
                  <form action="" method="POST" enctype="multipart/form-data">
                    <!--<div class="border-bottom my-5 border-gray-200"></div>
                    <div class="row">-->
                    <label class="col-sm-3 form-label" for="formFile">Choose image</label>
                      <div class="col-sm-9" style="padding:10px">
                        <input value="<?php echo $value['pkg_img']?>" class="form-control" id="formFile" name="pkgimg" type="file" required>
                      </div>
                    <!--</div>-->
                    <div class="mb-3">
                      <label class="form-label" for="exampleInputEmail1">Food Package Description</label>
                      <input value="<?php echo $value['pkg_desc'];?>" class="form-control" id="exampleInputEmail1"  name="pkgdesc" type="text" required>
                      <div class="mb-3">
                      <label class="form-label" for="exampleInputEmail2">Food Items</label>
                      
                      <?php
                      $sq="SELECT * FROM add_food_item;";
                      $res=mysqli_query($con,$sq);
                        while($row=mysqli_fetch_assoc($res))
                        {
                      ?>
                      <br>
                        <input type="checkbox" name="pkgitems[]" value="<?php echo $row['food_item_id'];?>"><?php echo $row['food_name'];?><br></option>
                        <?php
                        }
                        ?>
                     
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
$con=mysqli_connect('localhost','root','','project');
$filename = $_FILES["pkgimg"]["name"]; 
$tempname = $_FILES["pkgimg"]["tmp_name"];  
$folder = "images/".$filename;
$pkgdesc=$_POST['pkgdesc'];
$pkgitems="";
foreach($_POST['pkgitems'] as $i)
{
  $pkgitems=$pkgitems.",".$i;
  //echo $pkgitems;
}
$pkgprice=$_POST['pkgprice'];
$sql="UPDATE add_packages set  pkg_img='$filename', pkg_desc='$pkgdesc', food_list='$pkgitems', pkg_price=$pkgprice where package_id=$_GET[edtid]";
move_uploaded_file($tempname,$folder);
$result=mysqli_query($con,$sql);
if($result)
{
echo "<script>alert('Package Updated');window.location='add_packages.php'</script>";
}
}
?>

<?php
}
include 'footer.php';
?>