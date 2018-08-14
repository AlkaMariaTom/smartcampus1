<?php
include("../Lock.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<script type="text/javascript">
 function getSubject(sem)
 {
 if(window.XMLHttpRequest)
 {
 obj=new XMLHttpRequest();
 }
 else
 {
 obj=new ActiveXobject("microsoft.XMLHTTP");
 }
 obj.open("GET","../getSubject.php?sem="+sem,true);
 obj.send();
 obj.onreadystatechange=function()
  {
   if(obj.readyState==4&&obj.status==200)
   {
   document.getElementById("pd1").innerHTML=obj.responseText;
   document.getElementById("pd2").innerHTML=obj.responseText;
   document.getElementById("pd3").innerHTML=obj.responseText;
   document.getElementById("pd4").innerHTML=obj.responseText;
   document.getElementById("pd5").innerHTML=obj.responseText;
   document.getElementById("pd6").innerHTML=obj.responseText;
   }
  }
 }
</script>
</head>

<body>


<h1>Add Time Table</h1>
<form method="post">
<table>
<tr>
<td>Batch</td>
<td>
<select name="batch" required>
<option value="">select</option>
<?php
include("../DB_connection.php");
$q="select * from batch";
$data=getData($q);

	foreach($data as $a)
	{
	?>
	<option value="<?php echo $a[0];?>"><?php echo $a[1];?></option>
	<?php
	}
	?>

	</select>

</td>
</tr>

<tr>
<td>Semester</td>
<td>
<select name="sem" required onchange="getSubject(this.value)">
<option value="">select</option>
<?php
$q="select * from semester_tb";
$data=getData($q);

	foreach($data as $a)
	{
	?>
	<option value="<?php echo $a[0];?>"><?php echo $a[1];?></option>
	<?php
	}
	?>

	</select>

</td>
</tr>
<tr>
 <td>Day</td>
 <td>
 <select name="day" required>
 <option value="">select</option>
 <option>Monday</option>
 <option>Tuesday</option>
 <option>Wednesday</option>
 <option>Thursday</option>
 <option>Friday</option>
 </select>
 </td>
</tr>
<tr>
 <td>Period 1</td>
 <td><select id="pd1" name="pd1" required>
 <option value="">Select</option>
 </select></td>
</tr>
<tr>
 <td>Period 2</td>
 <td><select id="pd2" name="pd2" required>
 <option value="">Select</option>
 </select></td>
</tr>
<tr>
 <td>Period 3</td>
 <td><select id="pd3" name="pd3" required>
 <option value="">Select</option>
 </select></td>
</tr>
<tr>
 <td>Period 4</td>
 <td><select id="pd4" name="pd4" required>
 <option value="">Select</option>
 </select></td>
</tr>
<tr>
 <td>Period 5</td>
 <td><select id="pd5" name="pd5" required>
 <option value="">Select</option>
 </select></td>
</tr>
<tr>
 <td>Period 6</td>
 <td><select id="pd6" name="pd6" required>
 <option value="">Select</option>
 </select></td>
</tr>
<tr>
 <td><input type="submit" name="btn"  /></td>
</tr>

</table>
</form>
</body>
</html>
<?php
 if(isset($_POST['btn']))
 {

 $q="insert into time_table values(0,'".$_POST['batch']."','".$_POST['sem']."','".$_POST['day']."','".$_POST['pd1']."','".$_POST['pd2']."','".$_POST['pd3']."','".$_POST['pd4']."','".$_POST['pd5']."','".$_POST['pd6']."')";
 if(setData($q))
 {
 echo "Inserted";
 }
 }
?>
