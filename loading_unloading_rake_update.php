
<?php 
include_once('includes/db.php');

$id= $_GET['id'];
$type = $_GET['type'];

if($type == 'loading'){
    $ld = mysqli_query($conn, "UPDATE `loading_rake_opening` SET `status`='close' where id='$id'");
    if($ld){
        echo "<script>alert('Loading Rake Opened')
        window.location='loading_rake_opening.php';
        </script>";
    }else{
        echo "<script>alert('un-success')</script>";
    }
}else{
    $un = mysqli_query($conn, "UPDATE `unloading_rake_opening` SET `rake_status`='close' where id='$id'");
    if($un){
        echo "<script>alert('Unloading Rake Opened');
        window.location='rake.php';
        </script>";
        
    }else{
        echo "<script>alert('un-success')</script>";
    }
}
?>