<?php

include('config.php');

 if(isset($_POST['$countryid'])){
   
   $cid = $_POST['$countryid'];
  //  echo "<script>alert($cid)</script>";


  

  $query=mysqli_query($conn,"SELECT * FROM `vehicle_reg` where `Vehicle_No` = '$cid'"); ?>
  <?php
    while($rw = mysqli_fetch_array($query))
    {
     ?>      
     <input type="text" name="vehicle_type" value="<?php echo $rw['Vehicle_Type'];?>" class="form-control" readonly/>
 <!--<input type="text" name="vehicle_type" value="<?php echo $rw['Vehicle_Type'];?>"  class="form-control" readonly/>-->
                  
<?php }} 