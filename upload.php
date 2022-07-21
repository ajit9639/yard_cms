<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "car";
$output = '';
$rec_id = $_POST['id'];
 $conn = mysqli_connect($servername, $username, $password, $dbname);
 

$sql = "SELECT * FROM ltr_register where id=".$rec_id;
$result = mysqli_query($conn, $sql);

   while($row = mysqli_fetch_assoc($result)) {
      
      $tkm = $row['end_km'] -$row['start_km'];
          $sdatetime = $row['start_date'];
          $sdate = date('d-m-Y', strtotime($sdatetime));
          $stime = date('H:i:s', strtotime($sdatetime));
          $edatetime = $row['end_date'];
          $edate = date('d-m-Y', strtotime($edatetime));
          $etime = date('H:i:s', strtotime($edatetime));
          $sbtArray1 = explode(':',$stime);
          $shour = (strlen($sbtArray1[0]) > 1) ? $sbtArray1[0] : '0'.$sbtArray1[0];
          $smint = $sbtArray1[1];
          $smsec = $sbtArray1[2];
          $ebtArray2 = explode(':', $etime);
          $ehour = (strlen($ebtArray2[0]) > 1) ? $ebtArray2[0] : '0'.$ebtArray2[0];
          $emint = $ebtArray2[1];
          $emsec = $ebtArray2[2];
          $mint = abs($smint -$emint);
          if($mint<10)
          {$mint = '0'.$mint;}
          $hour = abs($ehour -$shour);
          $msec = $smsec +$emsec;
          $tt = $etime-$stime;
          //testing
          $date1=date_create($sdate);
          $date2=date_create($edate);
          $diff=date_diff($date1,$date2);
          $day =  $diff->format("%a");
          $hr = $day * 24 + $hour;
          $nights = round((strtotime($edatetime) - strtotime($sdatetime)) / 86400);
          //testing ended
          if($hr>12)
          { $et = $hr;
          while($et>12)
          {
              $et = $et-12;
          }
          }
          else{
              $et =0;
          }
      
        
// $output .= "<div class='row'><div class='col-sm-6'>Id: ".$row["id"]."</div><div class='col-sm-6'>Name ".$row["guest"]."</div></div><div class='row'> <div class='col-sm-6'>Gender: ".$row["journey_type"]."</div></div><div class='row'><div class='col-sm-6'>Designation: ".$row["total_km"]."</div><div class='col-sm-6'>age: ".$row["total_km"]."</div></div><div class='row'><div class='col-sm-12'></div></div>";
$output .= 
"<table class='table table-bordered display-tables'>"
."<tr>".
"<th>"."Journey Date"."</th>".
"<td>".$row["journey_date"]."</td>"."</tr>"
."<tr>".
"<th>"."Start Date"."</th>".
"<td>".$row["start_date"]."</td>"."</tr>"
."<tr>".
"<th>"."Start Km"."</th>".
"<td>".$row["start_km"]."</td>"."</tr>"
."<tr>".
"<th>"."End Date"."</th>".
"<td>".$row["end_date"]."</td>"."</tr>"
."<tr>".
"<th>"."End Km"."</th>".
"<td>".$row["end_km"]."</td>"."</tr>"
."<tr>".
"<th>"."Guest Name"."</th>".
"<td>".$row["guest"]."</td>"."</tr>"
."<tr>".
"<th>"."Journey Detail"."</th>".
"<td>".$row["journey_detail"]."</td>"."</r>"
."<tr>".
"<th>"."Journey Type"."</th>".
"<td>".$row["journey_type"]."</td>"."</tr>"
."<tr>".
"<th>"."Total Hours"."</th>".
"<td>".$row["total_hours"]."</td>"."</tr>"
."<tr>".
"<th>"."Total Km"."</th>".
"<td>".$row["total_km"]."</td>"."</tr>"
."<tr>".
"<th>"."Parking"."</th>".
"<td>".$row["parking"]."</td>"."</tr>"
."<tr>".
"<th>"."Nights"."</th>".
"<td>".$nights."</td>"
."<tr>".
"<th>"."Extra Hours"."</th>".
"<td>".$et."</td>".

"</tr>".

"</table>";


 }
echo $output;
 
mysqli_close($conn);
?>
<br><br><a href="user.php?uid=<?php echo $row['id'];?>"> <i class="material-icons" style="color:#fff">edit</i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="#" data-id="<?php echo $row['id'];?>" class="delete_user_button"><i class="material-icons" style="color:#fff">delete</i> </a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;