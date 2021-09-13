<!DOCTYPE html>
<html>

<?php 
include("../connection.php");

$query3="select max(branch_id)+1 as sys from branch";

$result = mysqli_query($con, $query3);

while($rows=mysqli_fetch_array($result))
{
$systemID=$rows['sys'];
}  

?>

<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $name = $_POST['name'];
   
  $id = $_POST['branch_id'];
 
$query="insert into branch(name)values('$name')";


$result1 =  mysqli_query($con, $query);
          
          if (!($result1))
            {
            echo("Error: " . mysqli_error($con));
            }  
  
          else
            {
            //echo("Branch creation was Successful");
         echo "<script>alert('Account creation was Successful'); window.location.href = 'index.php?tab=manage_branch'; </script>";     
            }
            
  mysqli_close($con);}
?>


<head>

<script src="../js/jquery2.0.3.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.5/validator.min.js"> </script>
<style type="text/css">

        .web {

            font-family: tahoma;

            size: 12px;

            top: 10%;

            border: 1px solid #CDCDCD;

            border-radius: 10px;

            padding: 10px;

            width: 45%;

            margin: auto;

            height: 70px;

        }



        h1 {

            margin: 3px 0;

            font-size: 13px;

            text-decoration: underline;

        }



        .tLink {

            font-family: tahoma;

            size: 12px;

            padding-left: 10px;

            text-align: center;

        }



        .success {

            color: #009900;

        }



        .error {

            color: #FF0000;

        }



        .talign_right {

            text-align: right;

        }



        .username_availability_result {

            display: block;

            width: auto;

            float: left;



        }



        .input {

            float: left;

        }



        span {

            color: green;

        }



        #myForm div {

            color: black;

            font-size: 14px;

        }

.x_panel2 {

    padding: 10px 5px 10px 5px;

    width: 100%;

  }

  table {

    margin-top: 80px;

    font-family: arial, sans-serif;

    border-collapse: collapse;

    width: 100%;

}



td, th {



    text-align: left;

    padding: 8px;

}



tr:nth-child(even) {

    background-color: #dddddd;

}

table td {

  font-size: 16px;

  font-weight: 500;

  color: #808080;

}

</style>
</head> 


<div class="content-wrapper">
        
        <div class="row">
          
          <div class="col-md-10">
            <div class="card">
              <center><h3 class="card-title" style="color:darkblue;">Manage Branch</h3></center>
              <div class="card-body">
			  
                <form class="form-horizontal" id="contact-form" method="post" action="" data-toggle="validator" novalidate="novalidate">
                  
				  <div class="form-group">
                    <label class="control-label col-md-3" hidden="hidden">Branch ID :</label>
                    <div class="col-md-8">
                     <input class="form-control" type="text" name="branch_id" hidden="hidden" value='<?php echo $systemID; ?>' id="id" readonly >
                    </div>
                  </div>
				  
				  <div class="form-group">
                    <label class="control-label col-md-3">Branch Name :</label>
                    <div class="col-md-8">
                      <input class="form-control" type="text" placeholder="Enter branch name" required  name="name" id="name" data-minlength="2" data-error="must enter minimum of 2 characters">
					  <div class="help-block with-errors"></div>
                    </div>
                  </div>
				  
			 
				  
                  <div class="card-footer">
                <div class="row">
                  <div class="col-md-8 col-md-offset-3">
                  <input type="submit" value="Add" class="btn btn-primary icon-btn">
                    
					<a class="btn btn-default icon-btn" href="index.php?tab=admin_home"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                  </div>
                </div>
              </div>


              <table>

  <tr>

  <th>Branch</th>


 

</tr>

    <?php 

    

    

        $sql2 = "SELECT branch_id,name FROM branch";

            $result2 = mysqli_query($db,$sql2);

            while ($res = mysqli_fetch_assoc($result2)) {

           $name = $res['name'];

          $branch_id=$res['branch_id'];

           ?>

            <tr>

          <td><?php echo $res['name']; ?></td>

          <td>

            <?php

            echo "<td><a href='add_new/del_bra.php?&&branch_id=$branch_id'><i class='fa fa-user name'name'addBack></i> Delete<span class='text-muted'></span> <br></a></td>";



                  ?>

          </td>    



              </tr>



    <?php    }?>







        



</table>


                </form>
              </div>             
            </div>
          </div>
          <div class="clearix"></div>
     
        </div>
      </div>



</html>