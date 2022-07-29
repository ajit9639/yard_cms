<?php
include_once('includes/header.php');
include_once('includes/check_login.php');

$id =$_GET['id'];

$rake_open_data=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM `unloading_rake_opening` WHERE `id`='$id'"));
$type = $_GET['type'];
// delete
if($type == 'delete'){
$del = mysqli_query($conn, "DELETE FROM `unloading_vehicle_in_temp` WHERE `id`='$id'");
if($del){
    echo "<script>alert('Data Deleted Successfully');
    window.location='unloading_checkpost1.php';
    </script>";
}else{
    echo "<script>alert('Data Deleted Failed');</script>";
}
}elseif($type == 'outdelete'){
    $del = mysqli_query($conn, "DELETE FROM `unloading_vehicle_out_temp` WHERE `id`='$id'");
    if($del){
        echo "<script>alert('Data Deleted Successfully');
        window.location='unloading_checkpost1.php';
        </script>";
    }else{
        echo "<script>alert('Data Deleted Failed');</script>";
    }
}
else{

if(isset($_POST['submit_sender']))
{

$id=$_GET['id'];    
$Vehicle_No = $_POST['Vehicle_No'];
$vehicle_type = $_POST['vehicle_type'];
$Date = $_POST['Date'];
$Loading_Slip_No = $_POST['Loading_Slip_No'];
$Tare_Weight = $_POST['Tare_Weight'];
$D_License_No = $_POST['D_License_No'];
$Remarks = $_POST['Remarks'];
$kata_slip_no = $_POST['kata_slip_no'];
$unloading_ref_id = $_GET['id'];

// echo "INSERT INTO `unloading_vehicle_entry`(`Vehicle_No`, `Date`, `Tare_Weight`, `kata_slip_no`, `D_License_No`, `Remarks`, `unloading_ref_id`) VALUES ('$Vehicle_No','$Date','$Tare_Weight','$kata_slip_no','$D_License_No','$Remarks','$unloading_ref_id')";exit();
        // if ($id == '') {
            $vehicle_in = mysqli_query($conn, "INSERT INTO `unloading_vehicle_in_temp`(`Vehicle_No`,`vehicle_type`,`loading_slip_no`,`Date`, `Tare_Weight`, `kata_slip_no`, `D_License_No`, `Remarks`, `unloading_ref_id`,`status`) VALUES ('$Vehicle_No','$vehicle_type','$Loading_Slip_No','$Date','$Tare_Weight','$kata_slip_no','$D_License_No','$Remarks','$unloading_ref_id','0')");
            
            if($vehicle_in){
                echo "<script>alert('Success');
                window.location.replace('unloading_vehicle_entry.php?id=$id');
                </script>";
            }else{
                echo "<script>alert('Data Inserted Failed');</script>";
            }
            
            $id = mysqli_insert_id($conn);
        // } else {
            // mysqli_query($conn, "UPDATE `unloading_vehicle_entry` SET `Vehicle_No`='$Vehicle_No',`Date`='$Date',`Tare_Weight`='$Tare_Weight',`D_License_No`='$D_License_No',`Remarks`='$Remarks',`unloading_ref_id`='$unloading_ref_id' where id='$id'");
        // }

        // echo '<script>alert("Data updated successfully"); window.location="unloading_checkpost1.php";</script>';
}

// vehicle out
if(isset($_POST['vehicle_out'])){
    $id=$_GET['id'];  
    $vehicle_no = $_POST['vehicle_no'];
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
                
    $insert = mysqli_query($conn , "INSERT INTO `unloading_vehicle_out_temp`(`vehicle_no`,`trans_challan`, `company_challan`, `company_permit`, `tare_weight`, `gross_weight`, `shield_no`, `fuel_slip_no`, `fuel_qty`, `toll_tax_amt`, `adv_amt`, `remark`, `unloading_ref_id`,`status`) VALUES ('$vehicle_no','$trans_challan','$company_challan','$company_permit','$tare_weight','$gross_weight','$shield_no','$fuel_slip_no','$fuel_qty','$toll_tax_amt','$adv_amt','$remark','$id','0')");

    if($insert){
    mysqli_query($conn , "UPDATE `unloading_vehicle_in_temp` SET `status`='1' WHERE `unloading_ref_id`='$id'");
    }   
    }
// if(isset($_GET['id']))
// {
//     $uid=$_GET['id'];
//     $data=mysqli_fetch_assoc(mysqli_query($conn,"select * from `unloading_vehicle_entry` where id='$uid'"));
// }
}
?>

