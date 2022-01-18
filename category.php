<?php
include 'header.php';
?>

<form method="POST" action="">
<!-- Inline Form-->
<div class="col-lg-8"style="width:500px;margin:auto;top:50%;left:50%;margin-top:50px;margin-left:50px">                           
              <div class="card">
                <div class="card-header border-bottom">
                  <h3 class="h4 mb-0">Add Category</h3>
                </div>
                <div class="card-body">
                  <form class="row g-3 align-items-center">
                    <div class="col-lg">
                      <label class="visually-hidden" for="inlineFormInputGroupUsername">Category</label>
                      <div class="input-group">
                        
                        <input class="form-control" id="inlineFormInputGroupUsername" name="category" type="text" placeholder="Add category" required>
                      </div>
                    </div>
                    
                    <div class="col-lg" style="padding:10px">
                      <input class="btn btn-primary" name="submit" type="submit">
                    </div>
                  </form>
                </div>
              </div>
            </div>
</form>
<?php
$con=mysqli_connect('localhost','root','','project');
$sql="SELECT * FROM category";
$result=mysqli_query($con,$sql);
?>
<div class="col-lg-6">
              <div class="card">
                <div class="card-header border-bottom">
                  <h3 class="h4 mb-0">Categories</h3>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table text-sm mb-0 table-striped table-hover">
                      <thead>
                        <tr>
                          <th>Category ID</th>
                          <th>Category Name</th>
                          
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        while($row=mysqli_fetch_assoc($result))
                        {
                      ?>
                         <tr>
                          <th scope="row"><?php echo $row['category_id'];?></th>
                          <td><?php echo $row['category_name'];?></td>
                          
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
if(isset($_POST['submit']))
{
$con=mysqli_connect('localhost','root','','project');
$cat=$_POST['category'];
$sql="INSERT INTO category (`category_id`,`category_name`) VALUES (0,'$cat')";
$result=mysqli_query($con,$sql);
if($result)
{
echo "<script>alert('Category Added');window.location='category.php'</script>";
}
}
?>
<?php
include 'footer.php';
?>