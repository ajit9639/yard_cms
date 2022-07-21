<?php
include_once('includes/header.php');
include_once('includes/check_login.php');

$id=$_GET['id'];
$type = $_GET['type'];
if($type == 'delete'){
    // echo "DELETE FROM `vehicle_reg` WHERE `id`='$id'";exit();
$del = mysqli_query($conn, "DELETE FROM `vehicle_reg` WHERE `id`='$id'");
if($del){
    echo "<script>alert('Data Deleted Successfully');window.location='vehicle.php';</script>";
}else{
    echo "<script>alert('Data Deleted Failed');</script>";
}
}else{

if(isset($_POST['submit_sender']))
{
$id=$_POST['id'];

$Vehicle_No = $_POST['Vehicle_No'];
$Vehicle_Type = $_POST['Vehicle_Type'];
$Regn_Address = $_POST['Regn_Address'];
$Owner_Name = $_POST['Owner_Name'];
$Owner_Address = $_POST['Owner_Address'];
$Owner_PAN = $_POST['Owner_PAN'];
$Mobile_No = $_POST['Mobile_No'];
$Mobile_No2 = $_POST['Mobile_No2'];
$Engine_No = $_POST['Engine_No'];
$Chassis_No = $_POST['Chassis_No'];
$Year = $_POST['Year'];
$Capacity = $_POST['Capacity'];
$Permit_No = $_POST['Permit_No'];
$Permit_Valid_Date = $_POST['Permit_Valid_Date'] ;
$Insurance_No = $_POST['Permit_Valid_Date'];
$Insurance_Valid_Date = $_POST['Insurance_Valid_Date'];
$Insurance_Company_Name = $_POST['Insurance_Company_Name'];
$Pollution_No = $_POST['Pollution_No'];
$Pollution_Valid_Date = $_POST['Pollution_Valid_Date'];
$Tax_Token_No = $_POST['Tax_Token_No'];
$Tax_Valid_Date = $_POST['Tax_Valid_Date'];
$HPA = $_POST['HPA'];
$Fitness_Date = $_POST['Fitness_Date'];
$Local_Permit_Area = $_POST['Local_Permit_Area'];
$Local_Permit_Valid_Date = $_POST['Local_Permit_Valid_Date'];



// echo "INSERT INTO `vehicle_reg`(`Vehicle_No`, `Vehicle_Type`, `Regn_Address`, `Owner_Name`, `Owner_Address`, `Owner_PAN`, `Mobile_No`, `Mobile_No2`, `Engine_No`, `Chassis_No`, `Year`, `Capacity`, `Permit_No.`, `Permit_Valid_Date`, `Insurance_No`, `Insurance_Valid_Date`, `Insurance_Company_Name`, `Pollution_No`, `Pollution_Valid_Date`, `Tax_Token_No`, `Tax_Valid_Date`, `HPA`, `Fitness_Date`, `Local_Permit_Area`, `Local_Permit_Valid_Date`) VALUES ('$Vehicle_No','$Vehicle_Type','$Regn_Address','$Owner_Name','$Owner_Address','$Owner_PAN','$Mobile_No','$Mobile_No2','$Engine_No','$Chassis_No','$Year','$Capacity','$Permit_No','$Permit_Valid_Date','$Insurance_No','$Insurance_Valid_Date','$Insurance_Company_Name','$Pollution_No','$Pollution_Valid_Date','$Tax_Token_No','$Tax_Valid_Date','$HPA','$Fitness_Date','$Local_Permit_Area','$Local_Permit_Valid_Date')";exit();
        if ($id == '') {
            mysqli_query($conn, "INSERT INTO `vehicle_reg`(`Vehicle_No`, `Vehicle_Type`, `Regn_Address`, `Owner_Name`, `Owner_Address`, `Owner_PAN`, `Mobile_No`, `Mobile_No2`, `Engine_No`, `Chassis_No`, `Year`, `Capacity`, `Permit_No`, `Permit_Valid_Date`, `Insurance_No`, `Insurance_Valid_Date`, `Insurance_Company_Name`, `Pollution_No`, `Pollution_Valid_Date`, `Tax_Token_No`, `Tax_Valid_Date`, `HPA`, `Fitness_Date`, `Local_Permit_Area`, `Local_Permit_Valid_Date`) VALUES ('$Vehicle_No','$Vehicle_Type','$Regn_Address','$Owner_Name','$Owner_Address','$Owner_PAN','$Mobile_No','$Mobile_No2','$Engine_No','$Chassis_No','$Year','$Capacity','$Permit_No','$Permit_Valid_Date','$Insurance_No','$Insurance_Valid_Date','$Insurance_Company_Name','$Pollution_No','$Pollution_Valid_Date','$Tax_Token_No','$Tax_Valid_Date','$HPA','$Fitness_Date','$Local_Permit_Area','$Local_Permit_Valid_Date')");
            $id = mysqli_insert_id($conn);
        } else {
            mysqli_query($conn, "UPDATE `vehicle_reg` SET `Vehicle_No`='$Vehicle_No',`Vehicle_Type`='$Vehicle_Type',`Regn_Address`='$Regn_Address',`Owner_Name`='$Owner_Name',`Owner_Address`='$Owner_Address',`Owner_PAN`='$Owner_PAN',`Mobile_No`='$Mobile_No',`Mobile_No2`='$Mobile_No2',`Engine_No`='$Engine_No',`Chassis_No`='$Chassis_No',`Year`='$Year',`Capacity`='$Capacity',`Permit_No`='$Permit_No',`Permit_Valid_Date`='$Permit_Valid_Date',`Insurance_No`='$Insurance_No',`Insurance_Valid_Date`='$Insurance_Valid_Date',`Insurance_Company_Name`='$Insurance_Company_Name',`Pollution_No`='$Pollution_No',`Pollution_Valid_Date`='$Pollution_Valid_Date',`Tax_Token_No`='$Tax_Token_No',`Tax_Valid_Date`='$Tax_Valid_Date',`HPA`='$HPA',`Fitness_Date`='$Fitness_Date',`Local_Permit_Area`='$Local_Permit_Area',`Local_Permit_Valid_Date`='$Local_Permit_Valid_Date' where id='$id'");
        }

        echo '<script>
        // alert("Data updated successfully"); 
        window.location="vehicle.php";</script>';
}

if(isset($_GET['id']))
{
    $uid=$_GET['id'];
    $data=mysqli_fetch_assoc(mysqli_query($conn,"select * from `vehicle_reg` where id='$uid'"));
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
                                Add Vehicle
                            </h2>

                        </div>
                        <div class="body">
                            <form id="sender_form" method="post" action="#" enctype="multipart/form-data">
                                <input type="hidden" name="id"
                                    value="<?php if(isset($_GET['id'])) { echo $data['id']; } ?>">

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="Vehicle_No" name="Vehicle_No" class="form-control" required
                                            value="<?php echo @$data['Vehicle_No']; ?>">
                                        <label class="form-label">Vehicle Number</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="Vehicle_Type" name="Vehicle_Type" class="form-control" required
                                            value="<?php echo @$data['Vehicle_Type']; ?>">
                                        <label class="form-label">Vehicle Type</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="Regn_Address" name="Regn_Address" class="form-control" required
                                            value="<?php echo @$data['Regn_Address']; ?>">
                                        <label class="form-label">Vehicle Regn Address</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="Owner_Name" name="Owner_Name" class="form-control" required
                                            value="<?php echo @$data['Owner_Name']; ?>">
                                        <label class="form-label">Vehicle Owner Name</label>
                                    </div>
                                </div>

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="Owner_Address" name="Owner_Address" class="form-control" required
                                            value="<?php echo @$data['Owner_Address']; ?>">
                                        <label class="form-label">Vehicle Owner Address</label>
                                    </div>
                                </div>

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="Owner_PAN" name="Owner_PAN" class="form-control" required
                                            value="<?php echo @$data['Owner_PAN']; ?>">
                                        <label class="form-label">Vehicle Owner PAN No</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="Mobile_No" name="Mobile_No" class="form-control" required
                                            value="<?php echo @$data['name']; ?>">
                                        <label class="form-label">Vehicle Mobile No</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="Mobile_No2" name="Mobile_No2" class="form-control" required
                                            value="<?php echo @$data['Mobile_No2']; ?>">
                                        <label class="form-label">Vehicle alternate Mobile No</label>
                                    </div>
                                </div>

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="Engine_No" name="Engine_No" class="form-control" required
                                            value="<?php echo @$data['Engine_No']; ?>">
                                        <label class="form-label">Vehicle Engine No</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="Chassis_No" name="Chassis_No" class="form-control" required
                                            value="<?php echo @$data['Chassis_No']; ?>">
                                        <label class="form-label">Vehicle Chassis No</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="Year" name="Year" class="form-control" required
                                            value="<?php echo @$data['Year']; ?>">
                                        <label class="form-label">Vehicle Year</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="Capacity" name="Capacity" class="form-control" required
                                            value="<?php echo @$data['Capacity']; ?>">
                                        <label class="form-label">Vehicle Capacity</label>
                                    </div>
                                </div>

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="Permit_No" name="Permit_No" class="form-control" required
                                            value="<?php echo @$data['Permit_No']; ?>">
                                        <label class="form-label">Vehicle Permit No</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="Permit_Valid_Date" name="Permit_Valid_Date" required
                                            class="form-control" value="<?php echo @$data['Permit_Valid_Date']; ?>">
                                        <label class="form-label">Vehicle Permit Valid Date</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="Insurance_No" name="Insurance_No" class="form-control" required
                                            value="<?php echo @$data['Insurance_No']; ?>">
                                        <label class="form-label">Vehicle Insurance No</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="Insurance_Valid_Date" name="Insurance_Valid_Date" required
                                            class="form-control" value="<?php echo @$data['Insurance_Valid_Date']; ?>">
                                        <label class="form-label">Vehicle Insurance Valid Date</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="Insurance_Company_Name" name="Insurance_Company_Name" required
                                            class="form-control"
                                            value="<?php echo @$data['Insurance_Company_Name']; ?>">
                                        <label class="form-label">Vehicle Insurance Company Name</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="Pollution_No" name="Pollution_No" class="form-control" required
                                            value="<?php echo @$data['Pollution_No']; ?>">
                                        <label class="form-label">Vehicle Pollution No</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="Pollution_Valid_Date" name="Pollution_Valid_Date" required
                                            class="form-control" value="<?php echo @$data['Pollution_Valid_Date']; ?>">
                                        <label class="form-label">Vehicle Pollution Valid Date</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="Tax_Token_No" name="Tax_Token_No" class="form-control" required
                                            value="<?php echo @$data['Tax_Token_No']; ?>">
                                        <label class="form-label">Vehicle Tax Token No</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="Tax_Valid_Date" name="Tax_Valid_Date" required
                                            class="form-control" value="<?php echo @$data['Tax_Valid_Date']; ?>">
                                        <label class="form-label">Vehicle Tax Valid Date</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="HPA" name="HPA" class="form-control" required
                                            value="<?php echo @$data['HPA']; ?>">
                                        <label class="form-label">Vehicle HPA</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="Fitness_Date" name="Fitness_Date" class="form-control" required
                                            value="<?php echo @$data['Fitness_Date']; ?>">
                                        <label class="form-label">Vehicle Fitness Date</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="Local_Permit_Area" name="Local_Permit_Area" required
                                            class="form-control" value="<?php echo @$data['Local_Permit_Area']; ?>">
                                        <label class="form-label">Vehicle Local Permit Area</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="Local_Permit_Valid_Date" name="Local_Permit_Valid_Date" required
                                            class="form-control"
                                            value="<?php echo @$data['Local_Permit_Valid_Date']; ?>">
                                        <label class="form-label">Vehicle Local_Permit_Valid_Date</label>
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