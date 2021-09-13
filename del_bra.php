<?php

include "../connection.php";

$branch_id=$_GET['branch_id'];

 $s="DELETE FROM branch WHERE branch_id='$branch_id'";

 $res=mysqli_query($con,$s);

echo "<script>alert('Successfully Deleted!!!'); window.location.href = '../index.php?tab=manage_branch'; </script>";     



?>