<?php 
if(isset($_POST['vehicle_in_unloading'])){
    $Vehicle_No = $_POST['Vehicle_No'];
    $vehicle_type = $_POST['vehicle_type'];
    $loading_slip_no = $_POST['loading_slip_no'];
    $Date = $_POST['Date'];
    $Tare_Weight = $_POST['Tare_Weight'];
    $kata_slip_no = $_POST['kata_slip_no'];
    $D_License_No = $_POST['D_License_No'];
    $Remarks = $_POST['Remarks'];

    
    mysqli_query($conn , "UPDATE `unloading_vehicle_in_temp` SET `Vehicle_No`='$Vehicle_No',`vehicle_type`='$vehicle_type',`loading_slip_no`='$loading_slip_no',`Date`='$Date',`Tare_Weight`='$Tare_Weight',`kata_slip_no`='$kata_slip_no',`D_License_No`='$D_License_No',`Remarks`='$Remarks' WHERE `id`='$id'");
}

?>



<body class="theme-red">

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


    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>

                </h2>
            </div>

            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card" id="card">
                        <div class="header">
                            <h2 class="text-center">
                           <?php                            							 
                           $count = mysqli_fetch_assoc(mysqli_query($conn,"select COUNT(`id`) as 'cid' from `unloading_vehicle_in_temp` where `unloading_ref_id`='$id' AND `status`='0'"));
                           $d = $count['cid'];
                            ?>
                              Vehicle In : <?=$d ?>
                            </h2>
                          <h5>
                          
                          </h5>
                            <!-- <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="unloading_checkpost1_add.php">
                                        <i class="material-icons adds">add</i>
                                    </a>

                                </li>
                            </ul> -->
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover ">
                                    <thead>
                                        <tr>
                                            <th>SNO</th>
                                            <th>Action</th>
                                            <th>Vehicle_No</th>
                                            <th>Vehicle Type</th>
                                            <th>Loading_Slip_No</th>
                                            <th>In Date</th>
                                            <th>Tare_Weight</th>
                                            <th>kata_slip_no</th>
                                            <th>Remarks</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                            <th>Print</th>

                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                $s=1;
                                $sql=mysqli_query($conn,"select * from `unloading_vehicle_in_temp` where `unloading_ref_id`='$id' AND `status`='0'");
                                while($row=mysqli_fetch_assoc($sql))
                                {
                                ?>
                                        <tr>
                                            <td><?php echo $s; ?></td>
                                            <td>
                                              <a href='unloading_vehicle_out_form.php?id=<?php echo $row["id"] ?>'
                                                    class="btn btn-info btn-lg btn-sm">Out</a>
                                          </td>
                                            <td><?php echo $row['Vehicle_No']; ?></td>
                                            <td><?php echo $row['vehicle_type']; ?></td>
                                            <!-- <td><a href="" class="btn btn-danger">OUT</a></td> -->

                                            <td><?php echo $row['loading_slip_no']; ?></td>
                                            <td><?php echo $row['Date']; ?></td>
                                            <td><?php echo $row['Tare_Weight']; ?></td>
                                            <td><?php echo $row['kata_slip_no']; ?></td>
                                            <td><?php echo $row['Remarks']; ?></td>
                                            <!-- <td><a href="unloading_vehicle_entry.php?id=<?php echo $row["id"] ?>" class="btn btn-danger btn-sm">Vehicle Entry</a></td>-->
                                            <td><button class="btn btn-warning btn-sm">IN</button></td>
                                            <td class="action">

                                                <!-- <a href='unloading_vehicle_entry.php?id=<?php echo $row["id"] ?>&type=delete' class="get_id"><i
                                                    class="material-icons">edit</i></a> -->
                                                <a href='unloading_vehicle_entry.php?id=<?php echo $row["id"] ?>&type=delete'
                                                    class="get_id"><i class="material-icons">delete</i></a>
                                                    <a href='unloading_update_vehicle_in.php?id=<?php echo $row["id"] ?>'
                                                    class="get_id"><i class="material-icons">edit</i></a>
                                                

                                                <!-- <a href='javascript:void(0)' class="get_id"
                                                    data-id='<?php echo $row["id"] ?>' data-toggle="modal"
                                                    data-target="#myModal1"><i class="material-icons">edit</i></a> -->
                                            </td>
                                            <td><a href="" class="btn btn-success">Print</a></td>


                                        </tr>

                                        <?php $s++;} ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Exportable Table -->
        </div>
    </section>




    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-body" id="load_data">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>





    



    
    <script>
    $(document).ready(function() {
        $(".get_id").click(function() {
            var ids = $(this).data('id');
            $.ajax({
                url: "rake_view.php",
                method: 'POST',
                data: {
                    id: ids
                },
                success: function(data) {

                    $('#load_data').html(data);

                }

            })
        })

    })
    </script>

    <?php include_once('includes/footer.php'); ?>
</body>

</html>