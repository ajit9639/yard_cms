<?php
include_once('includes/db.php');
include_once('includes/check_login.php');

if(isset($_POST['did']))
{
    $did=$_POST['did'];
    $table=$_POST['table'];
    $table_array=explode(",",$table);
    $page=$_POST['page'];
        foreach ($table_array as $tname)
        {
            $column_name=explode(":",$tname);
            $tname=$column_name[0];
            $cname=$column_name[1];
            $qd="delete from `".$tname."` where `".$cname."` ='".$did."'";

            mysqli_query($conn,$qd);
        }

        echo '1';
}


?>

