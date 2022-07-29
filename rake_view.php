<?php
include "config.php";

$sql = "SELECT * FROM `unloading_rake_opening` where id=".$rec_id;
$result = mysqli_query($conn, $sql);

 

while($row = mysqli_fetch_assoc($result)) {
 
// $output .= "<div class='row'><div class='col-sm-6'>Id: ".$row["id"]."</div><div class='col-sm-6'>Name ".$row["guest"]."</div></div><div class='row'> <div class='col-sm-6'>Gender: ".$row["journey_type"]."</div></div><div class='row'><div class='col-sm-6'>Designation: ".$row["total_km"]."</div><div class='col-sm-6'>age: ".$row["total_km"]."</div></div><div class='row'><div class='col-sm-12'></div></div>";
$output .= 
"<table class='table table-bordered display-tables'>"
."<tr>".
"<th>"."RR_No"."</th>".
"<td>".$row["RR_No"]."</td>"."</tr>"
."<tr>"
.
"<th>"."RR_Qty"."</th>".
"<td>".$row["RR_Qty"]."</td>"."</tr>"
."<tr>"
.
"<th>"."RR_Date"."</th>".
"<td>".$row["RR_Date"]."</td>"."</tr>"
."<tr>"
.
"<th>"."Placement_Time"."</th>".
"<td>".$row["Placement_Time"]."</td>"."</tr>"
."<tr>"
.
"<th>"."Material"."</th>".
"<td>".$row["Material"]."</td>"."</tr>"
."<tr>"
.
"<th>"."Transporter"."</th>".
"<td>".$row["Transporter"]."</td>"."</tr>"
."<tr>"
.
"<th>"."Box_Type"."</th>".
"<td>".$row["Box_Type"]."</td>"."</tr>"
."<tr>"
.
"<th>"."Billing Head"."</th>".
"<td>".$row["Billing_Head"]."</td>"."</tr>"
."<tr>"
.
"<th>"."Remarks"."</th>".
"<td>".$row["Remarks"]."</td>"."</tr>"
."<tr>"
.
"<th>"."Total_Box"."</th>".
"<td>".$row["Total_Box"]."</td>"."</tr>"
."<tr>"
."</table>";





 }
echo $output;
 
mysqli_close($conn);
?>
<!-- <br><br><a href="user.php?uid=<?php echo $row['id'];?>"> <i class="material-icons" style="color:#fff">edit</i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="#" data-id="<?php echo $row['id'];?>" class="delete_user_button"><i class="material-icons" style="color:#fff">delete</i> </a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; -->