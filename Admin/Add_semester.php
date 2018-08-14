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
<h1>Add Semester</h1>
<form method="post">
<table>
<tr>
 <td>Semester</td>
 <td><input type="text" name="txtsem" required /></td>
</tr>
<tr>
 <td><input type="submit" name="btn" />
</tr>
</table>
</form>
</body>
</html>
<?php
 include("../DB_connection.php");
 if(isset($_POST['btn']))
 {
  $q="insert into semester_tb values(0,'".$_POST['txtsem']."')";
  if(setData($q))
  {
  echo "Inserted";
  }
 }
?>
