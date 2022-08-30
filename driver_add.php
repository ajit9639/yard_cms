<?php
include_once('includes/header.php');
include_once('includes/check_login.php');

$id=$_GET['id'];
$type = $_GET['type'];
if($type == 'delete'){
    // echo "DELETE FROM `driver` WHERE `id`='$id'";exit();
$del = mysqli_query($conn, "DELETE FROM `driver` WHERE `id`='$id'");
if($del){
    echo "<script>alert('Data Deleted Successfully');window.location='driver.php';</script>";
}else{
    echo "<script>alert('Data Deleted Failed');</script>";
}
}else{

if(isset($_POST['submit_sender']))
{
$id=$_POST['id'];

$Name = $_POST['Name'];
$DL_Type = $_POST['DL_Type'];
$DL_No = $_POST['DL_No'];
$DL_Validity = $_POST['DL_Validity'];
$City = $_POST['City'];
$Address = $_POST['Address'];
$Mobile_No = $_POST['Address'];
$Emergency_Contact_No = $_POST['Emergency_Contact_No'];
$Bank_Name = $_POST['Bank_Name'];
$AC_No = $_POST['AC_No'];
$AC_Name = $_POST['AC_Name'];
$IFSC_Code = $_POST['IFSC_Code'];
//$Aadhar_Card = $_POST['Aadhar_Card'];
  $Aadhar_Card = "adhar";
//$Certificate = $_POST['Certificate'];
  $Certificate = "certificate";


// echo "INSERT INTO `driver`(`Name`, `DL_Type`, `DL_No`, `DL_Validity`, `City`, `Address`, `Mobile_No`, `Emergency_Contact_No`, `Bank_Name`, `AC_No`, `AC_Name`, `IFSC_Code`, `Aadhar_Card`, `Certificate`) VALUES 
// ('$Name','$DL_Type','$DL_No','$DL_Validity','$City','$Address','$Mobile_No','$Emergency_Contact_No','$Bank_Name','$AC_No','$AC_Name','$IFSC_Code','$Aadhar_Card','$Certificate')";exit();
        if ($id == '') {
            mysqli_query($conn, "INSERT INTO `driver`(`Name`, `DL_Type`, `DL_No`, `DL_Validity`, `City`, `Address`, `Mobile_No`, `Emergency_Contact_No`, `Bank_Name`, `AC_No`, `AC_Name`, `IFSC_Code`, `Aadhar_Card`, `Certificate`) VALUES ('$Name','$DL_Type','$DL_No','$DL_Validity','$City','$Address','$Mobile_No','$Emergency_Contact_No','$Bank_Name','$AC_No','$AC_Name','$IFSC_Code','$Aadhar_Card','$Certificate')");
            $id = mysqli_insert_id($conn);
        } else {
// echo "UPDATE `driver` SET `Name`='$Name',`DL_Type`='$DL_Type',`DL_No`='$DL_No',`DL_Validity`='$DL_Validity ',`City`='$City',`Address`='$Address',`Mobile_No`='$Mobile_No',`Emergency_Contact_No`='$Emergency_Contact_No',`Bank_Name`='$Bank_Name',`AC_No`='$AC_No',`AC_Name`='$AC_Name',`IFSC_Code`='$IFSC_Code',`Aadhar_Card`='$Aadhar_Card',`Certificate`='$Certificate'";exit();
           
           
           
            mysqli_query($conn, "UPDATE `driver` SET `Name`='$Name',`DL_Type`='$DL_Type',`DL_No`='$DL_No',`DL_Validity`='$DL_Validity ',`City`='$City',`Address`='$Address',`Mobile_No`='$Mobile_No',`Emergency_Contact_No`='$Emergency_Contact_No',`Bank_Name`='$Bank_Name',`AC_No`='$AC_No',`AC_Name`='$AC_Name',`IFSC_Code`='$IFSC_Code',`Aadhar_Card`='$Aadhar_Card',`Certificate`='$Certificate' where id='$id'");
        }

        echo '<script>
        // alert("Data updated successfully"); 
        window.location="driver.php";</script>';
}

if(isset($_GET['id']))
{
    $uid=$_GET['id'];
    $data=mysqli_fetch_assoc(mysqli_query($conn,"select * from `driver` where id='$uid'"));
}
}
?>

