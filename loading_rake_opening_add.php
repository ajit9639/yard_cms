<?php
include_once('includes/header.php');
include_once('includes/check_login.php');

$id=$_GET['id'];

$type = $_GET['type'];
if($type == 'delete'){
$del = mysqli_query($conn, "DELETE FROM `loading_rake_opening` WHERE `id`='$id'");
if($del){
    echo "<script>alert('Data Deleted Successfully');window.location='loading_rake_opening.php';</script>";
}else{
    echo "<script>alert('Data Deleted Failed');</script>";
}
}else{

if(isset($_POST['submit_sender']))
{
$id=$_POST['id'];
    

$Order_no = $_POST['Order_no'];
$Placement_Time = $_POST['Placement_Time'];
$Material = $_POST['Material'];
$Company = $_POST['Company'];
$Transporter = $_POST['Transporter'];
$Opening_date = $_POST['Opening_date'];
$Opening_time = $_POST['Opening_time'];

if ($id == '') {
            mysqli_query($conn, "INSERT INTO `loading_rake_opening`(`Order_no`, `Opening_date`,`Opening_time`, `Material`, `Company`, `Transporter`,`status`) VALUES ('$Order_no','$Opening_date','$Opening_time','$Material','$Company','$Transporter','close')");
            $id = mysqli_insert_id($conn);
        } else {
            mysqli_query($conn, "UPDATE `loading_rake_opening` SET `Order_no`='$Order_no',`Opening_date`='$Opening_date',`Opening_time`='$Opening_time',`Material`='$Material',`Company`='$Company',`Transporter`='$Transporter' where id='$id'");
        }

        echo '<script>alert("Success"); window.location="loading_rake_opening.php";</script>';
}

if(isset($_GET['id']))
{
    $uid=$_GET['id'];
    $data=mysqli_fetch_assoc(mysqli_query($conn,"select * from `loading_rake_opening` where id='$uid'"));
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
                                Rake [Loading]
                            </h2>

                        </div>
                        <div class="body">
                            <form id="sender_form" method="post" action="#" enctype="multipart/form-data">
                                <input type="hidden" name="id"
                                    value="<?php if(isset($_GET['id'])) { echo $data['id']; } ?>">



                                    <div class="form-group form-float">
                                    <div class="form-line">                                       
                                        <select id="Company" name="Company" class="form-control" >
                                            <option checked disabled>Select Company</option>

                                            <option value="<?php echo @$data['Company']; ?>"><?php echo @$data['Company']; ?>
                                            </option>
                                            <?php 
                                            $dat = mysqli_query($conn , "SELECT * FROM `company`");
                                            while($row= mysqli_fetch_assoc($dat)){
                                            ?>
                                            <option value="<?php  echo $row['Name']?>"><?php echo $row['Name']?></option>
                                            <?php } ?>
                                        </select>
                                        <label class="form-label">Company</label>
                                    </div>
                                </div>



                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="Order_no" name="Order_no" class="form-control"
                                            value="<?php echo @$data['Order_no']; ?>" >
                                        <label class="form-label">Order No</label>
                                    </div>
                                </div>

                                <div class="form-group form-float">
                                    <div class="form-line focused">
                                        <input type="date" id="Opening_date" name="Opening_date" class="form-control"
                                            value="<?php echo @$data['Opening_date']; ?>" >
                                        <label class="form-label">Opening Date</label>
                                    </div>
                                </div>    
                                
                                <div class="form-group form-float">
                                    <div class="form-line focused">
                                        <input type="time" id="Opening_time" name="Opening_time" class="form-control"
                                            value="<?php echo @$data['Opening_time']; ?>" >
                                        <label class="form-label">Opening Time</label>
                                    </div>
                                </div>    


                                <div class="form-group form-float">
                                    <div class="form-line">

                                        <select id="Material" name="Material" class="form-control" >
                                            <option  disabled>Select Material</option>                                                                                                                             
                                            <option value="<?php echo $data['Material']; ?>" selected><?php echo @$data['Material']; ?>                                            
                                            <?php 
                                            $dat = mysqli_query($conn , "SELECT * FROM `material`");
                                            while($row= mysqli_fetch_assoc($dat)){
                                            ?>
                                            <option value="<?php  echo $row['name']?>"><?php echo $row['name']?></option>
                                            <?php } ?>
                                        </select>

                                        <label class="form-label">Material</label>
                                    </div>
                                </div>


                               

                                <div class="form-group form-float">
                                    <div class="form-line">                                      
                                        <select id="Transporter" name="Transporter" class="form-control" >
                                            <option checked disabled>Select Transporter</option>

                                            <option value="<?php echo @$data['Transporter']; ?>"><?php echo @$data['Transporter']; ?>
                                            </option>
                                            <?php 
                                            $dat = mysqli_query($conn , "SELECT * FROM `transporter`");
                                            while($row= mysqli_fetch_assoc($dat)){
                                            ?>
                                            <option value="<?php  echo $row['Name']?>"><?php echo $row['Name']?></option>
                                            <?php } ?>
                                        </select>
                                        <label class="form-label">Transporter</label>
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

</html>