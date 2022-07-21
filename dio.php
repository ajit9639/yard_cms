<?php
include_once('includes/header.php');
include_once('includes/check_login.php');
if(isset($_POST['submit_sender']))
{
    
    $service_type=$_POST['service_type'];
    $core_id=$_POST['core_id'];
    $bin_no=$_POST['bin_no'];
    $segment=$_POST['segment'];
    $guest_name=$_POST['guest_name'];
    $cab_no=$_POST['cab_no'];
    $driver_name=$_POST['driver_name'];
    $driver_number=$_POST['driver_number'];
    $total_payout=$_POST['total_payout'];
    $core_date=$_POST['core_date'];

if($id == '') {
    mysqli_query($conn, "insert into `txn_logs` (`service_type`,`core_id`,`bin_no`,`guest_name`,`segment`,`cab_no`,`driver_name`,`driver_number`,`total_payout`,`date`) 
    values ('$service_type','$core_id','$bin_no','$guest_name','$segment', '$cab_no','$driver_name','$driver_number','$total_payout','$core_date')");
}
else{
    mysqli_query($conn,"update `txn_logs` set `amt`='$amount',`remarks`='$remarks',`account_id`='$account',`user_id`='$user_id',`status`='Paid',`service_type`='$service_type',`core_id`='$core_id',`bin_no`='$bin_no',`segment`='$segment',`guest_name`='$guest_name',`cab_no`='$cab_no',`driver_name`='$driver_name',`driver_number`='$driver_number',`total_payout`='$total_payout' where `id`='$id'");
}

        echo '<script>alert("Data updated successfully");window.location="dio.php";</script>';
}
?>
<body class="theme-red">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
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


            <!-- Vertical Layout | With Floating Label -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  
                    <div class="card">
                        <div class="header">
                            <h2 class="text-center">
                               Bookings
                            </h2>

                        </div>
                        <div class="body">
                            <form id="sender_form" autocomplete="off" method="post" action="#" enctype="multipart/form-data">
                                <input type="hidden" name="id" id="id" value="">
                                <!-- <div class="form-group form-float">
                                    <div class="form-line">

                                        <select class="form-control" name="txn_type" id="txn_type">
                                                <option value="IN">Credit</option>
                                                <option value="OUT">Debit</option>
                                        </select>
                                                                                <label class="form-label">Transaction Type</label>
                                    </div>
                                </div>

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <select class="form-control" name="party" id="party" style="">
                                            <?php// $sd=mysqli_query($conn,"select * from party_master where 1=1");
                                      //      while($rf=mysqli_fetch_assoc($sd))
                                        //    { ?>
                                           <option value="<?php// echo $rf['id'] ?>"><?php// echo $rf['name']; ?></option>
                                            <?php// } ?>
                                        </select>
                                        <label class="form-label">Select Party</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <select class="form-control" name="account" id="account" style="">
                                            <?php //$sd=mysqli_query($conn,"select * from account_master where 1=1");
                                           // while($rf=mysqli_fetch_assoc($sd))
                                          //  { ?>
                                                <option value="<?php //echo $rf['id'] ?>"><?php// echo $rf['name']; ?></option>
                                            <?php// } ?>
                                        </select>
                                        <label class="form-label">Select Account</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text"  id="amount" name="amount" class="form-control" value="<?php //echo @$data['amt']; ?>">
                                        <label class="form-label">Amount</label>
                                    </div>
                                </div> -->
                                <div class="form-group form-float">
                                    <div class="form-line">
									<select class="form-control" name="service_type" id="name">
                                            <option value="">Service Type</option>
                                            <?php $sd=mysqli_query($conn,"select * from party_master where 1=1");
                                            while($rf=mysqli_fetch_assoc($sd))
                                            { ?>
                                                <option value="<?php echo $rf['name'] ?>"><?php echo $rf['name']; ?></option>
                                            <?php } ?>
                                        </select>
                                        <!--<input type="text"  id="service_type" name="service_type" class="form-control" value="<?php echo @$data['service_type']; ?>">
                                        <label class="form-label">Service Type</label>-->
                                    </div>
                                </div>

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text"  id="core_id" name="core_id" class="form-control" value="<?php echo @$data['core_id']; ?>">
                                        <label class="form-label">Core_id</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text"  id="core_date" name="core_date" class="form-control" value="<?php echo @$data['core_date']; ?>">
                                        <label class="form-label">Date</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text"  id="bin_no" name="bin_no" class="form-control" value="<?php echo @$data['bin_no']; ?>">
                                        <label class="form-label">Bill no</label>
                                    </div>
                                </div>

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text"  id="segment" name="segment" class="form-control" value="<?php echo @$data['segment']; ?>">
                                        <label class="form-label">Segment</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text"  id="guest_name" name="guest_name" class="form-control" value="<?php echo @$data['guest_name']; ?>">
                                        <label class="form-label">Guest Name</label>
                                    </div>
                                </div>

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text"  id="cab_no" name="cab_no" class="form-control" value="<?php echo @$data['cab_no']; ?>">
                                        <label class="form-label">Cab No</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
									<select class="form-control" name="driver_name" id="service_type">
                                            <option value="">Select Driver</option>
                                            <?php $sd=mysqli_query($conn,"select * from user where 1=1");
                                            while($rf=mysqli_fetch_assoc($sd))
                                            { ?>
                                                <option value="<?php echo $rf['name'] ?>"><?php echo $rf['name']; ?></option>
                                            <?php } ?>
                                        </select>
                                       <!-- <input type="text"  id="driver_name" name="driver_name" class="form-control" value="<?php echo @$data['driver_name']; ?>">
                                        <label class="form-label">Driver Name</label>-->
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text"  id="driver_number" name="driver_number" class="form-control" value="<?php echo @$data['driver_number']; ?>">
                                        <label class="form-label">Driver Number</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text"  id="total_payout" name="total_payout" class="form-control" value="<?php echo @$data['total_payout']; ?>">
                                        <label class="form-label">Total Payout</label>
                                    </div>
                                </div>


                                <br/>

                                <button class="btn btn-primary waves-effect submit_sender" name="submit_sender" type="submit">SUBMIT</button>
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

</html>
