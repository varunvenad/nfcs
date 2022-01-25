<?php
include 'header.php';
$get=$_GET['id'];
$con=mysqli_connect('localhost','root','','project');
$sql="SELECT * FROM category where category_id=$get";
$result=mysqli_query($con,$sql);
$value=mysqli_fetch_assoc($result);
?>

<!-- Inline Form-->
<div class="col-lg-8"style="width:500px;margin:auto;top:50%;left:50%;margin-top:150px;margin-left:450px">                           
              <div class="card">
                <div class="card-header border-bottom">
                  <h3 class="h4 mb-0">Edit Category</h3>
                </div>
                <div class="card-body">
                  <form class="row g-3 align-items-center"  method="POST" action="">
                    <div class="col-lg">
                      <label class="visually-hidden" for="inlineFormInputGroupUsername">Category</label>
                      <div class="input-group">
                        
                        <input class="form-control" id="inlineFormInputGroupUsername" value="<?php echo $value['category_name']?>" name="category" type="text" placeholder="Add category" required>
                      </div>
                    </div>
                    
                    <div class="col-lg" style="padding:10px">
                      <input class="btn btn-primary" name="submit" type="submit">
                    </div>
                  </form>
                </div>
              </div>
            </div>



<?php
if(isset($_POST['submit']))
{
$con=mysqli_connect('localhost','root','','project');
$cat=$_POST['category'];
$sql="UPDATE category set category_name='$cat' where category_id=".$value['category_id']."";
$result=mysqli_query($con,$sql);
if($result)
{
echo "<script>alert('Category Updated');window.location='category.php'</script>";
}
}
?>
<?php
include 'footer.php';
?>