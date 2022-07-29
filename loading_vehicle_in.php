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
                                Loading Vehicle In
                            </h2>
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


                                            <th>Kata Slip No</th>
                                            <th>Company Challan No</th>
                                            <th>Vehicle_No</th>
                                            <th>Date</th>
                                            <th>D_License_No</th>
                                            <th>Tare_Weight</th>
                                            <th>Gross</th>
                                            <th>Net_weight</th>
                                            <th>Dump</th>
                                            <th>Remarks</th>

                                            <th>Action</th>
                                            <th>Print</th>

                                            <!-- <th>Action</th> -->
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php

                            $sql=mysqli_query($conn,"SELECT * FROM `loading_vehicle_entry` where `rake_ref_id`='$id'");
                            while($row=mysqli_fetch_assoc($sql))
                            {
                            ?>
                                        <tr>

                                            <td><?php echo $row['kata_slip_no']; ?></td>
                                            <td><?php echo $row['c_challan_no']; ?></td>
                                            <td><?php echo $row['Vehicle']; ?></td>
                                            <td><?php echo $row['Date']; ?></td>
                                            <td><?php echo $row['driver_licence_no']; ?></td>
                                            <td><?php echo $row['tare_weight']; ?></td>
                                            <td><?php echo $row['gross_weight']; ?></td>
                                            <td><?php echo $row['net_weight']; ?></td>
                                            <td><?php echo $row['dump']; ?></td>
                                            <td><?php echo $row['remark']; ?></td>
                                            
                                            
                                                                                                                                                                              
                                            <td class="action">

                                                <!-- <a href='unloading_checkpost1_add.php?id=<?php echo $row["id"] ?>' class="get_id"><i
                                                class="material-icons">edit</i></a> -->
                                                <a href='loading_vehicle_entry.php?id=<?php echo $row["id"] ?>&type=delete'
                                                    class="get_id"><i class="material-icons">delete</i></a>

                                                    <a href='loading_vehicle_entry_update.php?id=<?php echo $row["id"] ?>'
                                                    class="get_id"><i class="material-icons">edit</i></a>

                                                <!-- <a href='javascript:void(0)' class="get_id"
                                            data-id='<?php echo $row["id"] ?>' data-toggle="modal"
                                            data-target="#myModal"><i class="material-icons">preview</i></a> -->
                                            </td>
                                            <td><a href="" class="btn btn-success">Print</a></td>
                                        </tr>

                                        <?php } ?>

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
            <!-- Modal content-->
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