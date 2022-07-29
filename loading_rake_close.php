<?php
include_once('includes/header.php');
include_once('includes/check_login.php');

$id=$_GET['id'];
$idd=$_GET['id'];
echo $type = $_GET['type'];

if($type == 'delete'){
$del = mysqli_query($conn, "DELETE FROM `unloading_rake_closing` WHERE `id`='$id'");
if($del){
    echo "<script>alert('Data Deleted Successfully');window.location='rake_close.php';</script>";
}else{
    echo "<script>alert('Data Deleted Failed');</script>";
}
}else{

if(isset($_POST['submit_sender']))
{
$id=$_GET['id'];
    
$rake_placement_date = $_POST['rake_placement_date'];
$rake_release_date = $_POST['rake_release_date'];
$total_box = $_POST['total_box'];
$rr_date = $_POST['rr_date'];
$rr_no = $_POST['rr_no'];
$previous_wt = $_POST['previous_wt'];
$rr_wt = $_POST['rr_wt'];
$checkpost_wt = $_POST['checkpost_wt'];
$direct_wt = $_POST['direct_wt'];
$ground_loss = $_POST['ground_loss'];
$adject_qty = $_POST['adject_qty'];
$current_stock = $_POST['current_stock'];
$remarks = $_POST['remarks'];
$rake_referance_id = $_POST['rake_referance_id'];

// if ($id == '') {
        // echo "INSERT INTO `loading_rake_closing`(`rake_placement_date`, `rake_release_date`, `total_box`, `rr_date`, `rr_no`, `previous_wt`, `rr_wt`, `checkpost_wt`, `direct_wt`, `ground_loss`, `adject_qty`, `current_stock`, `remarks`, `rake_referance_id`) VALUES('$rake_placement_date','$rake_release_date','$total_box','$rr_date','$rr_no','$previous_wt','$rr_wt','$checkpost_wt','$direct_wt','$ground_loss','$adject_qty','$current_stock','$remarks','$id')";exit();

        $status = mysqli_query($conn, "INSERT INTO `loading_rake_closing`(`rake_placement_date`, `rake_release_date`, `total_box`, `rr_date`, `rr_no`, `previous_wt`, `rr_wt`, `checkpost_wt`, `direct_wt`, `ground_loss`, `adject_qty`, `current_stock`, `remarks`, `rake_referance_id`) VALUES('$rake_placement_date','$rake_release_date','$total_box','$rr_date','$rr_no','$previous_wt','$rr_wt','$checkpost_wt','$direct_wt','$ground_loss','$adject_qty','$current_stock','$remarks','$id')");
            // $id = mysqli_insert_id($conn);                                    
           
        // } else {
        //     mysqli_query($conn, "UPDATE `loading_rake_closing` SET `rake_placement_date`='$rake_placement_date',`rake_release_date`='$rake_release_date',`total_box`='$total_box',`rr_date`='$rr_date',`rr_no`='$rr_no',`previous_wt`='$previous_wt',`rr_wt`='$rr_wt',`checkpost_wt`='$checkpost_wt',`direct_wt`='$direct_wt',`ground_loss`='$ground_loss',`adject_qty`='$adject_qty',`current_stock`='$current_stock',`remarks`='$remarks',`rake_referance_id`='$id' where id='$id'");
        // }
        
        mysqli_query($conn, "UPDATE `loading_rake_opening` SET `status`='open' WHERE `id`='$id'");
        echo '<script>alert("Success"); window.location="loading_rake_opening.php";</script>';
}

if(isset($_GET['id']))
{
    $uid=$_GET['id'];
    $data=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM `loading_rake_opening` where id='$uid'"));
}
}





                                    // total weight
// checkpost total weight
// echo "SELECT sum(`net_weight`) as lsno1 FROM `loading_vehicle_entry` WHERE `dump` = 'Checkpost' AND `rake_ref_id`=$idd".'<br>';
// echo "SELECT sum(`net_weight`) as lsno3 FROM `loading_vehicle_entry` WHERE `dump` = 'Direct' AND `rake_ref_id`=$idd";exit();

$query1 = mysqli_query($conn ,"SELECT sum(`net_weight`) as lsno1 FROM `loading_vehicle_entry` WHERE `dump` = 'Checkpost' AND `rake_ref_id`=$idd");
$result2 = mysqli_fetch_assoc($query1);
// echo $result2['lsno1'];



// direct total weight
$query5 = mysqli_query($conn ,"SELECT sum(`net_weight`) as lsno3 FROM `loading_vehicle_entry` WHERE `dump` = 'Direct' AND `rake_ref_id`=$idd");
$result6 = mysqli_fetch_assoc($query5);
// echo $result6['lsno3'];



