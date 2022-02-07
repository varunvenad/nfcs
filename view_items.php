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
  
  echo "$trws";
?>


<!-- BLOCK -->
<div class="m_contact"><span class="left_line1"> </span>Food Items<span class="right_line1"> </span></div>



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
            <img src="images/<?php echo $row['food_img'] ?>" style="width:250px;height:300px;" />
            
           
        
          
            
      
            <br>
            <hr style="height:5px;border: width 5px;;color:gray;background-color:red;width=50%;">
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
            <button name="addtocart[]" value="<?php echo $row['food_item_id']?>" >Add to Cart</button>
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
    
    if(isset($_POST['addtocart']))
    {
    $con=mysqli_connect('localhost','root','','project');
    $uid=$_SESSION['login_id'];
    $addtocart="";
    foreach($_POST['addtocart'] as $i)
    {
      $addtocart=$addtocart.",".$i;
    }
    $sql="INSERT into food_basket VALUES(0,$uid,$addtocart)";
    $result=mysqli_query($con,$sql);
    echo $sql;
    if($result)
    {
      echo "<script>window.alert('Added to basket');</script>";
    }
    }
    ?>

