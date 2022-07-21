<?php include_once('includes/header.php');
include_once('includes/check_login.php');
include_once('includes/db.php');


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
    <?php include_once('includes/sidebar.php'); ?>

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
                                Vehicle
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="vehicle_add.php">
                                        <i class="material-icons adds">add</i>
                                    </a>

                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>Vehicle_No</th>
                                            <th>Vehicle_Type</th>
                                            <th>Regn_Address</th>
                                            <th>Owner_Name</th>
                                            <th>Owner_Address</th>
                                            <th>Owner_PAN</th>
                                            <th>Mobile_No</th>
                                            <th>Mobile_No2</th>
                                            <th>Engine_No</th>
                                            <th>Chassis_No</th>
                                            <th>Year</th>
                                            <th>Capacity</th>
                                            <th>Permit_No</th>
                                            <th>Permit_Valid_Date</th>
                                            <th>Insurance_No</th>
                                            <th>Insurance_Valid_Date</th>
                                            <th>Insurance_Company_Name</th>
                                            <th>Pollution_No</th>
                                            <th>Pollution_Valid_Date</th>
                                            <th>Tax_Token_No</th>
                                            <th>Tax_Valid_Date</th>
                                            <th>HPA</th>
                                            <th>Fitness_Date</th>
                                            <th>Local_Permit_Area</th>
                                            <th>Local_Permit_Valid_Date</th>




                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php

                                    $sql=mysqli_query($conn,"select * from `vehicle_reg`");
                                    while($row=mysqli_fetch_assoc($sql))
                                    {
                                    ?>
                                        <tr>
                                          
                                            <th><?php echo $row['Vehicle_No']; ?></th>
                                            <th><?php echo $row['Vehicle_Type']; ?></th>
                                            <th><?php echo $row['Regn_Address']; ?></th>
                                            <th><?php echo $row['Owner_Name']; ?></th>
                                            <th><?php echo $row['Owner_Address']; ?></th>
                                            <th><?php echo $row['Owner_PAN']; ?></th>
                                            <th><?php echo $row['Mobile_No']; ?></th>
                                            <th><?php echo $row['Mobile_No2']; ?></th>
                                            <th><?php echo $row['Engine_No']; ?></th>
                                            <th><?php echo $row['Chassis_No']; ?></th>
                                            <th><?php echo $row['Year']; ?></th>
                                            <th><?php echo $row['Capacity']; ?></th>
                                            <th><?php echo $row['Permit_No']; ?></th>
                                            <th><?php echo $row['Permit_Valid_Date']; ?></th>
                                            <th><?php echo $row['Insurance_No']; ?></th>
                                            <th><?php echo $row['Insurance_Valid_Date']; ?></th>
                                            <th><?php echo $row['Insurance_Company_Name']; ?></th>
                                            <th><?php echo $row['Pollution_No']; ?></th>
                                            <th><?php echo $row['Pollution_Valid_Date']; ?></th>
                                            <th><?php echo $row['Tax_Token_No']; ?></th>
                                            <th><?php echo $row['Tax_Valid_Date']; ?></th>
                                            <th><?php echo $row['HPA']; ?></th>
                                            <th><?php echo $row['Fitness_Date']; ?></th>
                                            <th><?php echo $row['Local_Permit_Area']; ?></th>
                                            <th><?php echo $row['Local_Permit_Valid_Date']; ?></th>

                                            <td class="action">

                                                <a href='vehicle_add.php?id=<?php echo $row["id"] ?>'
                                                    class="get_id"><i class="material-icons">edit</i></a>
                                                <a href='vehicle_add.php?id=<?php echo $row["id"] ?>&type=delete'
                                                    class="get_id"><i class="material-icons">delete</i></a>
                                                <a href='javascript:void(0)' class="get_id"
                                                    data-id='<?php echo $row["id"] ?>' data-toggle="modal"
                                                    data-target="#myModal"><i class="material-icons">preview</i></a>
                                            </td>
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
                url: "vehicle_view.php",
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