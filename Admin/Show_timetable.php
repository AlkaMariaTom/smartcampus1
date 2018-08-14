<?php
include("../Lock.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
	<title>Table V03</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../Table_template/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../Table_template/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../Table_template/vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../Table_template/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../Table_template/vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../Table_template/css/util.css">
	<link rel="stylesheet" type="text/css" href="../Table_template/css/main.css">
<!--===============================================================================================-->
<style type="text/css">
.mybutton
{
padding:10px;
}
select
{
padding:10px;
}
</style>
</head>

<body>
<div class="limiter">
<div class="container">
<h1>Time Table</h1>
<form method="post" style="position:absolute;">
<table style="margin-top:20px; position:absolute;">
<tr>
<td style="padding:10px">
Semester </td><td style="padding:10px"><select name="sems" required>
<?php
include("../DB_connection.php");
$q="select * from semester_tb";
$data=getData($q);

	foreach($data as $a)
	{
	?>
	<option value="<?php echo $a[0];?>"><?php echo $a[1];?></option>
	<?php
	}
	?>
 </select></td><td style="padding:10px">
 <input type="submit" name="btn" value="View" class="mybutton"/></td>
 </tr>
 </table>
</form>
<?php
if(isset($_POST['btn']))
{

 $q="select * from time_table where time_table.semester='".$_POST['sems']."' order by field(day,'Monday','Tuesday','Wednesday','Thursday','Friday')";
 $data=getData($q);
 if(count($data)>0)
 {
  
?>
<div class="wrap-table100" style="position:absolute; margin-top:110px; ">
				<div class="table100 ver1 m-b-110">
					<table data-vertable="ver1" style="background-color:#CCCCCC">
						<thead>
 <tr class="row100 head">
								<th class="column100 column1" data-column="column1">Day</th>
								<th class="column100 column2" data-column="column2">Period 1</th>
								<th class="column100 column3" data-column="column3">Period 2</th>
								<th class="column100 column4" data-column="column4">Period 3</th>
								<th class="column100 column5" data-column="column5">Period 4</th>
								<th class="column100 column6" data-column="column6">Period 5</th>
								<th class="column100 column7" data-column="column7">Period 6</th>
							
 </tr>
 </thead>
 <tbody>
 <?php
 foreach($data as $v)
 {
 
 ?>
 <tr class="row100">
 <td class="column100 column1" data-column="column1"><?php echo $v['day'];?></td>
 <td class="column100 column2" data-column="column2"><?php
 $q1="select subject from subject_tb where sid='".$v['period1']."'";
 $data1=getData($q1);
 foreach($data1 as $a1)
 {
  echo $a1['subject'];
 }
 ?></td>
<td class="column100 column3" data-column="column3"><?php
 $q1="select subject from subject_tb where sid='".$v['period2']."'";
 $data1=getData($q1);
 foreach($data1 as $a1)
 {
  echo $a1['subject'];
 }
 ?></td>
	<td class="column100 column4" data-column="column4"><?php
 $q1="select subject from subject_tb where sid='".$v['period3']."'";
 $data1=getData($q1);
 foreach($data1 as $a1)
 {
  echo $a1['subject'];
 }
 ?></td>
	<td class="column100 column5" data-column="column5"><?php
 $q1="select subject from subject_tb where sid='".$v['period4']."'";
 $data1=getData($q1);
 foreach($data1 as $a1)
 {
  echo $a1['subject'];
 }
 ?></td>
	<td class="column100 column6" data-column="column6"><?php
 $q1="select subject from subject_tb where sid='".$v['period5']."'";
 $data1=getData($q1);
 foreach($data1 as $a1)
 {
  echo $a1['subject'];
 }
 ?></td>
	<td class="column100 column7" data-column="column7"><?php
 $q1="select subject from subject_tb where sid='".$v['period6']."'";
 $data1=getData($q1);
 foreach($data1 as $a1)
 {
  echo $a1['subject'];
 }
 ?></td>
 </tr>
 <?php
 }
 ?>
 </tbody>
</table>
<!--===============================================================================================-->	
	<script src="../Table_template/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="../Table_template/vendor/bootstrap/js/popper.js"></script>
	<script src="../Table_template/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="../Table_template/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="../Table_template/js/main.js"></script>
 <?php
 }
 else
 {
 echo "<br><br><br><br>sorry ! not fount.<a href='Add_time_table.php'>Add Time Table</a>";
 }
}
?>
	</div>
	</div>
</body>
</html>
