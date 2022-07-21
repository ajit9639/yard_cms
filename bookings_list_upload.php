<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "car";
$output = '';
$rec_id = $_POST['id'];
 $conn = mysqli_connect($servername, $username, $password, $dbname);
 
$sql = "SELECT * FROM txn_logs where id=".$rec_id;
$result = mysqli_query($conn, $sql);

while($row = mysqli_fetch_assoc($result)) {
// $output .= "<div class='row'><div class='col-sm-6'>Id: ".$row["id"]."</div><div class='col-sm-6'>Name ".$row["guest"]."</div></div><div class='row'> <div class='col-sm-6'>Gender: ".$row["journey_type"]."</div></div><div class='row'><div class='col-sm-6'>Designation: ".$row["total_km"]."</div><div class='col-sm-6'>age: ".$row["total_km"]."</div></div><div class='row'><div class='col-sm-12'></div></div>";
$output .= 

"<table class='table table-bordered display-tables'>"
."<tr>".
"<th>"."Service Type"."</th>".
"<td>".$row["service_type"]."</td>"."</tr>"
."<tr>".
"<th>"."Core Id"."</th>".
"<td>".$row["core_id"]."</td>"."</tr>"
."<tr>".

"<th>"."Date"."</th>".
"<td>".$row["date"]."</td>"."</tr>"
."<tr>".

"<th>"."Bin No"."</th>".
"<td>".$row["bin_no"]."</td>"."</tr>"
."<tr>".

"<th>"."Guest Name"."</th>".
"<td>".$row["guest_name"]."</td>"."</tr>"
."<tr>".

"<th>"."Segment"."</th>".
"<td>".$row["segment"]."</td>"."</tr>"
."<tr>".

"<th>"."Cab No"."</th>".
"<td>".$row["cab_no"]."</td>"."</tr>"
."<tr>".

"<th>"."Driver Name"."</th>".
"<td>".$row["driver_name"]."</td>"."</tr>"
."<tr>".

"<th>"."Driver Number"."</th>".
"<td>".$row["driver_number"]."</td>"."</tr>"
."<tr>".

"<th>"."Total Payout"."</th>".
"<td>".$row["total_payout"]."</td>"."</tr>"
."<tr>".

"</table>";

"Id: ".$row["id"]."<br>"."Service Type: ".$row["service_type"];

 }
echo $output;
 
mysqli_close($conn);
?>
<br><br><a href="user.php?uid=<?php echo $row['id'];?>"> <i class="material-icons" style="color:#fff">edit</i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="#" data-id="<?php echo $row['id'];?>" class="delete_user_button"><i class="material-icons" style="color:#fff">delete</i> </a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;