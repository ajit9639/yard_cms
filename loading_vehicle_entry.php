<?php
include_once('includes/header.php');
include_once('includes/check_login.php');

$id = $_GET['id'];
$idd = $_GET['id'];

$rake_open_data=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM `loading_rake_opening` WHERE `id`='$id'"));
// delete
$type = $_GET['type'];
if($type == 'delete'){
$del = mysqli_query($conn, "DELETE FROM `loading_vehicle_entry` WHERE `id`='$id'");
if($del){
    echo "<script>alert('Data Deleted Successfully');
    window.location='loading_vehicle_entry.php?id=$id';
    </script>";
}else{
    echo "<script>alert('Data Deleted Failed');</script>";
}
}
else{

if(isset($_POST['submit_sender1']))
{

$id=$_GET['id'];    


$material = $rake_open_data['Material'];
$company = $rake_open_data['Company'];
$dump = $_POST['dump'];
$Vehicle_No = $_POST['Vehicle_No'];
$Date = $_POST['Date'];
$kata_slip_no = $_POST['kata_slip_no'];
$C_challan_No = $_POST['C_challan_No'];
$D_License_No = $_POST['D_License_No'];
$Gross = $_POST['Gross'];
$Tare_Weight = $_POST['Tare_Weight'];
// $Net_weight = $_POST['Net_weight'];
$Net_weight = $Gross - $Tare_Weight;
$Remarks = $_POST['Remarks'];
$unloading_ref_id = $id;            
     
// echo "INSERT INTO `loading_vehicle_entry`(`dump`, `Vehicle`, `Date`, `kata_slip_no`, `c_challan_no`, `driver_licence_no`, `tare_weight`, `gross_weight`, `net_weight`, `remark`, `rake_ref_id`) VALUES ('$dump','$Vehicle_No','$Date','$kata_slip_no','$C_challan_No','$D_License_No','$Tare_Weight','$Gross','$Net_weight','$Remarks','$unloading_ref_id')";exit();

        // if ($id == '') {
            $vehicle_in = mysqli_query($conn, "INSERT INTO `loading_vehicle_entry`(`dump`, `Vehicle`, `Date`, `kata_slip_no`, `c_challan_no`, `driver_licence_no`, `tare_weight`, `gross_weight`, `net_weight`, `remark`, `rake_ref_id`,`material`,`company`) VALUES ('$dump','$Vehicle_No','$Date','$kata_slip_no','$C_challan_No','$D_License_No','$Tare_Weight','$Gross','$Net_weight','$Remarks','$unloading_ref_id','$material','$company')");                                   
            // print_r($vehicle_in);exit();
        // } else {
        //     mysqli_query($conn, "UPDATE `loading_vehicle_entry` SET `dump`='$dump',`Vehicle`='$Vehicle_No',`Date`='$Date',`kata_slip_no`='$kata_slip_no',`c_challan_no`='$C_challan_No',`driver_licence_no`='$D_License_No',`tare_weight`='$Tare_Weight',`gross_weight`='$Gross',`net_weight`='$Net_weight',`remark`='$Remarks',`rake_ref_id`='$unloading_ref_id' where id='$id'");
        // }
            // $id = mysqli_insert_id($conn);
            if($vehicle_in){
                echo "<script>alert('Success');
               window.location.replace('loading_vehicle_entry.php?id=$id');
                </script>";
            }else{
                echo "<script>alert('Data Inserted Failed');</script>";
            }
        
}

// if(isset($_GET['id']))
// {
//     $uid=$_GET['id'];
//     $data=mysqli_fetch_assoc(mysqli_query($conn,"select * from `unloading_vehicle_entry` where id='$uid'"));
// }


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
                                loading Vehicle Entry
                            </h2>

                        </div>
                        <div class="body">
                            <form id="sender_form" method="post" action="#" enctype="multipart/form-data">
                                <input type="hidden" name="id"
                                    value="<?php if(isset($_GET['id'])) { echo $data['id']; } ?>">

                                <div class="container-fluid">
                                    <div class="row headline">
                                        <div class="col-md-4">
                                            <h2 class="title">Order No. : <?php echo @$rake_open_data['Order_no']; ?></h2>
                                        </div>
                                        <div class="col-md-4">
                                            <h2 class="title">Transporter : <?php echo @$rake_open_data['Transporter']; ?></h2>
                                        </div>
                                        <div class="col-md-4">
                                            <h2 class="title">Material : <?php echo @$rake_open_data['Material']; ?></h2>
                                        </div>
                                        <div class="col-md-4">
                                            <h2 class="title">Order Date : <?php echo @$rake_open_data['Opening_date']; ?></h2>
                                        </div>
                                        <div class="col-md-4">
                                            <h2 class="title">Time : <?php echo @$rake_open_data['Opening_time']; ?></h2>
                                        </div>
                                        <div class="col-md-4">
                                            <h2 class="title">Company : <?php echo @$rake_open_data['Company']; ?></h2>
                                        </div>
                                    </div>
                                </div>
                                <hr>

                                <!-- <div class="demo-radio-button">
                                    <input name="dump" type="radio" id="Checkpost" value="Checkpost">
                                    <label>Checkpost</label>
                                    <input name="dump" type="radio" id="Direct" value="Direct">
                                    <label>Direct</label>
                                </div> -->

                                <div class="demo-radio-button">
                                    <input name="dump" type="radio" id="Checkpost" value="Checkpost">
                                    <label for="Checkpost">Checkpost</label>
                                    <input name="dump" type="radio" id="Direct" value="Direct">
                                    <label for="Direct">Direct</label>
                                    
                                </div>

                                <hr>
                                <!-- <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="dump" name="dump" class="form-control"
                                            value="<?php echo @$data['dump']; ?>" required>
                                        <label class="form-label">dump.</label>
                                    </div>
                                </div> -->


                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="Vehicle_No" name="Vehicle_No" class="form-control"
                                            value="<?php echo @$data['Vehicle_No']; ?>" required>
                                        <label class="form-label">Vehicle ID/No.</label>
                                    </div>
                                </div>


                                <div class="form-group form-float">
                                    <div class="form-line focused">
                                        <input type="Date" id="Date" name="Date" class="form-control"
                                            value="<?php echo @$data['Date']; ?>" required>
                                        <label class="form-label">Date</label>
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
                                        <input type="text" id="C_challan_No" name="C_challan_No" class="form-control"
                                            value="<?php echo @$data['C_challan_No']; ?>" required>
                                        <label class="form-label">Company Challan No</label>
                                    </div>
                                </div>


                               
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="Gross" name="Gross" class="form-control"
                                            value="<?php echo @$data['Gross']; ?>" required>
                                        <label class="form-label">Gross Weight (in ton)</label>
                                    </div>
                                </div>

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="Tare_Weight" name="Tare_Weight" class="form-control"
                                            value="<?php echo @$data['Tare_Weight']; ?>" required onchange="javascript:calcu()">
                                        <label class="form-label">Tare Weight</label>
                                    </div>
                                </div>



                               


                                <div class="form-group form-float">
                                    <div class="form-line focused">
                                        <input type="text" id="Net_weight" name="Net_weight" class="form-control"
                                            value="<?php echo @$data['Net_weight']; ?>" readonly>
                                        <label class="form-label">Net Weight</label>
                                    </div>
                                </div>

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="D_License_No" name="D_License_No" class="form-control"
                                            value="<?php echo @$data['D_License_No']; ?>" required>
                                        <label class="form-label">Driver License License No</label>
                                    </div>
                                </div>

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="Remarks" name="Remarks" class="form-control"
                                            value="<?php echo @$data['Remarks']; ?>" required>
                                        <label class="form-label">Remarks</label>
                                    </div>
                                </div>



                                <div class="form-group form-float">
                                    <div class="form-line text-center" style="border:none;">
                                    <button class="btn btn-primary waves-effect submit_sender" name="submit_sender1"
                                    type="submit">SUBMIT</button>
                                        
                                    </div>
                                </div>


                                <!-- <button class="btn btn-primary waves-effect submit_sender" name="submit_sender1"
                                    type="submit">SUBMIT</button> -->


                            </form>
                            <div class="col-md-12">
                                <?php 
                                // $d = mysqli_fetch_assoc(mysqli_query($conn , "SELECT count(`unloading_ref_id`) as lsno  FROM `loading_vehicle_entry`"));
                                // echo "<script>alert(print_r($d))</script>";
                                
                                $query1 = mysqli_query($conn ,"SELECT sum(`net_weight`) as lsno1 FROM `loading_vehicle_entry` WHERE `dump` = 'Checkpost' AND `rake_ref_id`=$idd");
                                $result2 = mysqli_fetch_assoc($query1);

                                $query3 = mysqli_query($conn ,"SELECT count(`net_weight`) as lsno2 FROM `loading_vehicle_entry` WHERE `dump` = 'Checkpost' AND `rake_ref_id`=$idd");
                                $result4 = mysqli_fetch_assoc($query3);

                                $query5 = mysqli_query($conn ,"SELECT sum(`net_weight`) as lsno3 FROM `loading_vehicle_entry` WHERE `dump` = 'Direct' AND `rake_ref_id`=$idd");
                                $result6 = mysqli_fetch_assoc($query5);

                                $query7 = mysqli_query($conn ,"SELECT count(`net_weight`) as lsno5 FROM `loading_vehicle_entry` WHERE `dump` = 'Direct' AND `rake_ref_id`=$idd");
                                $result8 = mysqli_fetch_assoc($query7);
            

                                $x1 = $result2['lsno1'];
                                $x2 = $result4['lsno2'];
                                $x3 = $result6['lsno3'];
                                $x4 = $result8['lsno5'];      

                                // echo "SELECT count(`net_weight`) as lsno2 FROM `loading_vehicle_entry` WHERE `dump` = 'Checkpost' AND `rake_ref_id`=$idd";
                                
                                ?>
                                <h3><b>Checkpost </b><br> (Total Weight : <?= $x1 ?> / Total Vehicle : <?= $x2 ?>)<br>
                                    <b>Direct </b><br> (Total Weight : <?= $x3 ?> / Total Vehicle : <?= $x4 ?>)
                                </h3>
                            </div>

                        </div>
                    </div>
                </div>


            </div>
            <!-- Vertical Layout | With Floating Label -->

        </div>
    </section>


    <br>
    <?php 
     include "loading_vehicle_in.php";
   
    include_once('includes/footer.php'); ?>



</body>

</html>