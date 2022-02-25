<?php
include 'header.php';
?>

<?php
$con=mysqli_connect('localhost','root','','project');
$sql="SELECT * FROM booking_details order by booked_date desc";
$result=mysqli_query($con,$sql);
?>

<div class="col-lg-6" style="width:1000px;margin-left:20px;">
              <div class="card">
                <div class="card-header border-bottom">
                  <h3 class="h1 mb-0">Booking Details</h3>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table text-sm mb-0 table-striped table-hover">
                      <thead>
                        <tr>
                          <th>Booking ID</th>
                          <th>User ID</th>
                          <th>Address</th>
                          <th>Delivery Date</th>
                          <th>Estimated Guest/Quantity</th>
                          <th>Date of booking</th>
                          <th>Booked Type</th>
                          <th>Payment</th>
                          <th>Status</th>
                          <th>Action</th>

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
                          <td><?php echo $row['payment'];?></td>
                          <td><?php echo $row['booking_status'];?></td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<td><a href="?confid=<?php echo $row['booking_id'];?>"><?php echo $row['booking_status']=='confirmed'?'':'Confirm';?></a></td>
                          
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
if(isset($_GET['confid']))
{
  $c_id=$_GET['confid'];
  $sql_query="UPDATE booking_details set booking_status='confirmed' where booking_id=$c_id";
  mysqli_query($con,$sql_query);
  echo "<script>alert('Booking Confirmed');window.location='admin_bkdetails.php'</script>";

}

?>

<?php
include 'footer.php';
?>