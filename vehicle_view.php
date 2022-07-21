<?php
include "config.php";

$sql = "SELECT * FROM `vehicle_reg` where id=".$rec_id;
$result = mysqli_query($conn, $sql);

 

while($row = mysqli_fetch_assoc($result)) {
 
// $output .= "<div class='row'><div class='col-sm-6'>Id: ".$row["id"]."</div><div class='col-sm-6'>Name ".$row["guest"]."</div></div><div class='row'> <div class='col-sm-6'>Gender: ".$row["journey_type"]."</div></div><div class='row'><div class='col-sm-6'>Designation: ".$row["total_km"]."</div><div class='col-sm-6'>age: ".$row["total_km"]."</div></div><div class='row'><div class='col-sm-12'></div></div>";
$output .= 
"<table class='table table-bordered display-tables'>"



."<tr>".
"<th>"."Vehicle_No"."</th>".
"<td>".$row["Vehicle_No"]."</td>"."</tr>"
."<tr>"
.
"<th>"."Vehicle_Type"."</th>".
"<td>".$row["Vehicle_Type"]."</td>"."</tr>"
."<tr>"
.
"<th>"."Regn_Address"."</th>".
"<td>".$row["Regn_Address"]."</td>"."</tr>"
."<tr>"
.
"<th>"."Owner_Name"."</th>".
"<td>".$row["Owner_Name"]."</td>"."</tr>"
."<tr>"
.
"<th>"."Owner_Address"."</th>".
"<td>".$row["Owner_Address"]."</td>"."</tr>"
."<tr>"
.
"<th>"."Owner_PAN"."</th>".
"<td>".$row["Owner_PAN"]."</td>"."</tr>"
."<tr>"
.
"<th>"."Mobile_No"."</th>".
"<td>".$row["Mobile_No"]."</td>"."</tr>"
."<tr>"
.
"<th>"."Mobile_No2"."</th>".
"<td>".$row["Mobile_No2"]."</td>"."</tr>"
."<tr>"
.
"<th>"."Engine_No"."</th>".
"<td>".$row["Engine_No"]."</td>"."</tr>"
."<tr>"
.
"<th>"."Chassis_No"."</th>".
"<td>".$row["Chassis_No"]."</td>"."</tr>"
."<tr>"
.
"<th>"."Year"."</th>".
"<td>".$row["Year"]."</td>"."</tr>"
."<tr>"
.
"<th>"."Capacity"."</th>".
"<td>".$row["Capacity"]."</td>"."</tr>"
."<tr>"
.
"<th>"."Permit_No"."</th>".
"<td>".$row["Permit_No"]."</td>"."</tr>"
."<tr>"
.
"<th>"."Permit_Valid_Date"."</th>".
"<td>".$row["Permit_Valid_Date"]."</td>"."</tr>"
."<tr>"
.
"<th>"."Insurance_No"."</th>".
"<td>".$row["Insurance_No"]."</td>"."</tr>"
."<tr>"
.
"<th>"."Insurance_Valid_Date"."</th>".
"<td>".$row["Insurance_Valid_Date"]."</td>"."</tr>"
."<tr>"
.
"<th>"."Insurance_Company_Name"."</th>".
"<td>".$row["Insurance_Company_Name"]."</td>"."</tr>"
."<tr>"
.
"<th>"."Pollution_No"."</th>".
"<td>".$row["Pollution_No"]."</td>"."</tr>"
."<tr>"
.
"<th>"."Pollution_Valid_Date"."</th>".
"<td>".$row["Pollution_Valid_Date"]."</td>"."</tr>"
."<tr>"
.
"<th>"."Tax_Token_No"."</th>".
"<td>".$row["Tax_Token_No"]."</td>"."</tr>"
."<tr>"
.
"<th>"."Tax_Valid_Date"."</th>".
"<td>".$row["Tax_Valid_Date"]."</td>"."</tr>"
."<tr>"
.
"<th>"."HPA"."</th>".
"<td>".$row["HPA"]."</td>"."</tr>"
."<tr>"
.
"<th>"."Fitness_Date"."</th>".
"<td>".$row["Fitness_Date"]."</td>"."</tr>"
."<tr>"
.
"<th>"."Local_Permit_Area"."</th>".
"<td>".$row["Local_Permit_Area"]."</td>"."</tr>"
."<tr>"
.
"<th>"."Local_Permit_Valid_Date"."</th>".
"<td>".$row["Local_Permit_Valid_Date"]."</td>"."</tr>"
."<tr>"
."</table>";





 }
echo $output;
 
mysqli_close($conn);
?>
<!-- <br><br><a href="user.php?uid=<?php echo $row['id'];?>"> <i class="material-icons" style="color:#fff">edit</i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="#" data-id="<?php echo $row['id'];?>" class="delete_user_button"><i class="material-icons" style="color:#fff">delete</i> </a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; -->