<?php include_once('includes/header.php');
include_once('includes/check_login.php');
?>

<body class="theme-red">
    <!-- Page Loader -->
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
    </div>
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
                    Transaction Report
                </h2>
            </div>

            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">

                        <div class="body">
                            <form method="post" action="#" autocomplete="off">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <select class="form-control" name="party" id="party">
                                            <option value="">Select Party</option>
                                            <?php $sd=mysqli_query($conn,"select * from party_master where 1=1");
                                            while($rf=mysqli_fetch_assoc($sd))
                                            { ?>
                                                <option value="<?php echo $rf['id'] ?>" <?php if(isset($_POST['party']) && ($_POST['party'] == $rf['id'])) { echo 'selected="selected"'; } ?>><?php echo $rf['name']; ?></option>
                                            <?php } ?>
                                        </select>
<!--                                                                                <label class="form-label">Party</label>-->
                                    </div>
                                </div>

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <select class="form-control" name="account" id="account">

                                            <?php $sd=mysqli_query($conn,"select * from account_master where 1=1");
                                            while($rf=mysqli_fetch_assoc($sd))
                                            { ?>
                                                <option value="<?php echo $rf['id'] ?>" <?php if(isset($_POST['account']) && ($_POST['account'] == $rf['id'])) { echo 'selected="selected"'; } ?>><?php echo $rf['name']; ?></option>
                                            <?php } ?>
                                        </select>
<!--                                        <label class="form-label">Party</label>-->
                                    </div>
                                </div>


                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" autocomplete="off" id="from_date" name="from_date" class="form-control datepicker" value="<?php if(isset($_POST['from_date'])) { echo $_POST['from_date']; } else { echo date('d/m/Y'); } ?>">
                                        <label class="form-label">From Date</label>
                                    </div>
                                </div>

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" autocomplete="off" id="to_date" name="to_date" class="form-control datepicker" value="<?php if(isset($_POST['to_date'])) { echo $_POST['to_date']; } else { echo date('d/m/Y'); } ?>">
                                        <label class="form-label">To Date</label>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary" value="Submit">Submit</button>
                                <a href="transaction_report.php" type="button" class="btn btn-warning" value="Reset">Reset</a>

                            </form>
                            <?php
                            if(isset($_POST['party']))
                            {
                                $party=$_POST['party'];
                                $account=$_POST['account'];
                                $from_date=$_POST['from_date'];
                                $frd=str_replace("/",'-',$from_date);
                                $from_date=date('Y-m-d',strtotime($frd));
                                $from_date=$from_date.' 00:00:00';
                                $to_date=$_POST['to_date'];
                                $trd=str_replace("/",'-',$to_date);
                                $to_date=date('Y-m-d',strtotime($trd));
                                $to_date=$to_date.' 23:59:59';

                                if($account == '')
                                {
                                    echo '<script>alert("Account must be selected"); window.location="transaction_report.php"</script>';
                                }
                            if($party != '')
                            {
                                $party_name=mysqli_fetch_assoc(mysqli_query($conn,"select * from party_master where `id`='$party'"));
                                echo '<br/><p>Party : '.$party_name["name"].'</p>';
                            }
                            if($account != '')
                            {
                                $account_name=mysqli_fetch_assoc(mysqli_query($conn,"select * from account_master where `id`='$account'"));
                                echo '<br/><p>Account : '.$account_name["name"].'</p>';
                            }
                                ?>
                            <div class="clearfix"><br/></div>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <?php if($party == '') { ?>
                                            <th>Party</th>
                                        <?php } ?>
                                            <th>Date & Time</th>
                                            <th>Remarks</th>
                                            <th>Credit</th>
                                            <th>Debit</th>
                                            <th>Balance</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                    <?php



$where='';
$where2='1=1';
$party_opening=0;
$account_opening=0;
if($party != '')
{
    $where .=" And party_id='$party'";
    $where2 .=" And party_id='$party'";
    $party_opening=$party_name['opening_balance'];
}
    if($account != '')
    {
        $where .=" And `account_id`='$account'";
        $where2 .=" And `account_id`='$account'";
        $account_opening=$account_name['opening_balance'];
    }

    if($from_date != '')
    {
        $where .=" And datetime between '$from_date' and '$to_date'";
        $where2 .=" And datetime <'$from_date'";
    }


                                    $cr_query=mysqli_fetch_assoc(mysqli_query($conn,"select sum(amt) as total from txn_logs where $where2 and `txn_type`='IN'"));
                                    $credit_amount=$cr_query['total'];

                                    $dr_query=mysqli_fetch_assoc(mysqli_query($conn,"select sum(amt) as total from txn_logs where $where2 and `txn_type`='OUT'"));
                                    $debit_amount=$dr_query['total'];
    $opening_balance=$account_opening+$party_opening+$credit_amount-$debit_amount;

$total_credit=0;
$total_debit=0;

                                    $sql=mysqli_query($conn,"select `txn_logs`.*,`party_master`.`name` as pname,`account_master`.`name` as account from `txn_logs` LEFT JOIN `account_master` on `account_master`.`id`=`txn_logs`.`account_id` LEFT JOIN `party_master` on `party_master`.`id`=`txn_logs`.`party_id` where 1=1  $where order by `txn_logs`.`id` desc ");
                                    $total_balance=0;
                                ?>
                                    <tr>
                                        <?php if($party == '') { ?>
                                            <th colspan="5">Opening Balance</th>
                                        <?php } else { ?>
                                            <th colspan="4">Opening Balance</th>
                                        <?php } ?>

                                        <th>
                                            <?php
                                            $total_balance=$total_balance+$opening_balance;
                                                echo $opening_balance;
                                            ?>
                                        </th>
                                    </tr>
                                    <?php
                                while($row=mysqli_fetch_assoc($sql))
                                    {
                                    ?>
                                        <tr>
                                            <?php if($party == '') { ?>
                                            <td><?php echo $row['pname']; ?></td>
                                            <?php } ?>
                                            <td><?php echo date('d/m/Y h:i:s a',strtotime($row['datetime'])); ?></td>
                                            <td><?php echo $row['remarks']; ?></td>
                                            <td><?php if($row['txn_type'] == 'IN') { $total_credit=$total_credit+$row['amt'];$total_balance=$total_balance+$row['amt']; echo $row['amt']; } ?></td>
                                            <td><?php if($row['txn_type'] == 'OUT') { $total_debit=$total_debit+$row['amt'];$total_balance=$total_balance-$row['amt']; echo $row['amt']; } ?></td>
                                            <td><?php echo $total_balance; ?></td>
                                        </tr>

                                    <?php } ?>
<tr>
    <?php if($party == '') { ?>
    <th colspan="3">Total</th>
    <?php } else { ?>
     <th colspan="2">Total</th>
    <?php } ?>
    <th><b><?php echo $total_credit; ?></b></th>
    <th><b><?php echo $total_debit; ?></b></th>
    <th><b><?php echo $total_balance; ?></b></th>

</tr>
                                    </tbody>
                                </table>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Exportable Table -->
        </div>
    </section>

  <?php include_once('includes/footer.php'); ?>
</body>

</html>
