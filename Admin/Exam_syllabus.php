<?php
include("../Lock.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
<h1>Exam Syllabus</h1>
<form method="post" enctype="multipart/form-data">
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
<select name="sem" required>
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
<td>Syllabus</td>
<td><input type="file" name="txtfile" required accept="application/pdf" /></td>
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


 /*********** check file name ***********/

 $name=$_FILES['txtfile']['name'];
 $dir='../Exam Syllabus/';
 $updated_name=checkFileName($name,$dir);

 /************* end ********************/

 $source_path=$_FILES['txtfile']['tmp_name'];
 $destination_path=$dir.$updated_name;
  $fullpath="Exam Syllabus/".$updated_name;

 $q="insert into exam_timetable values(0,'".$_POST['batch']."','".$_POST['sem']."','$fullpath')";
 if(setData($q))
 {
 move_uploaded_file($source_path,$destination_path);
 echo "inserted";
 }
 }
?>
