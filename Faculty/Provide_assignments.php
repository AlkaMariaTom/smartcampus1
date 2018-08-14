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
 obj.open("GET","getSubjectofTeacher.php?sem="+sem,true);
 obj.send();
 obj.onreadystatechange=function()
  {
   if(obj.readyState==4&&obj.status==200)
   {
   document.getElementById("sub").innerHTML=obj.responseText;
   }
  }
 }
</script>
</head>

<body>
<h1>Provide Assignments</h1>
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
<select name="sem" required  onchange="getSubject(this.value)">
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
 <td>Subject</td>
 <td><select id="sub" name="sub" required>
 <option value="">Select</option>
 </select></td>
</tr>
<tr>
<td>Topic</td>
<td><input type="text" name="txttopic" required />
</tr>
<tr>
<td>Details</td>
<td><textarea name="txtdes" required ></textarea>
</tr>
<tr>
<td>DeadLine</td>
 <td><input type="date" name="txtdl" min="<?php $d=date("Y-m-d");$d1=strtotime($d);$t=strtotime("+1 days",$d1);echo date("Y-m-d",$t);?>" required /></td>
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
 $q="insert into assignment values(0,'".$_POST['sub']."','".$_POST['txttopic']."','".$_POST['txtdes']."','".date("Y-m-d H:i:s")."','".$_POST['batch']."','".$_POST['txtdl']."')";
 if(setData($q))
 {
 echo "Submitted";
 }
 }
?>
