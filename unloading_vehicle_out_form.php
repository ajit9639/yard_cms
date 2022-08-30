<?php
include_once('includes/header.php');
include_once('includes/check_login.php');
$uid=$_GET['id'];

    $uid=$_GET['id'];
    $data=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM `unloading_vehicle_in_temp` where `id`='$uid'"));
    $unid = $data['unloading_ref_id'];
	$vno1 = $data['Vehicle_No'];

if($type == 'delete'){
$del = mysqli_query($conn, "DELETE FROM `unloading_vehicle_in_temp` WHERE `id`='$id'");
if($del){
    echo "<script>alert('Data Deleted Successfully');
    window.location.replace('unloading_vehicle_entry.php?id=$unid');
    </script>";
}else{
    echo "<script>alert('Data Deleted Failed');</script>";
}
}

// vehicle out
if(isset($_POST['vehicle_out'])){
    $id=$_GET['id'];  
    $vehicle_no = $_POST['vehicle_no'];
  	$vehicle_type = $_POST['vehicle_type'];
  	$date = $_POST['date'];
    $trans_challan = $_POST['trans_challan'];
    $company_challan = $_POST['company_challan'];
    $company_permit = $_POST['company_permit'];
    $tare_weight = $_POST['tare_weight'];
    $gross_weight = $_POST['gross_weight'];
    $shield_no = $_POST['shield_no'];
    $fuel_slip_no = $_POST['fuel_slip_no'];
    $fuel_qty = $_POST['fuel_qty'];
    $toll_tax_amt = $_POST['toll_tax_amt'];
    $adv_amt = $_POST['adv_amt'];
    $remark = $_POST['remark'];

  //echo "INSERT INTO `unloading_vehicle_out_temp`(`vehicle_no`,`trans_challan`, `company_challan`, `company_permit`, `tare_weight`, `gross_weight`, `shield_no`, `fuel_slip_no`, `fuel_qty`, `toll_tax_amt`, `adv_amt`, `remark`, `unloading_ref_id`,`status`) VALUES ('$vehicle_no','$trans_challan','$company_challan','$company_permit','$tare_weight','$gross_weight','$shield_no','$fuel_slip_no','$fuel_qty','$toll_tax_amt','$adv_amt','$remark','$id','0')";
  
    $insert = mysqli_query($conn , "INSERT INTO `unloading_vehicle_out_temp`(`vehicle_no`,`vehicle_type`,`date`,`trans_challan`, `company_challan`, `company_permit`, `tare_weight`, `gross_weight`, `shield_no`, `fuel_slip_no`, `fuel_qty`, `toll_tax_amt`, `adv_amt`, `remark`, `unloading_ref_id`,`status`,`kata_status`) VALUES ('$vehicle_no','$vehicle_type','$date','$trans_challan','$company_challan','$company_permit','$tare_weight','$gross_weight','$shield_no','$fuel_slip_no','$fuel_qty','$toll_tax_amt','$adv_amt','$remark','$unid','0','1')");
	
  //echo "UPDATE `unloading_vehicle_in_temp` SET `status`='1' WHERE `id`='$id'";exit();
  
     if($insert){
    mysqli_query($conn , "UPDATE `unloading_vehicle_in_temp` SET `status`='1' WHERE `id`='$uid'");
       
    echo "<script>alert('Success');
    window.location.replace('unloading_vehicle_entry.php?id=$unid');
    </script>";                    
    
}
}
?>



