<?php
include_once('includes/header.php');
include_once('includes/check_login.php');
$service = $_POST["service"];

if(isset($_POST["service"]))
{
if($service=='ltr')
{
$query="SELECT * FROM ltr_register ";
$sql=mysqli_query($conn,$query);
$result .='
<table class="table table-bordered table-striped table-hover ">
<tr>
<th>Journey Date</th>
<th>Start Date</th>
<th>Start KM</th>
<th>End Date</th>
<th>End KM</th>
<th>Guest</th>
<th>Journey Detail</th>
<th>Journey Type</th>
<th>Total Hour</th>
<th>Total KM</th>
<th>Parking</th>
</tr>';
if(mysqli_num_rows($sql)>0)
{
    while($row=mysqli_fetch_array($sql))
    {
        $result .='
        <tr>
     
        <td>'.$row['journey_date'].'</td>
        <td>'.$row['start_date'].'</td>
        <td>'.$row['start_km'].'</td>
        
        <td>'.$row['end_date'].'</td>
        <td>'.$row['end_km'].'</td>
        <td>'.$row['guest'].'</td>
        <td>'.$row['journey_detail'].'</td>
        <td>'.$row['journey_type'].'</td>
        <td>'.$row['total_hours'].'</td>
        <td>'.$row['total_km'].'</td>
        <td>'.$row['parking'].'</td>
        </tr>';
    }
}
$result .='</table>';
echo $result;
}}
if(isset($_POST["service"]))
{
if($service=='expense')
{
$query="SELECT * FROM expense_tbl ";
$sql=mysqli_query($conn,$query);
$result .='
<table class="table table-bordered table-striped table-hover ">
<tr>
<th>Driver Name</th>
<th>Trip Name</th>
<th>Advance Amount</th>
<th>Night Stay</th>
<th>Fuel Expense</th>
<th>Parking Expense</th>
<th>Misc. Expense</th>
<th>Date</th>
<th>Remarks</th>
</tr>';
if(mysqli_num_rows($sql)>0)
{
    @$i = 1;
    while($row=mysqli_fetch_array($sql))
    {
        $result .='
        <tr>
     
        <td>'.$row['Driver_Name'].'</td>
        <td>'.$row['Trip_Name'].'</td>
        <td>'.$row['Advance_Amount'].'</td>
        <td>'.$row['Night_stay'].'</td>
        <td>'.$row['Fuel_Expense'].'</td>
        <td>'.$row['Parking_Expense'].'</td>
        <td>'.$row['Misc_Expense'].'</td>
        <td>'.$row['Date'].'</td>
        <td>'.$row['Remarks'].'</td>
        </tr>';
    }
}
$result .='</table>';
echo $result;
}}
if(isset($_POST["service"]))
{
if($service=='booking')
{
$query="SELECT * FROM txn_logs ";
$sql=mysqli_query($conn,$query);
$result .='
<table class="table table-bordered table-striped table-hover ">
<tr>
<th>Service Type</th>
<th>Core ID</th>
<th>Bin No</th>
<th>Guest Name</th>
<th>Segment</th>
<th>Cab No</th>
<th>Driver Name</th>
<th>Driver Number</th>
<th>Total Payout</th>
</tr>';
if(mysqli_num_rows($sql)>0)
{
    @$i = 1;
    while($row=mysqli_fetch_array($sql))
    {
        $result .='
        <tr>
     
        <td>'.$row['service_type'].'</td>
        <td>'.$row['core_id'].'</td>
        <td>'.$row['bin_no'].'</td>
        <td>'.$row['guest_name'].'</td>
        <td>'.$row['segment'].'</td>
        <td>'.$row['cab_no'].'</td>
        <td>'.$row['driver_name'].'</td>
        <td>'.$row['driver_number'].'</td>
        <td>'.$row['total_payout'].'</td>
        </tr>';
    }
}
$result .='</table>';
echo $result;
}

}
?>
