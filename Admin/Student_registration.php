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
<form method="post">
<h1>Student Registration</h1>
<table>
<tr>
<th>Registration Number</th>
<td><input type="text" name="txtno" required value="<?php echo "REG".mt_rand(000,999);?>" /></td>
</tr>
<tr>
<td><input type="submit" name="btn" value="Submit" /></td>
</tr>
</table>
</form>
</body>
</html>
<?php
if(isset($_POST['btn']))
{
 include("../DB_connection.php");
 $q="select max(id) from student_signup";
 $data=getData($q);
 foreach($data as $r)
 {
 $max=$r[0];
 }
 $pswd=$max.mt_rand(0000,9999);
 $q="insert into student_signup (reg,pass) values('".$_POST['txtno']."','$pswd')";
 if(setData($q))
 {
  echo "Registered Successfully";
 }
}
?>