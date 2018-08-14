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
   document.getElementById("sub").innerHTML=obj.responseText;
   }
  }
 }
</script>
</head>

<body>
<h1>View Notes</h1>
<form method="post" enctype="multipart/form-data">
<table>
<tr>
<td>Semester</td>
<td>
<select name="sem" required  onchange="getSubject(this.value)">
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
 <td>Subject</td>
 <td><select id="sub" name="sub" required>
 <option value="">Select</option>
 </select></td>
</tr>
<tr>
<td><input type="submit" name="btn" /></td>
</tr>
</table>
</form>
</body>
</html>
<?php
 if(isset($_POST['btn']))
 {
  $q="select * from note_tb where subject_id='".$_POST['sub']."'";
  $data=getData($q);
  if(count($data)>0)
  {
  ?>
 <ul>
  <?php
  foreach($data as $a)
  {
 ?>
 <li><a href="Download_note.php?file=<?php echo $a[3];?>"><?php echo $a[2];?></a></li>

 <?php
  }
  ?>
 </ul>
  <?php
  }
 }
?>
