<?php
include "config.php";

$sql = "SELECT * FROM `loading_rake_opening` where id=".$rec_id;
$result = mysqli_query($conn, $sql);

while($row = mysqli_fetch_assoc($result)) {
 
// $output .= "<div class='row'><div class='col-sm-6'>Id: ".$row["id"]."</div><div class='col-sm-6'>Name ".$row["guest"]."</div></div><div class='row'> <div class='col-sm-6'>Gender: ".$row["journey_type"]."</div></div><div class='row'><div class='col-sm-6'>Designation: ".$row["total_km"]."</div><div class='col-sm-6'>age: ".$row["total_km"]."</div></div><div class='row'><div class='col-sm-12'></div></div>";
$output .= 
"<table class='table table-bordered display-tables'>"
."<tr>".
"<th>"."Order No"."</th>".
"<td>".$row["Order_no"]."</td>"."</tr>"
."<tr>"
.
"<th>"."Opening_date"."</th>".
"<td>".$row["Opening_date"]."</td>"."</tr>"
."<tr>"
.
"<th>"."Material"."</th>".
"<td>".$row["Material"]."</td>"."</tr>"
."<tr>"
.
"<th>"."Company"."</th>".
"<td>".$row["Company"]."</td>"."</tr>"
."<tr>"
.
"<th>"."Transporter "."</th>".
"<td>".$row["Transporter"]."</td>"."</tr>"
."<tr>"
."</table>";





 }
echo $output;
 
mysqli_close($conn);
?>
<!-- <br><br><a href="user.php?uid=<?php echo $row['id'];?>"> <i class="material-icons" style="color:#fff">edit</i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="#" data-id="<?php echo $row['id'];?>" class="delete_user_button"><i class="material-icons" style="color:#fff">delete</i> </a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; -->