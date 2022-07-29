<?php
include_once('includes/header.php');
include_once('includes/check_login.php');

$id=$_GET['id'];
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
    
$rake_release_date = $_POST['rake_release_date'];
$rake_release_time = $_POST['rake_release_time'];
$rake_close_date = $_POST['rake_close_date'];
$work_completion_date = $_POST['work_completion_date'];
$r_r_qty = $_POST['r_r_qty'];
$remarks = $_POST['remarks'];
$rake_opening_reference = $id;     

// echo "INSERT INTO `unloading_rake_closing`(`rake_release_date`, `rake_close_date`, `work_completion_date`, `r_r_qty`, `remarks`, `rake_opening_reference`) VALUES ('$rake_release_date','$rake_close_date','$work_completion_date','$r_r_qty','$remarks','$rake_opening_reference')";exit();
// echo "UPDATE `unloading_rake_opening` SET `rake_status`='Closed' WHERE `id`='$rake_opening_reference'";exit();

if ($id == '') {
            $status = mysqli_query($conn, "INSERT INTO `unloading_rake_closing`(`rake_release_date`,`rake_release_time`, `rake_close_date`, `work_completion_date`, `r_r_qty`, `remarks`, `rake_opening_reference`) VALUES ('$rake_release_date','$rake_release_time','$rake_close_date','$work_completion_date','$r_r_qty','$remarks','$rake_opening_reference')");
            // $id = mysqli_insert_id($conn);                                    
           
        } else {
            mysqli_query($conn, "UPDATE `unloading_rake_closing` SET `rake_release_date`='$rake_release_date',`rake_release_time`='$rake_release_time',`rake_close_date`='$rake_close_date',`work_completion_date`='$work_completion_date',`r_r_qty`='$r_r_qty',`remarks`='$remarks',`rake_opening_reference`='$rake_opening_reference' where id='$id'");
        }
        
        mysqli_query($conn, "UPDATE `unloading_rake_opening` SET `rake_status`='open' WHERE `id`='$rake_opening_reference'");
        echo '<script>alert("Success"); window.location="rake.php";</script>';
}

if(isset($_GET['id']))
{
    $uid=$_GET['id'];
    $data=mysqli_fetch_assoc(mysqli_query($conn,"select * from `unloading_rake_opening` where id='$uid'"));
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
                                Rake [Unloading]
                            </h2>

                        </div>
                        <div class="body">
                            <form id="sender_form" method="post" action="#" enctype="multipart/form-data">
                                <input type="hidden" name="id"
                                    value="<?php if(isset($_GET['id'])) { echo $data['id']; } ?>">

                                <h4>Opening</h4>


                                <!-- <div class="row headline">
                                    <div class="col-md-4">
                                        <h2 class="title">RR No. : <?php echo @$data['RR_No']; ?></h2>
                                    </div>
                                    <div class="col-md-4">
                                        <h2 class="title">In Date : <?php echo @$data['RR_No']; ?></h2>
                                    </div>
                                </div> -->
                                <!-- ================ -->
                                <div class="row headline">
                                    <div class="col-md-4">
                                        <h2 class="title">Company : <?php echo @$data['Company'] ?></h2>
                                    </div>
                                    <div class="col-md-4">
                                        <h2 class="title">IN Date : <?php echo @$data['RR_Date'] ?></h2>
                                    </div>
                                    <div class="col-md-4">
                                        <h2 class="title">RR No : <?php echo @$data['RR_No'] ?></h2>
                                    </div>
                                    <div class="col-md-4">
                                    <h2 class="title">Transporter : <?php echo @$data['Transporter'] ?></h2>
                                    </div>
                                    <div class="col-md-4">
                                    <h2 class="title">Material : <?php echo @$data['Material'] ?></h2>
                                    </div>
                                    <div class="col-md-4">
                                    <h2 class="title">RR_Qty : <?php echo @$data['RR_Qty'] ?></h2>
                                    </div>

                                    
                                </div>


                                <hr>

                                <h4>CLOSING</h4>

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
                                        <input type="time" id="rake_release_time" name="rake_release_time"
                                            class="form-control" value="<?php echo @$data['rake_release_time']; ?>"
                                            required>
                                        <label class="form-label">Rake Release Time</label>
                                    </div>
                                </div>

                                <div class="form-group form-float">
                                    <div class="form-line focused">
                                        <input type="date" id="rake_close_date" name="rake_close_date"
                                            class="form-control" value="<?php echo @$data['rake_close_date']; ?>"
                                            required>
                                        <label class="form-label">Rake Close Date</label>
                                    </div>
                                </div>

                                <div class="form-group form-float">
                                    <div class="form-line focused">
                                        <input type="date" id="work_completion_date" name="work_completion_date"
                                            class="form-control" value="<?php echo @$data['work_completion_date']; ?>"
                                            required>
                                        <label class="form-label">Work Completion Date</label>
                                    </div>
                                </div>

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="r_r_qty" name="r_r_qty" class="form-control"
                                            value="<?php echo @$data['r_r_qty']; ?>" required>
                                        <label class="form-label">Rake Close Time</label>
                                    </div>
                                </div>

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="remarks" name="remarks" class="form-control"
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

    <?php include_once('includes/footer.php'); ?>
</body>

</html>