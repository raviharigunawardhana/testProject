<!DOCTYPE html>



<html>







<?php 



include("../connection.php");



















?>







<?php







if ($_SERVER['REQUEST_METHOD'] == 'POST') {



  $t_type = $_POST['t_type'];
 
  $level=$_POST['lev'];



  



 



   







 



$query="insert into employee_types(t_type,t_value,Level_t)values('$t_type','$t_type','$level')";











$result1 =  mysqli_query($con, $query);



          



          if (!($result1))



            {



            echo("Error: " . mysqli_error($con));



            }  



  



          else



            {



            //echo("Branch creation was Successful");



         echo "<script>alert('New designation Added!!!'); window.location.href = 'index.php?tab=manage_job'; </script>";     



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



              <center><h3 class="card-title" style="color:darkblue;">Manage Designation</h3></center>



              <div class="card-body">



			  



                <form class="form-horizontal" id="contact-form" method="post" action="" data-toggle="validator" novalidate="novalidate">



                  



				 



				  <div class="form-group">



                    <label class="control-label col-md-3">Designation :</label>



                    <div class="col-md-8">



                      <input class="form-control" type="text" placeholder="Enter designation name" required  name="t_type" id="t_type" data-minlength="4" data-error="must enter minimum of 4 characters">



					  <div class="help-block with-errors"></div>



                    </div>



                  </div>
                  <div class="form-group">



                    <label class="control-label col-md-3">Management Level :</label>



                    <div class="col-md-8">



                      <select name="lev" class="form-control" required="">
                        <option value="1">Mr.Manuja Somarathna</option>
                        <option value="2">Mr.Sajith perera</option>
                        <option value="3">Mrs.Buddhini Priyanga</option>
                      </select>



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



  <th>Type</th>





 



</tr>



    <?php 



    



    



        $sql2 = "SELECT t_type,et_id FROM employee_types";



            $result2 = mysqli_query($db,$sql2);



            while ($res = mysqli_fetch_assoc($result2)) {



           $t_type = $res['t_type'];



          $id=$res['et_id'];



           ?>



            <tr>



          <td><?php echo $res['t_type']; ?></td>



          <td>



            <?php



            echo "<td><a href='add_new/del_des.php?&&desid=$id'><i class='fa fa-trash name'name'addBack></i> Delete<span class='text-muted'></span> <br></a></td>";







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