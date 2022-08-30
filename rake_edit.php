<?php
include_once('includes/header.php');
include_once('includes/check_login.php');
include_once('includes/footer.php');
$id = $_GET['id'];
echo $type = $_GET['type'];

if ($type == 'delete') {
    $del = mysqli_query($conn, "DELETE FROM `unloading_rake_opening` WHERE `id`='$id'");
    if ($del) {
        echo "<script>alert('Data Deleted Successfully');window.location='rake.php';</script>";
    } else {
        echo "<script>alert('Data Deleted Failed');</script>";
    }
} else {

    if (isset($_POST['submit_sender'])) {
        // echo "<pre>";
        // print_r($_POST);
        // exit();

        $id = $_POST['id'];
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
        $Total_Box = $_POST['box_no_count'];
        $cntt = 0;
        if ($id == '') {
            $qry =  "INSERT INTO `unloading_rake_opening`(`RR_No`, `RR_Qty`, `RR_Date`, `Placement_Time`, `Material`, `Company`, `Transporter`, `Box_Type`, `Billing_Head`, `Remarks`, `Total_Box`,`rake_status`) VALUES ('$RR_No','$RR_Qty','$RR_Date','$Placement_Time','$Material','$Company','$Transporter','$Box_Type','$Billing_Head','$Remarks','$Total_Box','close')";
            $sql1 = "INSERT INTO `box_entry`( `box_no`, `box_status`, `gate_type`, `rake_ref_id`) VALUES ";
            mysqli_query($conn, $qry);
            $rows = [];
            $cmp_id = mysqli_fetch_assoc(mysqli_query($conn, "select max(`id`) as `id` from `unloading_rake_opening`"))['id'];
            for ($i = 0; $i < $Total_Box; $i++) {
                echo $rows[] = "( '{$_POST["boxno"][$i]}','{$_POST["boxstatus"][$i]}','{$_POST["boxgate"][$i]}','{$cmp_id}' )";
            }
            $sql1 .= implode(",", $rows);
            if ($conn->query($sql1)) {
                echo '<script>
          alert("Data added successfully"); 
        window.location="rake.php";</script>';
            }
        } else {
            mysqli_query($conn, "UPDATE `unloading_rake_opening` SET `RR_No`='$RR_No',`RR_Qty`='$RR_Qty',`RR_Date`='$RR_Date',`Placement_Time`='$Placement_Time',
            `Material`='$Material',`Company`='$Company',`Transporter`='$Transporter',`Box_Type`='$Box_Type',`Billing_Head`='$Billing_Head',`Remarks`='$Remarks',
            `Total_Box`='$Total_Box' where id='$id'");

            //$del = mysqli_query($conn, "DELETE FROM `box_entry` where `employee_ref_id`='$id'");
            // if ($del) {
                echo '<script>
          alert("Data updated successfully"); 
        // window.location="rake.php";</script>';
            // }
        }
    }

    if (isset($_GET['id'])) {
        $uid = $_GET['id'];
        $data = mysqli_fetch_assoc(mysqli_query($conn, "select * from `unloading_rake_opening` where id='$uid'"));
        
        $box_result = mysqli_query($conn, "SELECT * FROM `box_entry` where `rake_ref_id`=$uid");
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
                        <form id="sender_form" method="post" action="#" enctype="multipart/form-data">

                            <div class="body">
                                <input type="hidden" name="id" value="<?php if (isset($_GET['id'])) {
                                                                            echo $data['id'];
                                                                        } ?>">

                                <div class="form-group form-float">
                                    <div class="form-line focused">
                                        <input type="datetime-local" id="RR_Date" name="RR_Date" class="form-control" value="<?php echo @$data['RR_Date']; ?>" >
                                        <label class="form-label">RR_Date</label>
                                    </div>
                                </div>

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="RR_No" name="RR_No" class="form-control" value="<?php echo @$data['RR_No']; ?>" >
                                        <label class="form-label">RR_No</label>
                                    </div>
                                </div>

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="RR_Qty" name="RR_Qty" class="form-control" value="<?php echo @$data['RR_Qty']; ?>" >
                                        <label class="form-label">RR_Qty</label>
                                    </div>
                                </div>

                                <div class="form-group form-float">
                                    <div class="form-line focused">
                                        <input type="time" id="Placement_Time" name="Placement_Time" class="form-control" value="<?php echo @$data['Placement_Time']; ?>" >
                                        <label class="form-label">Placement_Time</label>
                                    </div>
                                </div>

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <!--<input type="text" id="Name" name="Name"
                                            class="form-control" value="<?php echo @$data['Name']; ?>"
                                            >-->

                                        <select id="Company" name="Company" class="form-control" >
                                            <option checked disabled>Select Company</option>

                                            <option value="<?php echo @$data['Company']; ?>">
                                                <?php echo @$data['Company']; ?>
                                            </option>
                                            <?php

                                            $dat = mysqli_query($conn, "SELECT * FROM `company`");
                                            while ($row = mysqli_fetch_assoc($dat)) {
                                            ?>
                                                <option value="<?php echo $row['Name'] ?>"><?php echo $row['Name'] ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                        <label class="form-label">Company</label>
                                    </div>
                                </div>


                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <select id="Material" name="Material" class="form-control" >
                                            <option disabled>Select Material</option>
                                            <option value="<?php echo $data['Material']; ?>" selected>
                                                <?php echo @$data['Material']; ?>

                                                <?php
                                                $dat = mysqli_query($conn, "SELECT * FROM `material`");
                                                while ($row = mysqli_fetch_assoc($dat)) {
                                                ?>
                                            <option value="<?php echo $row['name'] ?>"><?php echo $row['name'] ?>
                                            </option>
                                        <?php } ?>
                                        </select>

                                        <label class="form-label">Material</label>
                                    </div>
                                </div>


                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <!-- <input type="text" id="Box_Type" name="Box_Type" class="form-control"
                                            value="<?php echo @$data['Box_Type']; ?>" > -->

                                        <select id="Box_Type" name="Box_Type" class="form-control" >
                                            <option checked disabled>Select Box_Type</option>

                                            <option value="<?php echo @$data['Box_Type']; ?>">
                                                <?php echo @$data['Box_Type']; ?>
                                            </option>
                                            <?php
                                            $dat = mysqli_query($conn, "SELECT * FROM `boxtype`");
                                            while ($row = mysqli_fetch_assoc($dat)) {
                                            ?>
                                                <option value="<?php echo $row['name'] ?>"><?php echo $row['name'] ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                        <label class="form-label">Box_Type</label>
                                    </div>
                                </div>


                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <select id="Transporter" name="Transporter" class="form-control" >
                                            <option checked disabled>Select Transporter</option>
                                            <option value="<?php echo @$data['Transporter']; ?>">
                                                <?php echo @$data['Transporter']; ?>
                                            </option>
                                            <?php
                                            $dat = mysqli_query($conn, "SELECT * FROM `transporter`");
                                            while ($row = mysqli_fetch_assoc($dat)) {
                                            ?>
                                                <option value="<?php echo $row['Name'] ?>"><?php echo $row['Name'] ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                        <label class="form-label">Transporter</label>
                                    </div>
                                </div>

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="box_no_count" name="box_no_count" class="form-control" value="<?php echo @$data['Total_Box']; ?>" >
                                        <label class="form-label">Total_Box</label>
                                    </div>
                                </div>


                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <!-- <input type="text" id="Billing_Head" name="Billing_Head" class="form-control"
                                            value="<?php echo @$data['Billing_Head']; ?>" > -->

                                        <select id="Billing_Head" name="Billing_Head" class="form-control" >
                                            <option checked disabled>Select Billing_Head</option>

                                            <option value="<?php echo @$data['Billing_Head']; ?>">
                                                <?php echo @$data['Billing_Head']; ?>
                                            </option>
                                            <?php
                                            $dat = mysqli_query($conn, "SELECT * FROM `billinghead`");
                                            while ($row = mysqli_fetch_assoc($dat)) {
                                            ?>
                                                <option value="<?php echo $row['name'] ?>"><?php echo $row['name'] ?>
                                                </option>
                                            <?php } ?>
                                        </select>

                                        <label class="form-label">Billing Head</label>
                                    </div>
                                </div>

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="Remarks" name="Remarks" class="form-control" value="<?php echo @$data['Remarks']; ?>" >
                                        <label class="form-label">Remarks</label>
                                    </div>
                                </div>


                                <!-- table add -->



                            </div>

                            <!--total box-->
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="col-sm-2">
                                        Box No.
                                    </div>
                                    <div class="col-sm-2">
                                        Box Status
                                    </div>
                                    <div class="col-sm-2">
                                        Gate Type
                                    </div>
                                </div>
                            </div>

                            <!--testing table-->
                            <table class='table'>
                                   
                                    <tbody id="tbl">
                                        
                                        <?php
                                         if (mysqli_fetch_row($box_result) > 0) {
                                              $box_result = mysqli_query($conn, "SELECT * FROM `box_entry` where `rake_ref_id`=$uid");

                                            while ($row = mysqli_fetch_assoc($box_result)) { ?>
                                        <tr>
                                            <td><input readonly class="form-control" type='text' name='box_no[]' placeholder="Box no" value=<?= $row['box_no'] ?>></td>
                                            <td><select class="form-control">
                                                <option value="full" <?php echo ($row['box_status']='full'?'selected':''); ?>>FULL</option>
                                                <option value="half" <?php echo ($row['box_status']='half'?'selected':''); ?>>HALF</option>
                                                <option value="empty" <?php echo ($row['box_status']='empty'?'selected':''); ?>>EMPTY</option>
                                            </select></td>
                                            <!--<td><input class="form-control" type='text' name='box_status[]' placeholder="box status" value=<?= $row['box_status'] ?>></td>-->
                                            <td><input class="form-control" type='text' name='gate_type[]' placeholder="gate type" value="<?= $row['gate_type'] ?>"></td>
                                        </trr>
                                        <?php } } ?>
                                        </tbody>
                                </table>

                            <!--testing table end-->
                            
                            <div class="row">
                                <div class="input_fields_wrap container-fluid">

                                </div>
                            </div>
                            <!--// total box-->





                            <br />

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


    <script type="text/javascript">
       $(document).ready(function() {

            // var max_fields = 100; //maximum input boxes allowed
            var wrapper = $(".input_fields_wrap"); //Fields wrapper
            // var add_button = $(".add_field_button"); //Add button ID

            var x = 1; //initlal text box count
            var inpid = 1;
         
            
            // $("#box_no_count").keyup(function() {
                $("#box_no_count").keyup(function (e){ 
                    // $("#box_no_count").on("keyup", function(e) {
            // $(document).ready(function() {
                
                $(wrapper).html('');
                var count = $('#box_no_count').val();
                var i;
                for (i = 1; i <= count; i++) {
                    if (i <= 100) { //max input box allowed
                        x++; //text box increment
                        inpid++;
                        $(wrapper).append('<div class="row"><div class="col-sm-2">' +
                            '<input type="text" class="form-control" name="boxno[]" readonly value="' + i + '" id="boxno_' + inpid + '" >' +
                            '</div>' +
                            '<div class="col-sm-2">' +
                            '<select name="boxstatus[]" class="form-control" id="boxstatus_' + inpid + '">' +
                            '<option value="full">FULL</option>' +
                            '<option value="half">HALF</option>' +
                            '<option value="empty">EMPTY</option>' +
                            '</select>' +
                            '</div>' +
                            '<div class="col-sm-2">' +
                            '<select name="boxgate[]" class="form-control" id="boxgate_' + inpid + '">' +
                            '<option value="two">TWO GATE</option>' +
                            '<option value="three">THREE GATE</option>' +
                            '<option value="four">FOUR GATE</option>' +
                            '</select>' +
                            '</div>' +
                            '</div></div>'); //add input box
                    }
                }
             });
             $("#box_no_count").keyup();
        });  
        // <a style="color:#f00;" href="#" class="remove_field">Remove</a>
    </script>
</body>

</html>