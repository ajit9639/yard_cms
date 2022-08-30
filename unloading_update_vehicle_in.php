<?php
include_once('includes/header.php');
include_once('includes/check_login.php');
$uid=$_GET['id'];


    $uid=$_GET['id'];
    $data=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM `unloading_vehicle_in_temp` where `id`='$uid'"));
    $unid = $data['unloading_ref_id'];

if(isset($_POST['submit_sender'])){

    $Vehicle_No = $_POST['Vehicle_No'];
    $vehicle_type = $_POST['vehicle_type'];
    $loading_slip_no = $_POST['loading_slip_no'];
    $Date = $_POST['Date'];
    $Tare_Weight = $_POST['Tare_Weight'];
    $kata_slip_no = $_POST['kata_slip_no'];
    $D_License_No = $_POST['D_License_No'];
    $Remarks = $_POST['Remarks'];

    $update = mysqli_query($conn , "UPDATE `unloading_vehicle_in_temp` SET `Vehicle_No`='$Vehicle_No',`vehicle_type`='$vehicle_type',`loading_slip_no`='$loading_slip_no',`Date`='$Date',`Tare_Weight`='$Tare_Weight',`kata_slip_no`='$kata_slip_no',`D_License_No`='$D_License_No',`Remarks`='$Remarks' WHERE `id`='$uid'");
    if($update){
        echo "<script>alert('success');window.location.replace('unloading_vehicle_entry.php?id=$unid')</script>";
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
                                Rake [Unloading] update
                            </h2>

                        </div>
                        <div class="body">
                            <form id="sender_form" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="id"
                                    value="<?php if(isset($_GET['id'])) { echo $data['id']; } ?>">


                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="Vehicle_No" name="Vehicle_No" class="form-control"
                                            value="<?php echo @$data['Vehicle_No']; ?>" >
                                        <label class="form-label">Vehicle_No</label>
                                    </div>
                                </div>

                              <div class="form-group form-float">
                                    <div class="form-line">
                                        <!--<input type="text" id="vehicle_type" name="vehicle_type" class="form-control"
                                            value="<?php echo @$data['vehicle_type']; ?>" >-->
                                      <select id="vehicle_type" name="vehicle_type" class="form-control" >
                                            <option disabled>Vehicle Type</option>
                                            <option value="<?php echo $data['vehicle_type']; ?>" selected>
                                                <?php echo @$data['vehicle_type']; ?>
                                              <?php $dat = mysqli_query($conn , "SELECT * FROM `vehicle`");
                                            while($row= mysqli_fetch_assoc($dat)){
                                            ?>
                                            <option value="<?php  echo $row['name']?>"><?php echo $row['name']?>
                                            </option>
                                            <?php } ?>
                                        </select>
                                        <label class="form-label">vehicle_type</label>
                                    </div>
                                </div>
                              
                              
                             			 
                        

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="loading_slip_no" name="loading_slip_no" class="form-control"
                                            value="<?php echo @$data['loading_slip_no']; ?>" >
                                        <label class="form-label">loading_slip_no</label>
                                    </div>
                                </div>

                               

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="date" id="Date" name="Date" class="form-control"
                                            value="<?php echo @$data['Date']; ?>" >
                                        <label class="form-label">Date</label>
                                    </div>
                                </div> 
                                
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="Tare_Weight" name="Tare_Weight" class="form-control"
                                            value="<?php echo @$data['Tare_Weight']; ?>" >
                                        <label class="form-label">Tare_Weight</label>
                                    </div>
                                </div> 


                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="kata_slip_no" name="kata_slip_no" class="form-control"
                                            value="<?php echo @$data['kata_slip_no']; ?>" >
                                        <label class="form-label">kata_slip_no</label>
                                    </div>
                                </div> 


                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="D_License_No" name="D_License_No" class="form-control"
                                            value="<?php echo @$data['D_License_No']; ?>" >
                                        <label class="form-label">D_License_No</label>
                                    </div>
                                </div> 


                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="Remarks" name="Remarks" class="form-control"
                                            value="<?php echo @$data['Remarks']; ?>" >
                                        <label class="form-label">Remarks</label>
                                    </div>
                                </div>                             

                                <button class="btn btn-primary waves-effect submit_sender" name="submit_sender"
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