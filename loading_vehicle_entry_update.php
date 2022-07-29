<?php
include_once('includes/header.php');
include_once('includes/check_login.php');
$uid=$_GET['id'];


    $uid=$_GET['id'];
    $data=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM `loading_vehicle_entry` where `id`='$uid'"));
    $unid = $data['rake_ref_id'];

if(isset($_POST['submit_sender'])){

    $dump = $_POST['dump'];
    $Vehicle = $_POST['Vehicle'];
    $Date = $_POST['Date'];
    $kata_slip_no = $_POST['kata_slip_no'];
    $c_challan_no = $_POST['c_challan_no'];
    $driver_licence_no = $_POST['driver_licence_no'];
    $tare_weight = $_POST['tare_weight'];
    $gross_weight = $_POST['gross_weight'];
    $net_weight = $_POST['net_weight'];
    $remark = $_POST['remark'];
    $material = $_POST['material'];
    $company = $_POST['company'];

    $update = mysqli_query($conn , "UPDATE `loading_vehicle_entry` SET `dump`='$dump',`Vehicle`='$Vehicle',`Date`='$Date',`kata_slip_no`='$kata_slip_no',`c_challan_no`='$c_challan_no',`driver_licence_no`='$driver_licence_no',`tare_weight`='$tare_weight',`gross_weight`='$gross_weight',`net_weight`='$net_weight',`remark`='$remark',`material`='$material',`company`='$company' WHERE `id`='$uid'");
    if($update){
        echo "<script>alert('success');window.location.replace('loading_vehicle_entry.php?id=$unid')</script>";
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
                                Rake [loading] update
                            </h2>

                        </div>
                        <div class="body">
                            <form id="sender_form" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="id"
                                    value="<?php if(isset($_GET['id'])) { echo $data['id']; } ?>">


                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="dump" name="dump" class="form-control"
                                            value="<?php echo @$data['dump']; ?>" required>
                                        <label class="form-label">dump</label>
                                    </div>
                                </div>

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="Vehicle" name="Vehicle" class="form-control"
                                            value="<?php echo @$data['Vehicle']; ?>" required>
                                        <label class="form-label">Vehicle</label>
                                    </div>
                                </div>
                        

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="date" id="Date" name="Date" class="form-control"
                                            value="<?php echo @$data['Date']; ?>" required>
                                        <label class="form-label">Date</label>
                                    </div>
                                </div>

                               

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="kata_slip_no" name="kata_slip_no" class="form-control"
                                            value="<?php echo @$data['kata_slip_no']; ?>" required>
                                        <label class="form-label">kata_slip_no</label>
                                    </div>
                                </div> 
                                
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="c_challan_no" name="c_challan_no" class="form-control"
                                            value="<?php echo @$data['c_challan_no']; ?>" required>
                                        <label class="form-label">c_challan_no</label>
                                    </div>
                                </div> 


                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="driver_licence_no" name="driver_licence_no" class="form-control"
                                            value="<?php echo @$data['driver_licence_no']; ?>" required>
                                        <label class="form-label">driver_licence_no</label>
                                    </div>
                                </div> 


                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="tare_weight" name="tare_weight" class="form-control"
                                            value="<?php echo @$data['tare_weight']; ?>" required>
                                        <label class="form-label">tare_weight</label>
                                    </div>
                                </div> 


                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="gross_weight" name="gross_weight" class="form-control"
                                            value="<?php echo @$data['gross_weight']; ?>" required>
                                        <label class="form-label">gross_weight</label>
                                    </div>
                                </div>  
                                
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="net_weight" name="net_weight" class="form-control"
                                            value="<?php echo @$data['net_weight']; ?>" required>
                                        <label class="form-label">net_weight</label>
                                    </div>
                                </div>  


                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="remark" name="remark" class="form-control"
                                            value="<?php echo @$data['remark']; ?>" required>
                                        <label class="form-label">remark</label>
                                    </div>
                                </div>  

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="material" name="material" class="form-control"
                                            value="<?php echo @$data['material']; ?>" required>
                                        <label class="form-label">material</label>
                                    </div>
                                </div>


                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="company" name="company" class="form-control"
                                            value="<?php echo @$data['company']; ?>" required>
                                        <label class="form-label">company</label>
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