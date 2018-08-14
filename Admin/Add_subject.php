<?php
include("../Lock.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<script type="text/javascript">
 function getCheck(subj,sem)
 {
 if(window.XMLHttpRequest)
 {
 obj=new XMLHttpRequest();
 }
 else
 {
 obj=new ActiveXobject("microsoft.XMLHTTP");
 }
 obj.open("GET","../getCheck.php?sem="+sem+"&subject="+subj,true);
 obj.send();
 obj.onreadystatechange=function()
  {
   if(obj.readyState==4&&obj.status==200)
   {
   if(obj.responseText=="yes")
   {
   document.getElementById("err").innerHTML="<font color='red'><b><i>ALready Inserted</i></u></font>";
    document.getElementById("txtsub").value="";
	}
	else
	{
	 document.getElementById("err").innerHTML="";
	}
   }
  }
 }
</script>
</head>

<body>
<h1>Add Subject</h1>
<form method="post">
<table>
<tr>
<td>Semester</td>
<td>
<select name="sem" id="sem" required>
<option value="">select</option>
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
	</select>

</td>
</tr>
<tr>
<td>Faculty</td>
<td>
<select name="faclty" required>
<option value="">select</option>
<?php
$q="select * from faculty_tb";
$data=getData($q);

	foreach($data as $a)
	{
	?>
	<option value="<?php echo $a["fid"];?>"><?php echo $a["name"];?></option>
	<?php
	}
	?>
	</select>

</td>
</tr>
<tr>
<td>Subject</td>
<td><input type="text" name="txtsub" id="txtsub" required onchange="getCheck(this.value,sem.value)" /></td><td id="err"></td>
</tr>
<tr>

<td><input type="submit" name="btn" required /></td>
</tr>
</table>
</form>
</body>
</html>
<?php
 if(isset($_POST['btn']))
 {
 $q="insert into subject_tb values(0,'".$_POST['sem']."','".$_POST['faclty']."','".$_POST['txtsub']."')";
 if(setData($q))
 {
 echo "Inserted";
 }
 }
?>
