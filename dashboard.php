<?php include_once('includes/header.php');
include_once('includes/check_login.php');?>


<html>
<head>
<style>
.green {

    background-color: #efefef;
}
.yellow {

background-color: #efefef;
}
.red {

background-color: #efefef;
}
.purple {

background-color: #efefef;
}
.grey {
    background-color: #c7c7c7;
    color: #4e4e4e;
    font-weight: 800;
    padding: 10px;
    text-align: center;
}

.grey a{
    text-decoration: none;
}
.spc
{
    background: #dadada;
    padding: 30px;
    text-align: center;
    min-height: 205px;
    border-radius: 20px;
    box-shadow: 4px 4px 10px #000000;
}
.dashboard-box{
    margin-bottom:20px;
    
}
.dashboard-box h3{
    color: #4c4c4c;
    font-size: 1em;
    font-weight: 800;
    line-height: 20px;
}

.dashboard-title{
text-align:center;
font-weight:600;
}
</style>
</head>
<body class="theme-red">
    <!-- Page Loader -->
<!--     
    <div class="page-loader-wrapper">
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
    <!-- <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons">search</i>
        </div>
        </div>
        <input type="text" placeholder="START TYPING...">
        <div class="close-search">
            <i class="material-icons">close</i>
        </div>
    </div> -->
    <!-- #END# Search Bar -->

   <?php include_once('includes/sidebar.php');?>

    <section class="content" style="background: #5a9de2;height: 100vh;" id="card">
        <div class="container-fluid">
            <div class="block-header">
                <!-- <h2 class="dashboard-title">DASHBOARD</h2> -->
            </div>

            <!-- Widgets -->
            <div class="row clearfix">            </div>
            <div class="body">
            <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6 dashboard-box">
                    <div class="green spc">
<!-- <h3> <?php //$cr_query=mysqli_fetch_assoc(mysqli_query($conn,"select count(id) as total from User;")); $credit_amount=$cr_query['total'];    echo $credit_amount; ?> 
                    </h3> -->
                    <a href="user_list.php"> 
                    <img src="images/driverlist.png"  style="width:60px;"/>
                    <h3>Driver Lists</h3>
                    </a>
                 </div>
                 <!-- <div class="grey"><a href="user_list.php">Full Detail <i class="fa fa-arrow-right" aria-hidden="true"></i></a></div> -->
                </div>
                <div class="col-sm-6 dashboard-box">
                    <div class="yellow spc">
                    
<!-- <h3> <?php// $cr_query=mysqli_fetch_assoc(mysqli_query($conn,"select count(id) as total from txn_logs;"));  $credit_amount=$cr_query['total']; echo $credit_amount; ?>  </h3> -->
<a href="bookings_list.php">
                    <img src="images/bookings.png"  style="width:60px;"/>
                    <h3> Oncall Bookings </h3>
                    </a>
                    </div>
                    <!-- <div class="grey"><a href="bookings_list.php">Full Detail <i class="fa fa-arrow-right" aria-hidden="true"></i></a></div> -->
                </div>
                <div class="col-sm-6 dashboard-box">
                    <div class="red spc">
                    
                   <!-- <h3> <?php $cr_query=mysqli_fetch_assoc(mysqli_query($conn,"select sum(Advance_Amount) as total from expense_tbl;")); 
                   // $cr_query2=mysqli_fetch_assoc(mysqli_query($conn,"select sum(Night_Stay) as total2 from expense_tbl;"));
                   // $cr_query3=mysqli_fetch_assoc(mysqli_query($conn,"select sum(Fuel_Expense) as total3 from expense_tbl;"));
                   // $cr_query4=mysqli_fetch_assoc(mysqli_query($conn,"select sum(Parking_Expense) as total4 from expense_tbl;"));
                   // $cr_query5=mysqli_fetch_assoc(mysqli_query($conn,"select sum(Misc_Expense) as total5 from expense_tbl;"));
                   // $credit_amount=$cr_query['total'];
                   // $credit_amount2=$cr_query['total2'];
                   // $credit_amount3=$cr_query['total3'];
                   // $credit_amount4=$cr_query['total4'];
                   // $credit_amount5=$cr_query['total5'];
                   // $final = $credit_amount + $credit_amount2 + $credit_amount3 + $credit_amount4 + $credit_amount5;
                   // echo $final; ?> 
                    </h3> -->
                    <a href="expense_register.php">
                    <img src="images/expences.png"  style="width:60px;"/>
                    <h3>Total Expenses</h3>
                    </a>
                    </div>
                    <!-- <div class="grey"><a href="expense_register.php">Full Detail <i class="fa fa-arrow-right" aria-hidden="true"></i></a></div> -->
                </div>
                <div class="col-sm-6 dashboard-box">
                    <div class="purple spc">
                    
  <!-- <h3> <?php// $cr_query=mysqli_fetch_assoc(mysqli_query($conn,"select count(id) as total from trip_tbl;")); $credit_amount=$cr_query['total']; echo $credit_amount; ?>  </h3> -->
  <a href="trip_register.php">
                    <img src="images/trip.png"  style="width:60px;"/>
                    <h3>Total Booked Trips</h3>
                    </a>
                    </div>
                    <!-- <div class="grey"><a href="trip_register.php">Full Detail <i class="fa fa-arrow-right" aria-hidden="true"></i></a></div> -->
                </div> 
            </div>    
            </div></div>
            <!-- <div class="body">
                <?php $account_query=mysqli_query($conn,"select * from `account_master`");
                while($sql=mysqli_fetch_assoc($account_query))
                {  ?>
                <div class="column active_users" style="background-color:#3a7a51;">
                    <div style="padding-top: 5px;padding-left: 11px;padding-right: 5px;padding-bottom: 9px;"><h6 style="text-align: left;"><i class="fa fa-money"></i> <?php echo $sql['name']; ?></h6>
                        <h2 class="" style="line-height: 15px;"> <b><i class="fa fa-inr"></i>
                            <?php
                            $opening_balance=$sql['opening_balance'];
                            $acc_id=$sql['id'];
                            $cr_query=mysqli_fetch_assoc(mysqli_query($conn,"select sum(amt) as total from txn_logs where `account_id`='$acc_id' and `txn_type`='IN'"));
                            $credit_amount=$cr_query['total'];

                            $dr_query=mysqli_fetch_assoc(mysqli_query($conn,"select sum(amt) as total from txn_logs where `account_id`='$acc_id' and `txn_type`='OUT'"));
                            $debit_amount=$dr_query['total'];

                            $balance=$opening_balance+$credit_amount-$debit_amount;
                            echo $balance;

                            ?>    </b> </h2>

                    </div>
                </div>
                <?php } ?>
            </div> -->
        </div>
    </section>

<!-- <section>
<div class="container">
<div class="row">
<div class="col-md-6">
<img src="images/trip.png"  style="width:100px;"/>
</div>
<div class="col-md-6">
<img src="images/trip.png"  style="width:100px;"/>
</div>
</div>
</div>
</section> -->

<?php include_once('includes/footer.php'); ?>
<script type="text/javascript">

</script>
</body>

</html>
