<?php
include_once('includes/header.php');
include_once('includes/check_login.php');
if(isset($_POST['submit_sender']))
{
    $id=$_POST['id'];
    $name=$_POST['name'];
    $dnum=$_POST['dnum'];
    $fuel_amt=$_POST['fuel_amt'];
    
    $opening_balance=$_POST['submit_sender'];
        if ($id == '') {
            mysqli_query($conn, "INSERT INTO `recipt_upload`(`driver_name`, `refil_amount`, `recipt`) VALUES ('$name','$dnum','$fuel_amt')");
            $id = mysqli_insert_id($conn);
        } else {
            mysqli_query($conn, "update `recipt_upload` set `name`='$name',`opening_balance`='$opening_balance' where id='$id'");
        }

        echo '<script>alert("Data updated successfully"); window.location="recipt_history.php";</script>';
}


if(isset($_GET['id']))
{
    $uid=$_GET['id'];
    $data=mysqli_fetch_assoc(mysqli_query($conn,"select * from `recipt_upload` where id='$uid'"));
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
            <div class="block-header">
                <!-- <h2>Manage Material</h2> -->
            </div>

            <!-- Vertical Layout | With Floating Label -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2 class="text-center">
                                Fuel Refil Request
                            </h2>

                        </div>
                        <div class="body">
                            <form id="sender_form" method="POST" action="#" enctype="multipart/form-data">
                                <input type="hidden" name="id" value="<?php if(isset($_GET['id'])) { echo $data['id']; } ?>">

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="name" name="name" class="form-control" value="<?php echo @$data['name']; ?>">
                                        <label class="form-label">Driver Name</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="dnum" name="dnum" class="form-control" value="<?php echo @$data['dnum']; ?>">
                                        <label class="form-label">Refil Amount</label>
                                    </div>
                                </div>

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <label class="">Upload Recipt</label>
                      <input type="file" id="fuel_amt" name="fuel_amt" class="form-control" value="<?php echo @$data['fuel_amt']; ?>">
                                    </div>
                                </div>

                                <br/>
                            <input type="submit" name="submit_sender" class="btn btn-primary waves-effect submit_sender" />
                               <!-- <button class="btn btn-primary waves-effect submit_sender" name="fuel_btn" type="submit">SUBMIT</button>-->
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
