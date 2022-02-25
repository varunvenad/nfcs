<?php
include 'usrheader.php'
?>


<?php
$con=mysqli_connect('localhost','root','','project');
$sql="SELECT * FROM booking_details where u_id=$_SESSION[login_id]";
$result=mysqli_query($con,$sql);
?>

<div class="col-lg-6" style="width:950px; margin-left:300px;margin-top:200px;">
              <div class="card">
                <div class="card-header border-bottom">
                  <h3 class="h4 mb-0" style="color:black;">Booking History</h3>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table text-sm mb-0 table-striped table-hover">
                      <thead>
                        <tr>
                          <th>Booking id</th>
                          <th>User ID</th>
                          <th>Address</th>
                          <th>Delivery Date</th>
                          <th>Estimated Guest/Quantity</th>
                          <th>Date of booking</th>
                          <th>Booked Type</th>
                          <th>Status</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                        while($row=mysqli_fetch_assoc($result))
                        {
                      ?>
                         <tr>
                          <th scope="row"><?php echo $row['booking_id'];?></th>
                          <td><?php echo $row['u_id'];?></td>
                          <td><?php echo $row['address'];?></td>
                          <td><?php echo date('d-m-y',strtotime($row['date']));?></td>
                          <td><?php echo $row['estimated_guest'];?></td>
                          <td><?php echo date('d-m-y',strtotime($row['booked_date']));?></td>
                          <td><?php echo $row['booked_type'];?></td>
                          <td><?php echo $row['booking_status'];?><a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a><a href="?cancelid=<?php echo $row['booking_id'];?>"><?php echo $row['booking_status']=='cancelled'?'':'Cancel';?></a></td>
                          
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
if(isset($_GET['cancelid']))
{
  $c_id=$_GET['cancelid'];
  $sql_query="UPDATE booking_details set booking_status='cancelled' where booking_id=$c_id";
  mysqli_query($con,$sql_query);
  echo "<script>alert('Booking Cancelled);window.location='user_bkdetails.php'</script>";

}

?>