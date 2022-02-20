<?php
include 'usrheader.php'
?>

<?php
$con=mysqli_connect('localhost','root','','project');
$sql="SELECT * FROM add_packages";
$result3=mysqli_query($con,$sql);
?>
<?php
$con=mysqli_connect('localhost','root','','project');
$sql="SELECT * FROM add_packages";
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
      while ($i<=$trws) {
        $j=0;
    ?>
      <tr>
        <?php 
        $p=0;
        while ( $row=mysqli_fetch_assoc($result)) {
        $p++;
       
          // $res=$row['image'];
          ?>
          
             
            <td style="font-weight:bold ;">
            <img src="images/<?php echo $row['pkg_img'] ?>" style="width:250px;height:250px;" />
            
           
        
          
            
      
            <br>
           <!-- <hr style="height:5px;border: width 5px;;color:gray;background-color:red;margin:auto;width=50%";>-->
             <br>

            <?php echo " <b> Package Description :</b> "; ?> 
            <?php echo $row['pkg_desc'] ?>
            <br>
            <?php echo "<b> Package Items :</b>"; ?> 
            <?php 
            $fname="";
                      
                    
                       //$pkgp=$row['pkg_price'];
          
                       $tmp=EXPLODE(',',$row['food_list']);
                       $fname="";
                       $foodItemsID=array_slice($tmp,1,count($tmp));
                      foreach($foodItemsID as $i)
                      {  
     
                      $sql2="SELECT * FROM add_food_item where food_item_id=$i";
  $results=mysqli_query($con,$sql2);
  $tmpp=mysqli_fetch_assoc($results);
  $fname=$fname."<br>".$tmpp['food_name'];
 
      }
    
    echo $fname; ?>
            <br>
            <?php echo "<b> Price :</b>"; ?> 
            <?php echo $row['pkg_price'] ?>
            <br>
            <a href="pkg_book.php?id=<?php echo $row['package_id']?>" >Book</a>
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
     if($p%3==0)
     {
       echo "<br>";
     }
      }
    ?>

  <?php
 
  ?>

