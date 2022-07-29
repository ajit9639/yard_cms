<?php
include_once('includes/header.php');
include_once('includes/check_login.php');

$id=$_GET['id'];

$rake_open_data=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM `unloading_rake_opening` WHERE `id`='$id'"));
echo $type = $_GET['type'];
// delete
if($type == 'delete'){
$del = mysqli_query($conn, "DELETE FROM `unloading_vehicle_in_temp` WHERE `id`='$id'");
if($del){
    echo "<script>alert('Data Deleted Successfully');
    // window.location='billinghead.php';
    </script>";
}else{
    echo "<script>alert('Data Deleted Failed');</script>";
}
}
else{
// kata entry
if(isset($_POST['vehicle_kata_entry'])){
    $id=$_GET['id'];  
    $challn_no = $_POST['challn_no'];
    $tare_weight = $_POST['tare_weight'];
    $gross_weight = $_POST['gross_weight'];    
    
    // echo "<pre>"  ;
    // print_r($_POST);
    // exit();
// echo "INSERT INTO `unloading_vehicle_kata_entry_in`(`challn_no`, `tare_weight`, `gross_weight`, `unloading_ref_id`, `status`) VALUES ('$challn_no','$tare_weight','$gross_weight','$id','0')";

    $insert = mysqli_query($conn , "INSERT INTO `unloading_vehicle_kata_entry_in`(`challn_no`, `tare_weight`, `gross_weight`, `unloading_ref_id`, `status`) VALUES ('$challn_no','$tare_weight','$gross_weight','$id','0')");

if($insert){
    echo "<script>alert('Success');
    </script>";  
    mysqli_query($conn , "UPDATE `unloading_vehicle_in_temp` SET `kata_status`='1' WHERE `unloading_ref_id`='$id'");
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
<div class="modal fade" id="myModal1" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Vehicle Kata Entry</h4>
            </div>
            <div class="modal-body">
                <form method="POST">
                    <div class="row">
                        <div class="col-sm-6 ">
                            <label for="pwd">Challan No:</label>
                            <input type="text" class="form-control" name="challn_no" required>
                        </div>

                        <div class="col-sm-6 ">
                            <label for="pwd">Tare Weight:</label>
                            <input type="text" class="form-control" name="tare_weight" required>
                        </div>

                        <div class="col-sm-6 ">
                            <label for="pwd">Gross Weight:</label>
                            <input type="text" class="form-control" name="gross_weight" required>
                        </div>

                        <div class="col-sm-12 ">

                            <input type="submit" class="btn btn-danger" name="vehicle_kata_entry" value="submit">
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
                                Unloading Kata Entry
                            </h2>

                        </div>
                        <div class="body">
                            <form id="sender_form" method="post" action="#" enctype="multipart/form-data">
                                <input type="hidden" name="id"
                                    value="<?php if(isset($_GET['id'])) { echo $data['id']; } ?>">

                                <div class="container-fluid">
                                    <div class="row">


                                        <div class="col-md-3">
                                            <h4>Select RR_NO : </h4>
                                            <select class="form-control" id="dynamic_select">
                                                <option selected>Select RR_NO</option>

                                                <?php $sql=mysqli_query($conn,"select * from `unloading_rake_opening`");
                                    while($row=mysqli_fetch_assoc($sql))
                                    {?>
                                                <option
                                                    value="unloading_kata_entry.php?id=<?php echo $row['id']; ?>">
                                                    <?php echo $row['RR_No']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">


                                        <div class="col-md-4">
                                            <h2>Company : <?php echo @$rake_open_data['Company']; ?></h2>
                                        </div>
                                        <div class="col-md-4">
                                            <h2>IN Date : <?php echo @$rake_open_data['RR_Date']; ?></h2>
                                        </div>
                                        <div class="col-md-4">
                                            <h2>RR No : <?php echo @$rake_open_data['RR_No']; ?></h2>
                                        </div>
                                        <div class="col-md-4">
                                            <h2>Transporter : <?php echo @$rake_open_data['Transporter']; ?></h2>
                                        </div>
                                        <div class="col-md-4">
                                            <h2>Material : <?php echo @$rake_open_data['Material']; ?></h2>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <hr>

                                <!-- 
                                <br />

                                <button class="btn btn-primary waves-effect submit_sender" name="submit_sender"
                                    type="submit">SUBMIT</button> -->
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
     include "unloading_kata_entry_vehicle_in.php";
     include "unloading_kata_entry_vehicle_out.php";
    include_once('includes/footer.php'); ?>

    <script>
    $(function() {
        // bind change event to select
        $('#dynamic_select').on('change', function() {
            var url = $(this).val(); // get selected value
            if (url) { // require a URL
                window.location = url; // redirect
            }
            return false;
        });
    });
    </script>

</body>

</html>