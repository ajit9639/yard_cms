
<?php
include_once('includes/header.php');
 include_once('includes/footer.php');
//include_once('includes/check_login.php');

    $id=$_GET['id'];
    $data=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM `unloading_vehicle_out_temp` where `id`='$id'"));
    $unid = $data['unloading_ref_id'];
    // echo $types = $_GET['types'];
    // exit();



if($types == 'vehicleout'){
$del = mysqli_query($conn, "DELETE FROM `unloading_vehicle_out_temp` WHERE `id`='$id'");
if($del){
    echo "<script>alert('Data Deleted Successfully');
    window.location='unloading_kata_entry.php?id=$unid';
    </script>";
}
}else{
$del = mysqli_query($conn, "DELETE FROM `unloading_vehicle_out_temp` WHERE `id`='$id'");
if($del){
    echo "<script>alert('Data Deleted Successfully');
     window.location='unloading_kata_entry.php?id=$unid';
    </script>";
}
}

?>