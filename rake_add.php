<?php
include_once('includes/header.php');
include_once('includes/check_login.php');

$id=$_GET['id'];
echo $type = $_GET['type'];

if($type == 'delete'){
$del = mysqli_query($conn, "DELETE FROM `unloading_rake_opening` WHERE `id`='$id'");
if($del){
    echo "<script>alert('Data Deleted Successfully');window.location='rake.php';</script>";
}else{
    echo "<script>alert('Data Deleted Failed');</script>";
}
}else{

if(isset($_POST['submit_sender']))
{

    // echo "<pre>";
    // print_r($_POST);
    // exit();

$id=$_POST['id'];    
$RR_No = $_POST['RR_No'];
$RR_Qty = $_POST['RR_Qty'];
$RR_Date = $_POST['RR_Date'];
$Placement_Time = $_POST['Placement_Time'];
$Material = $_POST['Material'];
$Company = $_POST['Company'];
$Transporter = $_POST['Transporter'];
$Box_Type = $_POST['Box_Type'];
$Billing_Head = $_POST['Billing_Head'];
$Remarks = $_POST['Remarks'];
$Total_Box = $_POST['Total_Box'];
       
if ($id == '') {
            mysqli_query($conn, "INSERT INTO `unloading_rake_opening`(`RR_No`, `RR_Qty`, `RR_Date`, `Placement_Time`, `Material`, `Company`, `Transporter`, `Box_Type`, `Billing_Head`, `Remarks`, `Total_Box`,`rake_status`) VALUES ('$RR_No','$RR_Qty','$RR_Date','$Placement_Time','$Material','$Company','$Transporter','$Box_Type','$Billing_Head','$Remarks','$Total_Box','close')");
            // $id = mysqli_insert_id($conn);
            $sql1 = "INSERT INTO `box_entry`(`employee_name`, `employee_number`, `employee_email`, `employee_designation`, `employee_ref_id`) VALUES ";
            
            



            $rows = [];
            $cmp_id = mysqli_fetch_assoc(mysqli_query($conn, "select max(`id`) as `id` from `company`"))['id'];
            for ($i = 0; $i < count($_POST["employee_name"]); $i++) {
                $rows[] = "( '{$_POST["employee_name"][$i]}','{$_POST["employee_number"][$i]}','{$_POST["employee_email"][$i]}','{$_POST["employee_designation"][$i]}','{$cmp_id}' )";
            }
            $sql1 .= implode(",", $rows);
            if ($conn->query($sql1)) {
                echo '<script>
        // alert("Data updated successfully"); 
        window.location="rake.php";</script>';
            } else {
                echo "Added Failed!!!";
            }
            // $id = mysqli_insert_id($conn );
        }else{
            mysqli_query($conn, "UPDATE `unloading_rake_opening` SET `RR_No`='$RR_No',`RR_Qty`='$RR_Qty',`RR_Date`='$RR_Date',`Placement_Time`='$Placement_Time',`Material`='$Material',`Company`='$Company',`Transporter`='$Transporter',`Box_Type`='$Box_Type',`Billing_Head`='$Billing_Head',`Remarks`='$Remarks',`Total_Box`='$Total_Box' where id='$id'");
        
            $del = mysqli_query($conn,"DELETE FROM `box_entry` where `employee_ref_id`='$id'");
        if($del){            
        
        $sql1 = "INSERT INTO `box_entry`(`employee_name`, `employee_number`, `employee_email`, `employee_designation`, `employee_ref_id`) VALUES ";
        $rows = [];
        for ($i = 0; $i < count($_POST["employee_name"]); $i++) {
        $rows[] = "( '{$_POST["employee_name"][$i]}','{$_POST["employee_number"][$i]}','{$_POST["employee_email"][$i]}','{$_POST["employee_designation"][$i]}','{$cmp_id}' )";
        }
        $sql1 .= implode(",", $rows);
        if ($conn->query($sql1)) {
            echo '<script>
            // alert("Data updated successfully"); 
            window.location="rake.php";</script>';
        } else {
            echo "Added Failed!!!";
        }
        echo '<script>
        // alert("Data updated successfully"); 
        window.location="rake.php";</script>';
    }
}
        
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

                                <div class="form-group form-float">
                                    <div class="form-line focused">
                                        <input type="date" id="RR_Date" name="RR_Date" class="form-control"
                                            value="<?php echo @$data['RR_Date']; ?>" required>
                                        <label class="form-label">RR_Date</label>
                                    </div>
                                </div>

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="RR_No" name="RR_No" class="form-control"
                                            value="<?php echo @$data['RR_No']; ?>" required>
                                        <label class="form-label">RR_No</label>
                                    </div>
                                </div>

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="RR_Qty" name="RR_Qty" class="form-control"
                                            value="<?php echo @$data['RR_Qty']; ?>" required>
                                        <label class="form-label">RR_Qty</label>
                                    </div>
                                </div>

                                <div class="form-group form-float">
                                    <div class="form-line focused">
                                        <input type="time" id="Placement_Time" name="Placement_Time"
                                            class="form-control" value="<?php echo @$data['Placement_Time']; ?>"
                                            required>
                                        <label class="form-label">Placement_Time</label>
                                    </div>
                                </div>

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <!-- <input type="text" id="Company" name="Company" class="form-control"
                                            value="<?php echo @$data['Company']; ?>" required> -->
                                        <select id="Company" name="Company" class="form-control" required>
                                            <option checked disabled>Select Company</option>

                                            <option value="<?php echo @$data['Company']; ?>">
                                                <?php echo @$data['Company']; ?>
                                            </option>
                                            <?php 
                                            $dat = mysqli_query($conn , "SELECT * FROM `Company`");
                                            while($row= mysqli_fetch_assoc($dat)){
                                            ?>
                                            <option value="<?php  echo $row['Name']?>"><?php echo $row['Name']?>
                                            </option>
                                            <?php } ?>
                                        </select>
                                        <label class="form-label">Company</label>
                                    </div>
                                </div>


                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <select id="Material" name="Material" class="form-control" required>
                                            <option disabled>Select Material</option>
                                            <option value="<?php echo $data['Material']; ?>" selected>
                                                <?php echo @$data['Material']; ?>

                                                <?php 
                                            $dat = mysqli_query($conn , "SELECT * FROM `material`");
                                            while($row= mysqli_fetch_assoc($dat)){
                                            ?>
                                            <option value="<?php  echo $row['name']?>"><?php echo $row['name']?>
                                            </option>
                                            <?php } ?>
                                        </select>

                                        <label class="form-label">Material</label>
                                    </div>
                                </div>


                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <!-- <input type="text" id="Box_Type" name="Box_Type" class="form-control"
                                            value="<?php echo @$data['Box_Type']; ?>" required> -->
                                        <select id="Box_Type" name="Box_Type" class="form-control" required>
                                            <option checked disabled>Select Box_Type</option>

                                            <option value="<?php echo @$data['Box_Type']; ?>">
                                                <?php echo @$data['Box_Type']; ?>
                                            </option>
                                            <?php 
                                            $dat = mysqli_query($conn , "SELECT * FROM `boxtype`");
                                            while($row= mysqli_fetch_assoc($dat)){
                                            ?>
                                            <option value="<?php  echo $row['name']?>"><?php echo $row['name']?>
                                            </option>
                                            <?php } ?>
                                        </select>
                                        <label class="form-label">Box_Type</label>
                                    </div>
                                </div>



                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="box_no_count" name="Total_Box" class="form-control"
                                            value="<?php echo @$data['Total_Box']; ?>" required>
                                        <label class="form-label">Total_Box</label>
                                    </div>
                                </div>

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <!-- <input type="text" id="Transporter" name="Transporter" class="form-control"
                                            value="<?php echo @$data['Transporter']; ?>" required> -->
                                        <select id="Transporter" name="Transporter" class="form-control" required>
                                            <option checked disabled>Select Transporter</option>

                                            <option value="<?php echo @$data['Transporter']; ?>">
                                                <?php echo @$data['Transporter']; ?>
                                            </option>
                                            <?php 
                                            $dat = mysqli_query($conn , "SELECT * FROM `Transporter`");
                                            while($row= mysqli_fetch_assoc($dat)){
                                            ?>
                                            <option value="<?php  echo $row['Name']?>"><?php echo $row['Name']?>
                                            </option>
                                            <?php } ?>
                                        </select>
                                        <label class="form-label">Transporter</label>
                                    </div>
                                </div>



                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <!-- <input type="text" id="Billing_Head" name="Billing_Head" class="form-control"
                                            value="<?php echo @$data['Billing_Head']; ?>" required> -->

                                        <select id="Billing_Head" name="Billing_Head" class="form-control" required>
                                            <option checked disabled>Select Billing_Head</option>

                                            <option value="<?php echo @$data['Billing_Head']; ?>">
                                                <?php echo @$data['Billing_Head']; ?>
                                            </option>
                                            <?php 
                                            $dat = mysqli_query($conn , "SELECT * FROM `billinghead`");
                                            while($row= mysqli_fetch_assoc($dat)){
                                            ?>
                                            <option value="<?php  echo $row['name']?>"><?php echo $row['name']?>
                                            </option>
                                            <?php } ?>
                                        </select>

                                        <label class="form-label">Billing Head</label>
                                    </div>
                                </div>

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="Remarks" name="Remarks" class="form-control"
                                            value="<?php echo @$data['Remarks']; ?>" required>
                                        <label class="form-label">Remarks</label>
                                    </div>
                                </div>









                                <!-- table add -->

                                <table class='table'>
                                    <thead>
                                        <tr>
                                            <td>Box No</td>
                                            <td>Status(Full / Empty)</td>
                                            <td>Contractor Name</td>
                                            <td>Contractor Amount</td>
                                        </tr>
                                    </thead>
                                    <tbody id="tbl">
                                        <?php

                                        if (mysqli_fetch_row($box_entry_result) > 0) {
                                            $box_entry_result = mysqli_query($conn, "SELECT * FROM `box_entry` where `rake_referance_id`=$uid");

                                            while ($row = mysqli_fetch_assoc($box_entry_result)) { ?>
                                        <tr>
                                            <td><input class="form-control" type='text' name='employee_name[]'
                                                    placeholder="box_no" required value=<?= $row['employee_name'] ?>>
                                            </td>





                                            <td>
                                                <select class="form-control" name='employee_number[]'>
                                                    <option selected>Select Status</option>
                                                    <option value=Full>Full</option>
                                                    <option value=Empty>Empty</option>
                                                </select>
                                            </td>






                                            <td><input class="form-control" type='text' name='employee_email[]'
                                                    placeholder="contractor_name" value="<?= $row['employee_email'] ?>">
                                            </td>
                                            <td><input class="form-control" type='text' name='employee_designation[]'
                                                    placeholder="contractor_amount" required
                                                    value=<?= $row['employee_designation'] ?>></td>
                                            <td><input class="btn btn-success btn-sm" type='button' value='+'
                                                    onclick='add_row()'></td>
                                            <td><input class="btn btn-danger btn-sm" type='button' value='-'
                                                    onclick='remove_row(this)'></td>
                                        </tr>
                                        <?php }
                                        } else { ?>
                                        <tr>
                                            <td><input class="form-control" type='text' name='employee_name[]'
                                                    placeholder="Box No" required value=<?= $row['employee_name'] ?>>
                                            </td>



                                            <td>
                                                <!-- <input class="form-control" type='text' name='employee_number[]' placeholder="employee_number" required value=<?= $row['employee_email'] ?>> -->
                                                <select class="form-control" name='employee_number[]'>
                                                    <option selected>Select Status</option>
                                                    <option value=Full>Full</option>
                                                    <option value=Empty>Empty</option>
                                                </select>
                                            </td>





                                            <td><input class="form-control" type='text' name='employee_email[]'
                                                    placeholder="Contractor Name" value="<?= $row['employee_email'] ?>">
                                            </td>
                                            <td><input class="form-control" type='text' name='employee_designation[]'
                                                    placeholder="Contractor Amount" required
                                                    value=<?= $row['employee_designation'] ?>></td>
                                            <td><input class="btn btn-success btn-sm" type='button' value='+'
                                                    onclick='add_row()'></td>
                                            <td><input class="btn btn-danger btn-sm" type='button' value='-'
                                                    onclick='remove_row(this)'></td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                                <!-- // table add -->










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

    <script>
    function add_row() {
        var tr = document.createElement("tr");
        tr.innerHTML =
            "<td><input type='text' class='form-control' placeholder='Box No' name='employee_name[]' required ></td> <td><select class='form-control' name='employee_number[]'><option selected>Select Status</option><option value=Full>Full</option><option value=Empty>Empty</option></select></td> <td><input type='text'  placeholder='Contractor Name' class='form-control' name='employee_email[]' required ></td> <td><input type='text' class='form-control'  placeholder='Contractor Amount' name='employee_designation[]'  ></td> <td><input type='button' value='+' onclick='add_row()' class='btn btn-success btn-sm'></td> <td><input type='button' value='-' onclick='remove_row(this)' class='btn btn-danger btn-sm'></td>";
        document.getElementById("tbl").appendChild(tr);
    }

    function remove_row(e) {
        var n = document.querySelector("#tbl").querySelectorAll("tr").length;
        if (n > 1 && confirm("Are You Sure") == true) {
            var ele = e.parentNode.parentNode;
            ele.remove();
        }
    }
    </script>
</body>

</html>