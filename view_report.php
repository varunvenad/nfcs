<?php
include 'header.php';
?>


<?php
$con=mysqli_connect('localhost','root','','project');
$sql="SELECT count(booking_id) FROM booking_details";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($result)
?>

<?php
$con=mysqli_connect('localhost','root','','project');
$sql="SELECT count(booking_status) FROM booking_details where booking_status='confirmed'";
$result2=mysqli_query($con,$sql);
$row2=mysqli_fetch_assoc($result2)
?>

<?php
$con=mysqli_connect('localhost','root','','project');
$sql="SELECT count(booking_status) FROM booking_details where booking_status='pending'";
$result3=mysqli_query($con,$sql);
$row3=mysqli_fetch_assoc($result3)
?>

<?php
$con=mysqli_connect('localhost','root','','project');
$sql="SELECT count(booking_status) FROM booking_details where booking_status='cancelled'";
$result4=mysqli_query($con,$sql);
$row4=mysqli_fetch_assoc($result4)
?>


            <div class="col-lg-4" style="width:1300px;margin-top:10px;margin-left:20px">
              <!-- total bookings-->
              <div class="card text-center h-100 mb-0">
                <div class="card-body">
                  <svg class="svg-icon svg-icon-big svg-icon-light mb-4 text-muted">
                    <use xlink:href="#sales-up-1"> </use>
                  </svg>
                  <p class="text-gray-700 display-6" ><?php echo $row['count(booking_id)']?></p>
                  <p class="text-primary h2 fw-bold">Total Bookings</p>

                </div>
              </div>
            </div>

            <div class="col-lg-4" style="width:1300px;margin-top:10px;margin-left:20px">
              <!-- total confirmed bookings-->
              <div class="card text-center h-100 mb-0">
                <div class="card-body">
                  <svg class="svg-icon svg-icon-big svg-icon-light mb-4 text-muted">
                    <use xlink:href="#sales-up-1"> </use>
                  </svg>
                  <p class="text-gray-700 display-6" ><?php echo $row2['count(booking_status)']?></p>
                  <p class="text-primary h2 fw-bold">Confirmed Bookings</p>

                </div>
              </div>
            </div>

            <div class="col-lg-4" style="width:1300px;margin-top:10px;margin-left:20px">
              <!-- total pending bookings-->
              <div class="card text-center h-100 mb-0">
                <div class="card-body">
                  <svg class="svg-icon svg-icon-big svg-icon-light mb-4 text-muted">
                    <use xlink:href="#sales-up-1"> </use>
                  </svg>
                  <p class="text-gray-700 display-6" ><?php echo $row3['count(booking_status)']?></p>
                  <p class="text-primary h2 fw-bold">Pending Bookings</p>

                </div>
              </div>
            </div>

            <div class="col-lg-4" style="width:1300px;margin-top:10px;margin-left:20px">
              <!-- total cancelled bookings-->
              <div class="card text-center h-100 mb-0">
                <div class="card-body">
                  <svg class="svg-icon svg-icon-big svg-icon-light mb-4 text-muted">
                    <use xlink:href="#sales-up-1"> </use>
                  </svg>
                  <p class="text-gray-700 display-6" ><?php echo $row4['count(booking_status)']?></p>
                  <p class="text-primary h2 fw-bold">Cancelled Bookings</p>

                </div>
              </div>
            </div>
      
  



<?php
include 'footer.php';
?>