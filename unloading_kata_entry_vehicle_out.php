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
                                Vehicle Out
                            </h2>
                            <?php
                            $query1 = mysqli_query($conn ,"SELECT count(`vehicle_no`) as lsno1 FROM `unloading_vehicle_out_temp` WHERE `unloading_ref_id` = '$id'");
                            $result2 = mysqli_fetch_assoc($query1);
                            $x1 = $result2['lsno1']
                            ?>
                            <h2 class="text-white">Total Vehicle : <?= $x1 ;?></h2>
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
                                <table class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>T. Challan No.</th>
                                            <th>Vehicle No.</th>
                                            <th>Vehicle Type</th>
                                            <th>Challan No.</th>
                                            <th>Tare Wt.</th>
                                            <th>Gross Wt.</th>
                                            <th>Net Wt.</th>
                                            <th>Status</th>
                                            <!-- <th>Action</th> -->
                                            
                                            <!-- <th>Vehicle Entry</th>
                                        <th>Kata Entry</th> -->

                                            <!-- <th>Action</th> -->
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php

$row=mysqli_fetch_assoc(mysqli_query($conn,"select * from `unloading_vehicle_in_temp` where `unloading_ref_id`='$id' AND `kata_status`='1'"));
$row1=mysqli_fetch_assoc(mysqli_query($conn,"select * from `unloading_vehicle_kata_entry_in` where `unloading_ref_id`='$id' "));
                               
                                
                                ?>

                                        <tr>
                                            <td></td>
                                            <td><?php echo $row['Vehicle_No']; ?></td>
                                            <td></td>
                                            <td><?php echo $row1['challn_no']; ?></td>
                                            <td><?php echo $row1['tare_weight']; ?></td>

                                            <td><?php echo $row1['gross_weight']; ?></td>
                                            <td></td>
                                            
                                            <td><button class="btn btn-success btn-sm">OUT</button></td>
                                            <!-- <td class="action">                                               
                                                <a href='unloading_vehicle_entry.php?id=<?php echo $row["id"] ?>&type=outdelete'
                                                    class="get_id"><i class="material-icons">delete</i></a>                                               
                                            </td> -->
                                        </tr>

                                        <?php //} ?>

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