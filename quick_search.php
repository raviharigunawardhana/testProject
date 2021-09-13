<?php
require_once("../connection.php");
require_once("../../check.php");
if(!empty($_POST["keyword"])) {


$query ="SELECT nic,emp_name FROM employee WHERE nic NOT IN (select nic from emp_level) and emp_name like '%" . $_POST["keyword"] . "%' ORDER BY emp_name LIMIT 0,6";

$result = mysqli_query($con, $query);
if(!empty($result)) {
?>
<ul id="country-list">

<?php
foreach($result as $country) {
?>
<li onClick="selectCountry('<?php echo $country["emp_name"]; ?>');"><?php echo $country["emp_name"]; ?>:<?php echo $country["nic"]; ?></li>
<?php } ?>
</ul>
<?php } } ?>