<!-- model vehicle out -->
<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Vehicle Out Entry</h4>
            </div>
            <div class="modal-body">
                <form method="POST">
                    <div class="row vehicle-out">

                        <div class="col-sm-6 ">
                            <label for="usr">Vehicle No:</label>
                            <input type="text" class="form-control" name="vehicle_no">
                        </div>

                        <div class="col-sm-6 ">
                            <label for="pwd">Transp Challan:</label>
                            <input type="text" class="form-control" name="trans_challan" required>
                        </div>

                        <div class="col-sm-6 ">
                            <label for="pwd">Company Challan:</label>
                            <input type="text" class="form-control" name="company_challan" required>
                        </div>

                        <!-- <div class="col-sm-6 ">
                            <label for="pwd">Company Road Permit:</label>
                            <input type="text" class="form-control" name="company_permit" required>
                        </div> -->

                        <div class="col-sm-6 ">
                            <label for="pwd">Tare Weight(kg):</label>
                            <input type="text" class="form-control" name="tare_weight" required>
                        </div>

                        <div class="col-sm-6 ">
                            <label for="pwd">Gross Weight(kg):</label>
                            <input type="text" class="form-control" name="gross_weight" required>
                        </div>

                        <div class="col-sm-6 ">
                            <label for="pwd">Shield No:</label>
                            <input type="text" class="form-control" name="shield_no" required>
                        </div>

                        <div class="col-sm-6 ">
                            <label for="pwd">Fuel Slip No:</label>
                            <input type="text" class="form-control" name="fuel_slip_no" required>
                        </div>

                        <div class="col-sm-6 ">
                            <label for="pwd">Fuel Qty (ltr):</label>
                            <input type="text" class="form-control" name="fuel_qty" required>
                        </div>

                        <div class="col-sm-6 ">
                            <label for="pwd">Toll Tax Amt:</label>
                            <input type="text" class="form-control" name="toll_tax_amt" required>
                        </div>

                        <div class="col-sm-6 ">
                            <label for="pwd">Adv. Amount:</label>
                            <input type="text" class="form-control" name="adv_amt" required>
                        </div>

                        <div class="col-sm-6 ">
                            <label for="pwd">Remarks:</label>
                            <input type="text" class="form-control" name="remark" required>
                        </div>

                        <div class="col-sm-6" style="text-align: center;">
                            <br>
                            <input type="submit" class="btn btn-danger" name="vehicle_out" value="submit">
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<!-- //model vehicle out -->

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
                                Unloading Vehicle Entry
                            </h2>

                        </div>
                        <div class="body">
                            <form id="sender_form" method="post" action="#" enctype="multipart/form-data">
                                <input type="hidden" name="id"
                                    value="<?php if(isset($_GET['id'])) { echo $data['id']; } ?>">

                                <div class="container-fluid">
                                    <div class="row headline">
                                        <div class="col-md-4">
                                            <h2 class="title">Company : <?php echo @$rake_open_data['Company']; ?></h2>
                                        </div>
                                        <div class="col-md-4">
                                            <h2 class="title">IN Date : <?php echo @$rake_open_data['RR_Date']; ?></h2>
                                        </div>
                                        <div class="col-md-4">
                                            <h2 class="title">RR No : <?php echo @$rake_open_data['RR_No']; ?></h2>
                                        </div>
                                        <div class="col-md-4">
                                            <h2 class="title">Transporter :
                                                <?php echo @$rake_open_data['Transporter']; ?></h2>
                                        </div>
                                        <div class="col-md-4">
                                            <h2 class="title">Material : <?php echo @$rake_open_data['Material']; ?>
                                            </h2>
                                        </div>
                                        <div class="col-md-4">
                                            <h2 class="title">RR_Qty : <?php echo @$rake_open_data['RR_Qty']; ?>
                                            </h2>
                                        </div>

                                        
                                    </div>
                                </div>
                                <hr>

                                <!-- <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="name" name="name" class="form-control"
                                            value="<?php echo @$rake_open_data['Company']; ?>" required readonly>
                                        <label class="form-label">Company</label>
                                    </div>
                                </div>

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="name" name="name" class="form-control"
                                            value="<?php echo @$rake_open_data['RR_Date']; ?>" required readonly>
                                        <label class="form-label">IN Date</label>
                                    </div>
                                </div>


                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="name" name="name" class="form-control"
                                            value="<?php echo @$rake_open_data['RR_No']; ?>" required readonly>
                                        <label class="form-label">RR No</label>
                                    </div>
                                </div>


                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="name" name="name" class="form-control"
                                            value="<?php echo @$rake_open_data['Transporter']; ?>" required readonly>
                                        <label class="form-label">Transporter</label>
                                    </div>
                                </div>


                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="name" name="name" class="form-control"
                                            value="<?php echo @$rake_open_data['Material']; ?>" required readonly>
                                        <label class="form-label">Material</label>
                                    </div>
                                </div> -->
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="Vehicle_No" name="Vehicle_No" class="form-control"
                                            value="<?php echo @$data['Vehicle_No']; ?>" required>
                                        <label class="form-label">Vehicle No</label>
                                    </div>
                                </div>


                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <!-- <input type="text" id="vehicle_type" name="vehicle_type"
                                            class="form-control"
                                            value="<?php echo @$rake_open_data['vehicle_type']; ?>" required> -->

                                        <select name="vehicle_type" id="" class="form-control" required>
                                            <option selected> Select Vehicle Type</option>
                                            <?php 
                                                $daata = mysqli_query($conn , "SELECT * FROM `vehicle`");
                                                while($get_type = mysqli_fetch_assoc($daata)){
                                                ?>
                                            <option value="<?php echo $get_type['name']?>">
                                                <?php echo $get_type['name']?></option>
                                            <?php } ?>
                                        </select>

                                        <label class="form-label">Vehicle Type</label>
                                    </div>
                                </div>


                                <?php 
                               $rid = $_GET['id'];
                               $query1 = mysqli_query($conn ,"SELECT count(`unloading_ref_id`) as lsno FROM `unloading_vehicle_in_temp` WHERE `status`=0 AND `unloading_ref_id`=$rid") ;
                            $result2 = mysqli_fetch_assoc($query1);
                            
                                ?>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="loading_slip" name="loading_slip" class="form-control"
                                            value="<?php echo ($result2['lsno']+1); ?>" readonly>
                                        <label class="form-label">Loading Slip No</label>
                                    </div>
                                </div>



                                <div class="form-group form-float">
                                    <div class="form-line focused">
                                        <input type="date" id="Date" name="Date" class="form-control"
                                            value="<?php echo @$data['Date']; ?>" required>
                                        <label class="form-label">Date</label>
                                    </div>
                                </div>




                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="Tare_Weight" name="Tare_Weight" class="form-control"
                                            value="<?php echo @$data['Tare_Weight']; ?>" required>
                                        <label class="form-label">Tare Weight</label>
                                    </div>
                                </div>



                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="kata_slip_no" name="kata_slip_no" class="form-control"
                                            value="<?php echo @$data['kata_slip_no']; ?>" required>
                                        <label class="form-label">KATA Slip No</label>
                                    </div>
                                </div>



                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="D_License_No" name="D_License_No" class="form-control"
                                            value="<?php echo @$data['D_License_No']; ?>" required>
                                        <label class="form-label">D. License No</label>
                                    </div>
                                </div>



                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="Remarks" name="Remarks" class="form-control"
                                            value="<?php echo @$data['Remarks']; ?>" required>
                                        <label class="form-label">Remarks</label>
                                    </div>
                                </div>



                                <br />

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



    <br>
    <?php 
     include "Vehicle_in.php";
     include "Vehicle_out.php";
    include_once('includes/footer.php'); ?>
</body>

</html>