<body class="theme-red" >
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
                                Add Driver
                            </h2>

                        </div>
                        <div class="body">
                            <form id="sender_form" method="post" action="#" enctype="multipart/form-data">
                                <input type="hidden" name="id"
                                    value="<?php if(isset($_GET['id'])) { echo $data['id']; } ?>">

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="Name" name="Name" class="form-control" 
                                            value="<?php echo @$data['Name']; ?>">
                                        <label class="form-label">Driver Name</label>
                                    </div>
                                </div>
                                
                                <!--<div class="form-group form-float">-->
                                <!--    <div class="form-line">-->
                                <!--        <input type="text" id="DL_Type" name="DL_Type" class="form-control" -->
                                <!--            value="<?php echo @$data['DL_Type']; ?>">-->
                                <!--        <label class="form-label">Driver DL_Type</label>-->
                                <!--    </div>-->
                                <!--</div>-->
                                
                                
                                
                                <div class="form-group form-float">
                                    <div class="form-line">                                       
                                        <select id="DL_Type" name="DL_Type" class="form-control" >
                                            <option checked disabled>Select DL Type</option>

                                            <option value="<?php echo @$data['DL_Type']; ?>"><?php echo @$data['DL_Type']; ?>
                                            </option>
                                            <?php 
                                            $dat = mysqli_query($conn , "SELECT * FROM `dl_type`");
                                            while($row= mysqli_fetch_assoc($dat)){
                                            ?>
                                            <option value="<?php  echo $row['name']?>"><?php echo $row['name']?></option>
                                            <?php } ?>
                                        </select>
                                        <label class="form-label">DL Type</label>
                                    </div>
                                </div>
                                
                                
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="DL_No" name="DL_No" class="form-control" 
                                            value="<?php echo @$data['DL_No']; ?>">
                                        <label class="form-label">Driver DL_No</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="DL_Validity" name="DL_Validity" class="form-control" 
                                            value="<?php echo @$data['DL_Validity']; ?>">
                                        <label class="form-label">Driver DL_Validity</label>
                                    </div>
                                </div>

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="City" name="City" class="form-control" 
                                            value="<?php echo @$data['City']; ?>">
                                        <label class="form-label">Driver City</label>
                                    </div>
                                </div>

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="Address" name="Address" class="form-control" 
                                            value="<?php echo @$data['Address']; ?>">
                                        <label class="form-label">Driver Address</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="Mobile_No" name="Mobile_No" class="form-control" 
                                            value="<?php echo @$data['Mobile_No']; ?>">
                                        <label class="form-label">Driver Mobile No</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="Emergency_Contact_No" name="Emergency_Contact_No" class="form-control" 
                                            value="<?php echo @$data['Emergency_Contact_No']; ?>">
                                        <label class="form-label">Driver Emergency_Contact_No</label>
                                    </div>
                                </div>

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="Bank_Name" name="Bank_Name" class="form-control" 
                                            value="<?php echo @$data['Bank_Name']; ?>">
                                        <label class="form-label">Driver Bank_Name</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="AC_No" name="AC_No" class="form-control" 
                                            value="<?php echo @$data['AC_No']; ?>">
                                        <label class="form-label">Driver AC_No</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="AC_Name" name="AC_Name" class="form-control" 
                                            value="<?php echo @$data['AC_Name']; ?>">
                                        <label class="form-label">Driver AC_Name</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="IFSC_Code" name="IFSC_Code" class="form-control" 
                                            value="<?php echo @$data['IFSC_Code']; ?>">
                                        <label class="form-label">Driver IFSC_Code</label>
                                    </div>
                                </div>

                                <!--<div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="Aadhar_Card" name="Aadhar_Card" class="form-control" 
                                            value="<?php echo @$data['Aadhar_Card']; ?>">
                                        <label class="form-label">Driver Aadhar_Card</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="Certificate" name="Certificate" 
                                            class="form-control" value="<?php echo @$data['Certificate']; ?>">
                                        <label class="form-label">Driver Certificate</label>
                                    </div>
                                </div>-->
                                                    

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