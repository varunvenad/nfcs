<?php
include 'usrheader.php'
?>

<?php
$con=mysqli_connect('localhost','root','','project');
$sql="SELECT * from food_basket WHERE u_id=$_SESSION[login_id]";
$result=mysqli_query($con,$sql);
$value=mysqli_fetch_assoc($result);
?>
<?php
$con=mysqli_connect('localhost','root','','project');
//$sql="SELECT add_packages.* FROM add_packages ";

$sql="SELECT add_food_item.* FROM add_food_item inner join food_basket on food_basket.food_item_id=add_food_item.food_item_id where food_basket.u_id=$_SESSION[login_id]";
$result=mysqli_query($con,$sql);
?>

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
                        while($row=mysqli_fetch_assoc($result))
                        {
                            
                              ?>
                              <tr>
                          <th scope="row"><?php echo $c;$c=$c+1?></th>
                          <td><?php echo $row['food_name'];;
                           ?></td>
                          <td><?php echo $row['price'];?></td>
                          <td><a href="?deleteid=<?php echo $row['package_id'];?>">Delete</a></td>
                          
                        </tr>
                        <?php
                        }
                        ?>
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
