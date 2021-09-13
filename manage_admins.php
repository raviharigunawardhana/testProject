<!DOCTYPE html>
<html lang="en">
  <head>
  
<!-- quick search things-->
<style>
.frmSearch {border: 1px solid #eaedeb;background-color: #fdfefe  ;margin: 2px 0px;padding:40px;border-radius:12px;}
#country-list{float: left;list-style:none;margin-top:5px; margin-left:0%;padding:0;width:190px;position: absolute; border-radius:12px;}
#country-list li{padding: 10px; background: #f0f0f0; border-bottom: #bbb9b9 1px solid;}
#country-list li:hover{background:#ece3d2;cursor: pointer;}
#search-box{padding: 10px;border: #eaedeb 1px solid;border-radius:12px;}
</style>

<script src="qualification_employee/jquery-2.1.4.js" type="text/javascript"></script>

<script>
$(document).ready(function(){
    $("#search-box").keyup(function(){
        $.ajax({
        type: "POST",
        url: "qualification_employee/quick_search.php",
        data:'keyword='+$(this).val(),
        beforeSend: function(){
            $("#search-box").css("background","#FFF url(LoaderIcon.gif) no-repeat 165px");
        },
        success: function(data){
            $("#suggesstion-box").show();
            $("#suggesstion-box").html(data);
            $("#search-box").css("background","#FFF");
        }
        });
    });
});

function selectCountry(val) {
$("#search-box").val(val);
$("#suggesstion-box").hide();
}
</script>
  
  </head>

  <body class="nav-md">

            <div class="clearfix"></div>


<div class="x_panel">
                  <div class="x_title">
                    <h2>Search By Employee Name <small></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                   
                    </ul>
                    <div class="clearfix"></div>
                  </div>

                  
<div class="frmSearch">

<form method="post" id="myForm8" name="myForm8">
<input type="text" id="search-box" name="search-box" required placeholder="Search By Employee Name" form="myForm8" size="60" name="nicpost" autocomplete="off" />
        <input type="submit" name="submit" class="btn btn-success" value="Search " form="myForm8"/>
        <button class="btn btn-primary" type="reset">Reset</button>
</form>

<div id="suggesstion-box" align="center"></div>
</div>

<br><br>

    <?php
    if(isset($_REQUEST['submit'])){
        $emp_name=$_POST['search-box'];

        $sql = "SELECT emp_id, emp_name, nic,mobile, emp_type,emp_status_id FROM employee e WHERE e.emp_name like '%".$emp_name."%'";

        $q=mysqli_query($con,$sql);

        echo "<table class='table table-striped table-bordered' >";//start table

//creating our table heading

        echo "<tr>";

        echo "<th>Name</th>";

        echo "<th>NIC</th>";

        echo "<th>Mobile</th>";

        echo "<th>Employee Type</th>";
        
        echo "<th>Employee Status</th>";


        echo "</tr>";


        while ($row=$q -> fetch_assoc())
        {
            extract($row);

            echo "<tr>";

            echo "<td>{$emp_name}</td>";
            echo "<td>{$nic}</td>";

            echo "<td>{$mobile}</td>";
            echo "<td>{$emp_type}</td>";
            
            echo "<td>{$emp_status_id}</td>";
            
            echo "<td>";



            $sql23 = "SELECT emp_nic FROM employee_res WHERE emp_nic='$nic' and n_state='T' ";
            $result23 = $con->query( $sql23 );
            $num_results23 = $result23->num_rows;

            if($num_results23 == 0)
            {
                echo "<a href='index.php?tab=salary_increment_pro&&nic=$nic'><i class='fa fa-star'></i>Salary Increment/ Promotions<span class='text-muted'></span><br> </a>";
                echo "<a href='index.php?tab=add_new_qualification&&nic=$nic'><i class='fa fa-star-half-full'></i>Add Qualifications<span class='text-muted'></span><br> </a>";
                echo "<a href='index.php?tab=report_selected_emp_details&&nic=$nic'><i class='fa fa-user'></i>View Employee Summary<span class='text-muted'></span><br> </a>";
                echo "<a href='index.php?tab=resign_retire_emp&&nic=$nic'><i class='fa fa-user'></i>Resign / Retire Employee<span class='text-muted'></span><br> </a>";
                echo "<a href='index.php?tab=edit_admin&&nic=$nic'><i class='fa fa-star-half-full'></i>Edit Manager<span class='text-muted'></span><br> </a>";
            }
            else
            {
                echo "Resigned or Retired Employee <br> <br>";
                echo "<a href='index.php?tab=report_selected_emp_details&&nic=$nic'><i class='fa fa-user'></i>View Employee Qualifications<span class='text-muted'></span><br> </a>";
            }


            }

            echo "</td>";


            echo "</tr>";


        echo "</table>";
    }
    ?>

                  
</div>
            <script>
                $('#myDatepicker').datetimepicker({
                    format: 'YYYY-MM-DD'

                });

                $('#myDatepicker2').datetimepicker({
                    format: 'YYYY-MM-DD'
                });

            </script>

  </body>
</html>
