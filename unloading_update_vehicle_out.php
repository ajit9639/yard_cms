<?php
include_once('includes/header.php');
include_once('includes/check_login.php');
$uid=$_GET['id'];

    $uid=$_GET['id'];
    $data=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM `unloading_vehicle_out_temp` where `id`='$uid'"));
    $unid = $data['unloading_ref_id'];

if(isset($_POST['submit_sender'])){

    // echo "<pre>";
    // print_r($_POST);
    // exit();
    $Vehicle_no = $_POST['Vehicle_no'];
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

    $update = mysqli_query($conn , "UPDATE `unloading_vehicle_out_temp` SET `vehicle_no`='$Vehicle_no',`trans_challan`='$trans_challan',`company_challan`='$company_challan',`company_permit`='$company_permit',`tare_weight`='$tare_weight',`gross_weight`='$gross_weight',`shield_no`='$shield_no',`fuel_slip_no`='$fuel_slip_no',`fuel_qty`='$fuel_qty',`toll_tax_amt`='$toll_tax_amt',`adv_amt`='$adv_amt',`remark`='$remark' WHERE `id`='$uid'");
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
                                        <input type="text" id="Vehicle_no" name="Vehicle_no" class="form-control"
                                            value="<?php echo @$data['vehicle_no']; ?>" required>
                                        <label class="form-label">vehicle_no</label>
                                    </div>
                                </div>

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="trans_challan" name="trans_challan" class="form-control"
                                            value="<?php echo @$data['trans_challan']; ?>" required>
                                        <label class="form-label">trans_challan</label>
                                    </div>
                                </div>
                        

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="company_challan" name="company_challan" class="form-control"
                                            value="<?php echo @$data['company_challan']; ?>" required>
                                        <label class="form-label">company_challan</label>
                                    </div>
                                </div>

                               

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="company_permit" name="company_permit" class="form-control"
                                            value="<?php echo @$data['company_permit']; ?>" required>
                                        <label class="form-label">company_permit</label>
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
                                        <input type="text" id="tare_weight" name="tare_weight" class="form-control"
                                            value="<?php echo @$data['tare_weight']; ?>" required>
                                        <label class="form-label">tare_weight</label>
                                    </div>
                                </div> 


                               


                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="shield_no" name="shield_no" class="form-control"
                                            value="<?php echo @$data['shield_no']; ?>" required>
                                        <label class="form-label">shield_no</label>
                                    </div>
                                </div> 


                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="fuel_slip_no" name="fuel_slip_no" class="form-control"
                                            value="<?php echo @$data['fuel_slip_no']; ?>" required>
                                        <label class="form-label">fuel_slip_no</label>
                                    </div>
                                </div>   
                                
                                
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="fuel_qty" name="fuel_qty" class="form-control"
                                            value="<?php echo @$data['fuel_qty']; ?>" required>
                                        <label class="form-label">fuel_qty</label>
                                    </div>
                                </div>   



                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="toll_tax_amt" name="toll_tax_amt" class="form-control"
                                            value="<?php echo @$data['toll_tax_amt']; ?>" required>
                                        <label class="form-label">toll_tax_amt</label>
                                    </div>
                                </div>   


                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="adv_amt" name="adv_amt" class="form-control"
                                            value="<?php echo @$data['adv_amt']; ?>" required>
                                        <label class="form-label">adv_amt</label>
                                    </div>
                                </div>   


                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="remark" name="remark" class="form-control"
                                            value="<?php echo @$data['remark']; ?>" required>
                                        <label class="form-label">remark</label>
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