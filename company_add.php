<?php
include_once('includes/header.php');
include_once('includes/check_login.php');

$id = $_GET['id'];
$type = $_GET['type'];
if ($type == 'delete') {

    $del = mysqli_query($conn, "DELETE FROM `company` WHERE `id`='$id'");
    if ($del) {
        echo "<script>alert('Data Deleted Successfully');window.location='company.php';</script>";
    } else {
        echo "<script>alert('Data Deleted Failed');</script>";
    }
} else {

    if (isset($_POST['submit_sender'])) {
        $id = $_POST['id'];

        $Name = $_POST['Name'];
        $Address = $_POST['Address'];
      	$oppaddress = $_POST['oppaddress'];
      	$gstaddress = $_POST['gstaddress'];
        $City = $_POST['City'];
        $State = $_POST['State'];
        $State_Code = $_POST['State_Code'];
        $Pin_Code = $_POST['Pin_Code'];
        $Mobile_No = $_POST['Mobile_No'];
        $alternate_Mobile_No = $_POST['alternate_Mobile_No'];
        $E_mail = $_POST['alternate_Mobile_No'];
        $Website = $_POST['Website'];
        
        $operation_city = $_POST['operation_city'];
        $operation_state = $_POST['operation_state'];
        $operation_pincode = $_POST['operation_pincode'];
        $operation_panno = $_POST['operation_panno'];
        // echo "select max('id') from `company`";
        $cmp_id = mysqli_fetch_assoc(mysqli_query($conn, "select max(`id`) as `id` from `company`"))['id'];


        // echo "<pre>" ;
        // print_r($_POST);
        // exit();

        // echo "INSERT INTO `company`(`Name`, `Address`, `City`, `State`, `State_Code`, `Pin_Code`, `Mobile_No`, `alternate_Mobile_No`, `E_mail`, `Website`) VALUES ('$Name','$Address','$City','$State','$State_Code','$Pin_Code','$Mobile_No','$alternate_Mobile_No','$E_mail','$Website')";exit();
        if ($id == '') {
            mysqli_query($conn, "INSERT INTO `company`(`Name`, `Address`,`oppaddress`,`gstaddress`, `City`, `State`, `State_Code`, `Pin_Code`, `Mobile_No`, `alternate_Mobile_No`, `E_mail`, `Website`,`operation_city`,`operation_state`,`operation_pincode`,`operation_panno`) VALUES 
            ('$Name','$Address','$oppaddress','$gstaddress','$City','$State','$State_Code','$Pin_Code','$Mobile_No','$alternate_Mobile_No','$E_mail','$Website','$operation_city','$operation_state','$operation_pincode','$operation_panno')");

            $sql1 = "INSERT INTO `company_employee`(`employee_name`, `employee_number`, `employee_email`, `employee_designation`, `employee_ref_id`) VALUES ";
            
            



            $rows = [];
            $cmp_id = mysqli_fetch_assoc(mysqli_query($conn, "select max(`id`) as `id` from `company`"))['id'];
            for ($i = 0; $i < count($_POST["employee_name"]); $i++) {
                $rows[] = "( '{$_POST["employee_name"][$i]}','{$_POST["employee_number"][$i]}','{$_POST["employee_email"][$i]}','{$_POST["employee_designation"][$i]}','{$cmp_id}' )";
            }
            $sql1 .= implode(",", $rows);
            if ($conn->query($sql1)) {
                echo '<script>
        // alert("Data updated successfully"); 
        window.location="company.php";</script>';
            } else {
                echo "Added Failed!!!";
            }
            // $id = mysqli_insert_id($conn );
        }else{


        
        mysqli_query($conn, "UPDATE `company` SET `Name`='$Name',`Address`='$Address',`City`='$City',`State`='$State',`State_Code`='$State_Code',`Pin_Code`='$Pin_Code',`Mobile_No`='$Mobile_No',`alternate_Mobile_No`='$alternate_Mobile_No',`E_mail`='$E_mail',`Website`='$Website',`operation_city`='$operation_city',`operation_state`='$operation_state',`operation_pincode`='$operation_pincode',`operation_panno`='$operation_panno' where `id`='$id'");
        
        $del = mysqli_query($conn,"DELETE FROM `company_employee` where `employee_ref_id`='$id'");
        if($del){            
        
        $sql1 = "INSERT INTO `company_employee`(`employee_name`, `employee_number`, `employee_email`, `employee_designation`, `employee_ref_id`) VALUES ";
        $rows = [];
        for ($i = 0; $i < count($_POST["employee_name"]); $i++) {
        $rows[] = "( '{$_POST["employee_name"][$i]}','{$_POST["employee_number"][$i]}','{$_POST["employee_email"][$i]}','{$_POST["employee_designation"][$i]}','{$cmp_id}' )";
        }
        $sql1 .= implode(",", $rows);
        if ($conn->query($sql1)) {
            echo '<script>
            // alert("Data updated successfully"); 
            window.location="company.php";</script>';
        } else {
            echo "Added Failed!!!";
        }
        echo '<script>
        // alert("Data updated successfully"); 
        window.location="company.php";</script>';
    }
}
    



        
    }
    if (isset($_GET['id'])) {
        $uid = $_GET['id'];
        $data = mysqli_fetch_assoc(mysqli_query($conn, "select * from `company` where id='$uid'"));

        $get_id = $data['employee_ref_id'];

        $company_employee_result = mysqli_query($conn, "SELECT * FROM `company_employee` where `employee_ref_id`=$uid");
    }
}
?>

<body class="theme-red">
    <!-- Page Loader -->
    <!-- <div class="page-loader-wrapper">
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
    </div> -->
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
                <h2>Manage Company</h2>
            </div>

            <!-- Vertical Layout | With Floating Label -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card" id="card">
                        <div class="header">
                            <h2>
                                Company
                            </h2>

                        </div>
                        <div class="body">
                            <form id="sender_form" method="post" action="#" enctype="multipart/form-data">
                                <input type="hidden" name="id" value="<?php if (isset($_GET['id'])) {
                                                                            echo $data['id'];
                                                                        } ?>">

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="Name" name="Name" class="form-control"
                                            value="<?php echo @$data['Name']; ?>">
                                        <label class="form-label">Company Name</label>
                                    </div>
                                </div>

                               
                                
                                

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="State_Code" name="State_Code" class="form-control"
                                            value="<?php echo @$data['State_Code']; ?>">
                                        <label class="form-label">GSTIN</label>
                                    </div>
                                </div>
								
                              <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="gstaddress" name="gstaddress" class="form-control"
                                            value="<?php echo @$data['gstaddress']; ?>">
                                        <label class="form-label">GST Address</label>
                                    </div>
                                </div>
                              
                                

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="Mobile_No" name="Mobile_No" class="form-control"
                                            value="<?php echo @$data['Mobile_No']; ?>">
                                        <label class="form-label">Mobile_No</label>
                                    </div>
                                </div>

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="alternate_Mobile_No" name="alternate_Mobile_No"
                                            class="form-control" value="<?php echo @$data['alternate_Mobile_No']; ?>">
                                        <label class="form-label">Whatsapp No</label>
                                    </div>
                                </div>

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="E_mail" name="E_mail" class="form-control"
                                            value="<?php echo @$data['E_mail']; ?>">
                                        <label class="form-label">E_mail</label>
                                    </div>
                                </div>

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="Website" name="Website" class="form-control"
                                            value="<?php echo @$data['Website']; ?>">
                                        <label class="form-label">Website</label>
                                    </div>
                                </div>
                             
                             
                              <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="oppaddress" name="oppaddress" class="form-control"
                                            value="<?php echo @$data['oppaddress']; ?>">
                                        <label class="form-label">Operating Address</label>
                                    </div>
                                </div>   
                                
                                
                                
                                
                                
                                
                                 <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="operation_city" name="operation_city" class="form-control"
                                            value="<?php echo @$data['operation_city']; ?>">
                                        <label class="form-label">Operating City</label>
                                    </div>
                                </div>  
                                
                                 <div class="form-group form-float">
                                    <div class="form-line focused">                                       
                                        <select id="operation_state" name="operation_state" class="form-control" >
                                            <option checked disabled>Select Operating State</option>

                                            <option value="<?php echo @$data['operation_state']; ?>"><?php echo @$data['operation_state']; ?>
                                            </option>
                                            <?php 
                                            $dat = mysqli_query($conn , "SELECT * FROM `state`");
                                            while($row= mysqli_fetch_assoc($dat)){
                                            ?>
                                            <option value="<?php  echo $row['name']?>"><?php echo $row['name']?></option>
                                            <?php } ?>
                                        </select>
                                        <label class="form-label">Select Operating State</label>
                                    </div>
                                </div> 
                                
                                 <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="operation_pincode" name="operation_pincode" class="form-control"
                                            value="<?php echo @$data['operation_pincode']; ?>">
                                        <label class="form-label">Operating Pincode</label>
                                    </div>
                                </div>  
                                
                                 <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="operation_panno" name="operation_panno" class="form-control"
                                            value="<?php echo @$data['operation_panno']; ?>">
                                        <label class="form-label">Operation PAN NO</label>
                                    </div>
                                </div>  
                                
                                   
                                
                                
                                
                                
                                
                                 <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="Address" name="Address" class="form-control"
                                            value="<?php echo @$data['Address']; ?>">
                                        <label class="form-label">Address</label>
                                    </div>
                                </div>
                              
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="City" name="City" class="form-control"
                                            value="<?php echo @$data['City']; ?>">
                                        <label class="form-label">City</label>
                                    </div>
                                </div>
                                
                                 <div class="form-group form-float">
                                    <div class="form-line focused">                                       
                                        <select id="State" name="State" class="form-control" >
                                            <option checked disabled>Select State</option>

                                            <option value="<?php echo @$data['State']; ?>"><?php echo @$data['State']; ?>
                                            </option>
                                            <?php 
                                            $dat = mysqli_query($conn , "SELECT * FROM `state`");
                                            while($row= mysqli_fetch_assoc($dat)){
                                            ?>
                                            <option value="<?php  echo $row['name']?>"><?php echo $row['name']?></option>
                                            <?php } ?>
                                        </select>
                                        <label class="form-label">Select State</label>
                                    </div>
                                </div>

                                    
                                    <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="Pin_Code" name="Pin_Code" class="form-control"
                                            value="<?php echo @$data['Pin_Code']; ?>">
                                        <label class="form-label">Pin_Code</label>
                                    </div>
                                </div>
                              
                             


                               

                                <!--<div class="form-group form-float">-->
                                <!--    <div class="form-line">-->
                                <!--        <input type="text" id="State" name="State" class="form-control"-->
                                <!--            value="<?php echo @$data['State']; ?>">-->
                                <!--        <label class="form-label">State Name</label>-->
                                <!--    </div>-->
                                <!--</div>-->
                                
                                

                                <table class='table'>
                                    <thead>
                                        <tr>
                                            <td>Contact person</td>
                                            <td>Mobile</td>
                                            <td>Email</td>
                                            <td>Designation</td>
                                        </tr>
                                    </thead>
                                    <tbody id="tbl">
                                        <?php

                                        if (mysqli_fetch_row($company_employee_result) > 0) {
                                            $company_employee_result = mysqli_query($conn, "SELECT * FROM `company_employee` where `employee_ref_id`=$uid");

                                            while ($row = mysqli_fetch_assoc($company_employee_result)) { ?>
                                        <tr>
                                            <td><input class="form-control" type='text' name='employee_name[]'
                                                    placeholder="employee_name" 
                                                    value=<?= $row['employee_name'] ?>></td>
                                            <td><input class="form-control" type='text' name='employee_number[]'
                                                    placeholder="employee_number" 
                                                    value=<?= $row['employee_email'] ?>></td>
                                            <td><input class="form-control" type='text' name='employee_email[]'
                                                    placeholder="employee_email" value="<?= $row['employee_email'] ?>">
                                            </td>
                                            <td><input class="form-control" type='text' name='employee_designation[]'
                                                    placeholder="employee_designation" 
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
                                                    placeholder="employee_name" 
                                                    value=<?= $row['employee_name'] ?>></td>
                                            <td><input class="form-control" type='text' name='employee_number[]'
                                                    placeholder="employee_number" 
                                                    value=<?= $row['employee_email'] ?>></td>
                                            <td><input class="form-control" type='text' name='employee_email[]'
                                                    placeholder="employee_email" value="<?= $row['employee_email'] ?>">
                                            </td>
                                            <td><input class="form-control" type='text' name='employee_designation[]'
                                                    placeholder="employee_designation" 
                                                    value=<?= $row['employee_designation'] ?>></td>
                                            <td><input class="btn btn-success btn-sm" type='button' value='+'
                                                    onclick='add_row()'></td>
                                            <td><input class="btn btn-danger btn-sm" type='button' value='-'
                                                    onclick='remove_row(this)'></td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>






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
<script>
function add_row() {
    var tr = document.createElement("tr");
    tr.innerHTML =
        "<td><input type='text' class='form-control' placeholder='Contact person name' name='employee_name[]'  ></td> <td><input type='text'  placeholder='person phone' class='form-control' name='employee_number[]'  ></td> <td><input type='text'  placeholder='person phone2' class='form-control' name='employee_email[]'  ></td> <td><input type='text' class='form-control'  placeholder=' person Designation' name='employee_designation[]'  ></td> <td><input type='button' value='+' onclick='add_row()' class='btn btn-success btn-sm'></td> <td><input type='button' value='-' onclick='remove_row(this)' class='btn btn-danger btn-sm'></td>";
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

</html>