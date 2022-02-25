<?php
include 'header.php';
?>


<?php
if(isset($_GET['view']))
    {
?>
 <div class="form_box shadow">
 <form method="POST" action="">
 <div class="heading">
   Feedback 
 </div>
 <br/> 
 
 <p>Do give feedback to user? </p>
 <textarea name=" usrfeedback" rows="8" cols="40"></textarea>
  <input type="submit" name="submit" value="Submit Form">
</form>
</div>
<?php
    }

?>
 
 <section class="mb-5" style="margin-left:80px;margin-top:40px;">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-4 col-md-12">
             <div class="card">
                <div class="card-header border-bottom">
                  <h2 class="h5 fw-normal mb-0"><a class="card-collapse-link text-dark d-block" data-bs-toggle="collapse" href="#updates-box" aria-expanded="true">Feedbacks</a></h2>
                </div>
                <?php
                $con=mysqli_connect('localhost','root','','project');
                $sql1="SELECT * from feedback where reply=''";
                $result1=mysqli_query($con,$sql1);
                while($row=mysqli_fetch_assoc($result1))
                {
                ?>
                <div class="card-body p-0">
                  <div class="collapse show" id="updates-box" role="tabpanel">
                    <ul class="list-unstyled">
                      <!-- Item-->
                      <div class="p-3 d-flex justify-content-between">
                        <div class="d-flex"><i class="fas fa-rss text-gray-600"></i>
                          <div class="ms-3">
                            
                            <p class="mb-0 text-xs text-gray-500"><?php echo $row['feedback']?></p>
                            <a href='admin_feedback.php?view=<?php echo $row['feedback_id']?>'name="reply">reply</a>
                          </div>
                        </div>
                      </div>
                   </ul>
                 </div>
                 <?php
                }
                 ?>
               </div>
            </div>
          </div>
         </div>
             </div>
</section>
    

<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
<style>
*{box-sizing:border-box;}
body{font-family: 'Open Sans', sans-serif; color:#333; font-size:14px;  padding:100px;}
.form_box{width:400px; padding:10px; background-color:white;margin-left:590px;margin-top:20px}
input{padding:5px;  margin-bottom:5px;}
input[type="submit"]{border:none; outlin:none; background-color:#679f1b; color:white;}
.heading{color:black; height:40px; width:100%; line-height:40px; text-align:center;}
.shadow{
  -webkit-box-shadow: 0px 0px 17px 1px rgba(0,0,0,0.43);
-moz-box-shadow: 0px 0px 17px 1px rgba(0,0,0,0.43);
box-shadow: 0px 0px 17px 1px rgba(0,0,0,0.43);}
.pic{text-align:left; width:33%; float:left;}
</style>

<?php
$con=mysqli_connect('localhost','root','','project');
if(isset($_POST['submit']))
{
    $reply=$_POST['usrfeedback'];
    $sql2="UPDATE feedback set reply='$reply' where feedback_id=$_GET[view]";
    $result2=mysqli_query($con,$sql2);
    echo $sql2;
    if($result2)
    {
     echo"<script>window.alert('feedback submitted');window.location='admin_feedback.php';</script>";
    }
}

?>


<?php
include 'footer.php';
?>