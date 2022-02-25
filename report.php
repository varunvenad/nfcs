<?php
include 'header.php';
?>

<?php
if(isset($_POST['submit']))
{
    $sdate=$_POST['startdate'];
    $edate=$_POST['enddate'];

    $con=mysqli_connect('localhost','root','','project');

    $sql="SELECT * FROM booking_details where date>='$sdate' and date<='$edate'";
    $result=mysqli_query($con,$sql);
}
?>


<!-- Inline Form-->
<div class="col-lg-8">                           
              <div class="card" style="margin-left:200px;margin-top:20px">
                <div class="card-header border-bottom">
                  <h3 class="h4 mb-0">Get Report</h3>
                </div>
                <div class="card-body">
                  <form class="row g-3 align-items-center" method="POST">
                    <div class="col-lg">
                      <label class="visually-hidden" for="inlineFormInputGroupUsername"></label>
                      <div class="input-group" style="width:300px;">
                        <div class="input-group-text">Start date</div>
                        <input class="form-control" id="startdate" name="startdate" type="date">
                      </div>
                    </div>
                    <div class="col-lg">
                      <label class="visually-hidden" for="inlineFormInputGroupUsername"></label>
                      <div class="input-group" style="width:300px;">
                        <div class="input-group-text">End date</div>
                        <input class="form-control" id="enddate" name="enddate" type="date">
                      </div>
                    </div>
                    
                    <div class="col-lg">
                      <button class="btn btn-primary" name="submit" type="submit">Submit</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
<?php
if(isset($_POST['submit']))
{
?>
            <div class="col-lg-6" style="width:1000px;margin-left:50px;">
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
                          <th>Status</th>
                          <th>Payment</th>

                        </tr>
                      </thead>
                      <tbody>
                      <?php
                      $total=0;
                        while($row=mysqli_fetch_assoc($result))
                        {
                            $total=$row['payment']+$total;
                      ?>
                         <tr>
                          <th scope="row"><?php echo $row['booking_id'];?></th>
                          <td><?php echo $row['u_id'];?></td>
                          <td><?php echo $row['address'];?></td>
                          <td><?php echo date('d-m-y',strtotime($row['date']));?></td>
                          <td><?php echo $row['estimated_guest'];?></td>
                          <td><?php echo date('d-m-y',strtotime($row['booked_date']));?></td>
                          <td><?php echo $row['booked_type'];?></td>
                          <td><?php echo $row['booking_status'];?></td>
                          <td align=right><?php echo $row['payment'];?></td>
                          
                        </tr>
                        <?php
                        }
                        ?>
                        <tr>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td style="color:red;">Total</td>
                          <td align=right style="color:red;"><?php echo $total?></td>
                  
                      </tr>

                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <?php
          }
          ?>




<?php
include 'footer.php';
?>