<?php
include 'usrheader.php'
?>


<?php

$con=mysqli_connect('localhost','root','','project');
$sql="SELECT * FROM add_food_item";
$result=mysqli_query($con,$sql);
//$value=mysqli_fetch_assoc($result)
$colnum=3;

  $rnum=mysqli_num_rows($result);
  // $trws=$rnum/4;
  $trws=intdiv($rnum,$colnum);

  $r=$rnum%$colnum;

  if($r>0)
  {
    $trws=$trws+1;
  }
  
  //echo "$trws";
?>


<!-- BLOCK -->
<div class="m_contact"><span class="left_line1"> </span><span class="right_line1"> </span></div>



<!-- <form method="post"> -->




<div id="templatemo_content_wrapper_outter">

  <div id="templatemo_content_wrapper_inner">
      
        <div id="templatemo_content_top"></div>
        
        <div id="templatemo_content">
        
          <!-- <div class="section_w860"> -->
                <section id="about" class="home-section text-center">
      <!-- <div align="center"> -->
        <h1 align="center"></h1>
         <!-- <a href="services.php">Add New</a> -->
<table  align="center"  width="100%">	

<?php
      $i=0;
      $rc=0;
      while ($i<$trws) {
        $j=0;
    ?>
      <tr>
        <?php 
        while ($j<$colnum) {
          $row=mysqli_fetch_assoc($result);
          // $res=$row['image'];
          ?>
          
             
            <td style="font-weight:bold ;">
            <img src="images/<?php echo $row['food_img'] ?>" style="width:250px;height:250px;" />
            
           
        
          
            
      
            <br>
            <!--<hr style="height:5px;border: width 5px;;color:gray;background-color:red;width=50%;">-->
             <br>

            <?php echo " <b> Food Name :</b> "; ?> 
            <?php echo $row['food_name'] ?>
            <br>
            <?php echo "<b> Food Description :</b>"; ?> 
            <?php echo $row['food_desc'] ?>
            <br>
            <?php echo "<b> Price :</b>"; ?> 
            <?php echo $row['price'] ?>
            <br>
            <a href="?id=<?php echo $row['food_item_id']?>" >Add to Cart</a>
            <br>
            <br>
            <br>
            <br>
            </td>
            
          <?php
          // echo "<td><a href='#'><img src='uploads/$res' width='300' height='300'></a></td>";
          $rc=$rc+1;
          if($rc>=$rnum)
          {
            break;
          }
          
          $j=$j+1;
        }
        // print('hello');
        $i=$i+1;
        ?>
      </tr>
      <br>
    <?php
      }
    ?>
    

    <?php
    //echo "hai";
    if(isset($_GET['id']))
    {
    $fdid=$_GET['id'];
    $duplicate=mysqli_query($con,"select * from food_basket where food_item_id='$fdid' and u_id=$_SESSION[login_id] and status='pending'");
    if(mysqli_num_rows($duplicate)>0)
    {
      echo "<script>window.alert('Already added to cart !')";
    }
    else{

    $con=mysqli_connect('localhost','root','','project');
    $uid=$_SESSION['login_id'];
    $sql="INSERT into food_basket VALUES(0,$uid,$_GET[id],'pending')";
    $result=mysqli_query($con,$sql);
    $id=mysqli_insert_id($con);
    $_SESSION['basketid']=$id;
    //echo $sql;
    //echo "helo";
    }
    if($result)
    {
      echo "<script>window.alert('Added to basket');window.location='view_items.php';</script>";
    }
  }
    ?>

