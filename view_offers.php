<?php
include 'usrheader.php'
?>

<?php
$con=mysqli_connect('localhost','root','','project');
$sql="SELECT * FROM add_offers";
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
            
            
           
        
          
            
      
            <br>
           <!-- <hr style="height:5px;border: width 5px;;color:gray;background-color:red;margin:auto;width=50%";>-->
             <br>

            <?php echo " <b> Offer Item :</b> "; ?> 
            <?php echo $row['offer_item_name'] ?>
            <br>
            <?php echo "<b> Offer Description :</b>"; ?> 
            <?php echo $row['offer_desc'] ?>
            <br>
            <?php echo "<b> Price :</b>"; ?> 
            <?php echo $row['offr_price'] ?>
            <br>
            <?php echo "<b> Min Quantity(in kg/litre) :</b>"; ?> 
            <?php echo $row['min_quantity'] ?>
            <br>
            <?php echo "<b> Valid From :</b>"; ?> 
            <?php echo $row['valid_from'] ?>
            <br>
            <?php echo "<b> Valid To :</b>"; ?> 
            <?php echo $row['valid_to'] ?>
            <br>
            <br>
            <a href="offer_book.php?id=<?php echo $row['offer_id']?>" >Book</a>
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