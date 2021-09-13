<?php 
include("../connection.php");
  $get_id=$_POST['et_id'];
  $query4 = "DELETE * FROM employee_types WHERE et_id='$get_id'  ";

  $result2 =  mysqli_query($con, $query4);
          
          if (!($result2))
            {
            echo("Error: " . mysqli_error($con));
            }  
  
          else
            {
            //echo("Branch creation was Successful");
         echo "<script>alert('DELETED!!!'); window.location.href = 'index.php?tab=manage_job'; </script>";     
            }
            
  mysqli_close($con);

?>
