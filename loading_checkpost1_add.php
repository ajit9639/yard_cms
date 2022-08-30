<?php
include_once('includes/header.php');
include_once('includes/check_login.php');

$id=$_GET['id'];

$rake_open_data=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM `unloading_rake_opening` WHERE `id`='$id'"));
echo $type = $_GET['type'];

if($type == 'delete'){
$del = mysqli_query($conn, "DELETE FROM `billinghead` WHERE `id`='$id'");
if($del){
    echo "<script>alert('Data Deleted Successfully');window.location='billinghead.php';</script>";
}else{
    echo "<script>alert('Data Deleted Failed');</script>";
}
}else{

if(isset($_POST['submit_sender']))
{
    $id=$_POST['id'];
    $name=$_POST['name'];
   
        if ($id == '') {
            mysqli_query($conn, "insert into `billinghead` (`name`) values ('$name')");
            $id = mysqli_insert_id($conn);
        } else {
            mysqli_query($conn, "update `billinghead` set `name`='$name' where id='$id'");
        }

        echo '<script>alert("Data updated successfully"); window.location="billinghead.php";</script>';
}

if(isset($_GET['id']))
{
    $uid=$_GET['id'];
    $data=mysqli_fetch_assoc(mysqli_query($conn,"select * from `billinghead` where id='$uid'"));
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
                                Add Material
                            </h2>

                        </div>
                        <div class="body">
                            <form id="sender_form" method="post" action="#" enctype="multipart/form-data">
                                <input type="hidden" name="id" value="<?php if(isset($_GET['id'])) { echo $data['id']; } ?>">

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="name" name="name" class="form-control" value="<?php echo @$rake_open_data['Company']; ?>" >
                                        <label class="form-label">Company</label>
                                    </div>
                                </div>

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="name" name="name" class="form-control" value="<?php echo @$rake_open_data['RR_Date']; ?>" >
                                        <label class="form-label">IN Date</label>
                                    </div>
                                </div>


                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="name" name="name" class="form-control" value="<?php echo @$rake_open_data['RR_No	']; ?>" >
                                        <label class="form-label">RR No</label>
                                    </div>
                                </div>


                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="name" name="name" class="form-control" value="<?php echo @$rake_open_data['Transporter']; ?>" >
                                        <label class="form-label">Transporter</label>
                                    </div>
                                </div>


                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="name" name="name" class="form-control" value="<?php echo @$rake_open_data['Material']; ?>" >
                                        <label class="form-label">Material</label>
                                    </div>
                                </div>


                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="name" name="name" class="form-control" value="<?php echo @$data['name']; ?>" >
                                        <label class="form-label">Vehicle No</label>
                                    </div>
                                </div>


                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="name" name="name" class="form-control" value="<?php echo @$data['name']; ?>" >
                                        <label class="form-label">Date</label>
                                    </div>
                                </div>

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="name" name="name" class="form-control" value="<?php echo @$data['loading_slip_no']; ?>" >
                                        <label class="form-label">Loading Slip No</label>
                                    </div>
                                </div>


                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="name" name="name" class="form-control" value="<?php echo @$data['name']; ?>" >
                                        <label class="form-label">Tare Weight</label>
                                    </div>
                                </div>



                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="name" name="name" class="form-control" value="<?php echo @$data['name']; ?>" >
                                        <label class="form-label">KATA Slip No</label>
                                    </div>
                                </div>



                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="name" name="name" class="form-control" value="<?php echo @$data['name']; ?>" >
                                        <label class="form-label">D. License No</label>
                                    </div>
                                </div>



                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="name" name="name" class="form-control" value="<?php echo @$data['name']; ?>" >
                                        <label class="form-label">Remarks</label>
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

 <?php 
 

 include_once('includes/footer.php'); ?>
</body>

</html>