<body class="theme-red">
    <!-- Page Loader -->

    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->
    <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons">search</i>
        </div>
        <input type="text" placeholder="START TYPING...">
        <div class="close-search">
            <i class="material-icons">close</i>
        </div>
    </div>
    <!-- #END# Search Bar -->
    <?php include_once('includes/sidebar.php'); ?>

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <!-- <h2>Manage Material</h2> -->
            </div>

            <!-- Vertical Layout | With Floating Label -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card" id="card">
                        <div class="header">
                            <h2 class="text-center">
                                Vehicle Out
                            </h2>

                        </div>
                        <div class="body">
                            <form id="sender_form" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="id"
                                    value="<?php if(isset($_GET['id'])) { echo $data['id']; } ?>">


                                <div class="form-group form-float">
                                    <div class="form-line">
                                      <input type="text" id="vehicle_no" name="vehicle_no" class="form-control"
                                            value="<?php echo $vno1; ?>" readonly>
                                      
                                      <!--<select name="vehicle_no" id="" class="form-control" >
                                            <option selected> Select Vehicle_No</option>
                                            <?php 
                                                $daata = mysqli_query($conn , "SELECT * FROM `vehicle_reg`");
                                                while($get_type = mysqli_fetch_assoc($daata)){
                                                ?>
                                            <option value="<?php echo $get_type['Vehicle_No']?>">
                                                <?php echo $get_type['Vehicle_No']?></option>
                                            <?php } ?>
                                        </select>-->
                          
                                        <label class="form-label">Vehicle_No</label>
                                    </div>
                                </div>
                              
                              <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="vehicle_type" name="vehicle_type" class="form-control"
                                            value="<?php echo @$data['vehicle_type']; ?>"  readonly>                                    
                                        <label class="form-label">vehicle_type</label>
                                    </div>
                                </div>
                                
                                <div class="form-group form-float">
                                    <div class="form-line focused">
                                        <input type="datetime-local" id="date" name="date" class="form-control"
                                            value="<?php echo @$data['date']; ?>"  >                                    
                                        <label class="form-label">date</label>
                                    </div>
                                </div>
                                
                                

                              <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="trans_challan" name="trans_challan" class="form-control"
                                            value="<?php echo @$data['trans_challan']; ?>" >                                    
                                        <label class="form-label">Transportation Challan No</label>
                                    </div>
                                </div>
                              
                              
                             			 
                        

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="company_challan" name="company_challan" class="form-control"
                                            value="<?php echo @$data['company_challan']; ?>" >
                                        <label class="form-label">Company Challan No</label>
                                    </div>
                                </div>

                               

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="tare_weight" name="tare_weight" class="form-control"
                                            value="<?php echo @$data['tare_weight']; ?>" >
                                        <label class="form-label">Tare Weight</label>
                                    </div>
                                </div> 
                                
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="gross_weight" name="gross_weight" class="form-control"
                                            value="<?php echo @$data['gross_weight']; ?>" >
                                        <label class="form-label">Gross_weight</label>
                                    </div>
                                </div> 


                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="shield_no" name="shield_no" class="form-control"
                                            value="<?php echo @$data['shield_no']; ?>" >
                                        <label class="form-label">Shield_no</label>
                                    </div>
                                </div> 


                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="fuel_slip_no" name="fuel_slip_no" class="form-control"
                                            value="<?php echo @$data['fuel_slip_no']; ?>" >
                                        <label class="form-label">fuel_slip_no</label>
                                    </div>
                                </div> 


                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="fuel_qty" name="fuel_qty" class="form-control"
                                            value="<?php echo @$data['fuel_qty']; ?>" >
                                        <label class="form-label">fuel_qty</label>
                                    </div>
                                </div>             
                              
                              <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="toll_tax_amt" name="toll_tax_amt" class="form-control"
                                            value="<?php echo @$data['toll_tax_amt']; ?>" >
                                        <label class="form-label">toll_tax_amt</label>
                                    </div>
                                </div>
                              
                              <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="adv_amt" name="adv_amt" class="form-control"
                                            value="<?php echo @$data['adv_amt']; ?>" >
                                        <label class="form-label">adv_amt</label>
                                    </div>
                                </div>
                              
                              <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="remark" name="remark" class="form-control"
                                            value="<?php echo @$data['remark']; ?>" >
                                        <label class="form-label">Remark</label>
                                    </div>
                                </div>

                                <button class="btn btn-primary waves-effect submit_sender" name="vehicle_out"
                                    type="submit">SUBMIT</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Vertical Layout | With Floating Label -->

        </div>
    </section>
    <?php include_once('includes/footer.php'); ?>
</body>