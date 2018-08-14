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
<h1>Add Event</h1>
<form method="post" enctype="multipart/form-data">
<table>
<tr>
<td>Title</td>
<td>
<input type="text" name="txtt" required />
</td>
</tr>
<tr>
<td>Details</td>
<td>
<textarea name="txtd" required></textarea></td>
</tr>
<tr>
<td>Image</td>
<td><input type="file" name="txtfile" required /></td>
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
 include("../DB_connection.php");
 
 /*********** check file name ***********/
 
 $name=$_FILES['txtfile']['name'];
 $dir="../Event/";
 $updated_name=checkFileName($name,$dir);

 /************* end ********************/
 
 $source_path=$_FILES['txtfile']['tmp_name'];
 $destination_path=$dir.$updated_name;
 $fullpath="Event/".$updated_name;
 $q="insert into event_tb values(0,'".$_POST['txtt']."','".$_POST['txtd']."','$fullpath')";
 if(setData($q))
 {
 move_uploaded_file($source_path,$destination_path);
 echo "inserted";
 }
 
 }
 
?>
