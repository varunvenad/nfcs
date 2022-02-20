<?php
include 'usrheader.php'
?>

<?php
$con=mysqli_connect('localhost','root','','project');
$sql="SELECT * from food_basket WHERE u_id=$_SESSION[login_id]  and status='pending'";
$result1=mysqli_query($con,$sql);
$value=mysqli_fetch_assoc($result1);
?>

<?php
$con=mysqli_connect('localhost','root','','project');
$sql="SELECT add_food_item.*,food_basket.* FROM add_food_item inner join food_basket on food_basket.food_item_id=add_food_item.food_item_id where food_basket.u_id=$_SESSION[login_id] and food_basket.status='pending'";
$result2=mysqli_query($con,$sql);
?>
<form method="POST" action="">
<div class="col-lg-6" style="margin-left:360px;margin-top:200px;">
              <div class="card">
                <div class="card-header border-bottom">
                  <h3 class="h4 mb-0" style="color:black;">FOOD BASKET</h3>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table text-sm mb-0 table-striped table-sm">
                      <thead>
                        <tr>
                          <th>Sl No.</th>
                          <th>Item Name</th>
                          <th>Price</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                        $fname="";
                        $c=1;
                        $sum=0;
                        while($row=mysqli_fetch_assoc($result2))
                        {
                            $sum=$row['price']+$sum;

                              ?>
                              <tr>
                          <th scope="row"><?php echo $c;$c=$c+1?></th>
                          <td><?php echo $row['food_name'];;
                           ?></td>
                          <td><?php echo $row['price'];?></td>
                          <td><a href="?did=<?php echo $row['basket_id'];?>">Remove</a></td>
                          
                        </tr>
                        <?php
                        }
                        $_SESSION['sum']=$sum;
                        ?>
                        <tr>
                          <td></td>
                          <td>Total=</td>
                          <td><?php echo $sum;?></td>
                          <td></td>
                  
                      </tr>
                      </tbody>
                    </table>
                  </div>
                  <div>
                    <br>
                    <br>
                    <input type="submit" name="order" value="Proceed" style="background-color:lightblue;margin-left:570px">
                  </div>
                </div>
              </div>
            </div>
          </div>
                      </form>

<?php
$con=mysqli_connect('localhost','root','','project');
if(isset($_GET['did']))
{
  $d_id=$_GET['did'];
  $sql_query="delete from food_basket where basket_id=$d_id";
  mysqli_query($con,$sql_query);
  echo "<script>alert('Item deleted');window.location='food_basket.php'</script>";

}
if(isset($_POST['order']))
{
  echo "<script>window.location='booking.php'</script>";
}
?>