// previous weight
// $d = mysqli_fetch_assoc(mysqli_query($conn , "SELECT sum(`net_weight`) as lsno3 FROM `loading_vehicle_entry` WHERE `material` = 'Direct' AND `rake_ref_id`=$idd"));
// $current_stock = $d['id'];

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
                                Rake [Unloading]
                            </h2>

                        </div>
                        <div class="body">
                            <form id="sender_form" method="post" action="#" enctype="multipart/form-data">
                                <input type="hidden" name="id"
                                    value="<?php if(isset($_GET['id'])) { echo $data['id']; } ?>">

                                <h4>Opening</h4>


                                <div class="row headline">
                                    <div class="col-md-4">
                                        <h1 class="title">Order No. : <?php echo @$data['Order_no']; ?></h1>
                                    </div>
                                    <div class="col-md-4">
                                        <h1 class="title">Opening Date : <?php echo @$data['Opening_date']; ?></h1>
                                    </div>
                                </div>

                                <hr>

                                <h4>CLOSING</h4>

                                <div class="form-group form-float">
                                    <div class="form-line focused">
                                        <input type="date" id="rake_placement_date" name="rake_placement_date"
                                            class="form-control" value="<?php echo @$data['rake_placement_date']; ?>"
                                            required>
                                        <label class="form-label">Rake Placement Date</label>
                                    </div>
                                </div>


                                <div class="form-group form-float">
                                    <div class="form-line focused">
                                        <input type="date" id="rake_release_date" name="rake_release_date"
                                            class="form-control" value="<?php echo @$data['rake_release_date']; ?>"
                                            required>
                                        <label class="form-label">Rake Release Date</label>
                                    </div>
                                </div>



                                <div class="form-group form-float">
                                    <div class="form-line focused">
                                        <input type="date" id="rr_date" name="rr_date" class="form-control"
                                            value="<?php echo @$data['rr_date']; ?>" required>
                                        <label class="form-label">R.R Date</label>
                                    </div>
                                </div>

                                <div class="form-group form-float">
                                    <div class="form-line ">
                                        <input type="text" id="total_box" name="total_box" class="form-control"
                                            value="<?php echo @$data['total_box']; ?>" required>
                                        <label class="form-label">Total Box</label>
                                    </div>
                                </div>

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="rr_no" name="rr_no" class="form-control"
                                            value="<?php echo @$data['rr_no']; ?>" required>
                                        <label class="form-label">R.R. No.</label>
                                    </div>
                                </div>

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="previous_wt" name="previous_wt" class="form-control" value="1984.23">
                                        <label class="form-label">Previous Wt</label>
                                        <!--  value="<?php echo @$data['previous_wt']; ?>" -->
                                    </div>
                                </div>

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="rr_wt" name="rr_wt" class="form-control"
                                            value="<?php echo @$data['rr_wt']; ?>" required>
                                        <label class="form-label">R.R. Wt</label>
                                    </div>
                                </div>


                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="checkpost_wt" name="checkpost_wt" class="form-control"
                                            value="<?php echo $result2['lsno1']; ?>" readonly>
                                        <label class="form-label">Checkpost Wt</label>
                                    </div>
                                </div>


                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="direct_wt" name="direct_wt" class="form-control"
                                            value="<?php echo $result6['lsno3']; ?>" readonly>
                                        <label class="form-label">Direct Wt</label>
                                    </div>
                                </div>

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="ground_loss" name="ground_loss" class="form-control"
                                            value="<?php echo @$data['ground_loss']; ?>" onchange="javascript:calcu()">
                                        <label class="form-label">Ground Loss</label>
                                    </div>
                                </div>

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="adject_qty" name="adject_qty" class="form-control"
                                            value="<?php echo @$data['adject_qty']; ?>" onchange="javascript:calcu()">
                                        <label class="form-label">Adjust Qty</label>
                                    </div>
                                </div>

                                <div class="form-group form-float">
                                    <div class="form-line focused">
                                        <input type="text" id="current_stock" name="current_stock" class="form-control"
                                            value="<?php echo @$data['current_stock']; ?>" readonly>
                                        <label class="form-label">Current Stock</label>
                                    </div>
                                </div>

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="remarks" name="remarks" class="form-control"
                                            value="<?php echo @$data['Remarks']; ?>">
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

    <?php include_once('includes/footer.php'); ?>

    <script type="text/javascript">
    function calcu() {
        // if(document.getElementById("checkpost_wt").value == "" || document.getElementById("direct_wt").value){
        // }else{
        // }

        var checkpost_wt = document.getElementById("checkpost_wt").value;
        var direct_wt = document.getElementById("direct_wt").value;
        var ground_loss = document.getElementById("ground_loss").value;
        var adject_qty = document.getElementById("adject_qty").value;
        // var current_stock = document.getElementById("current_stock").value;

        var total = parseInt(checkpost_wt) + parseInt(direct_wt);
        var current_stock =  parseInt(total) - ground_loss - adject_qty;
        document.getElementById("current_stock").value = current_stock;

        // console.log('check-post'+  checkpost_wt);
        // console.log('direct'+ direct_wt);
        // console.log('ground-loss'+ ground_loss);
        // console.log('adject'+ adject_qty);
        // console.log('current-stock'+current_stock);
        
        // if (document.getElementById("txtGST").value == "") {
        //     gstper = 0;
        // }
                                
    }
    </script>
</body>

</html>