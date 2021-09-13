<?php

include "../connection.php";

$id=$_GET['desid'];

 $s="DELETE FROM employee_types WHERE et_id='$id'";

 $res=mysqli_query($con,$s);

echo "<script>alert('Successfully Deleted!!!'); window.location.href = '../index.php?tab=manage_job'; </script>";     



?>