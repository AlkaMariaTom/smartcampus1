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
<h1>Club Activities</h1>
<form method="post">
<table>
<tr>
<td>Club</td>
<td>
<select name="club" required>
<option value="">select</option>
<?php
include("../DB_connection.php");
$q="select * from club_tb";
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
<td>Date of Activity</td>
<td><input type="datetime-local" name="txtd" required  /></td> 
</tr>
<tr>
<td>Venue</td>
<td><textarea name="txtv" required ></textarea></td> 
</tr>
<tr>
<td>Activities</td>
<td><textarea name="txta" required ></textarea></td> 
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
 $q="insert into club_activity values(0,'".$_POST['club']."','".$_POST['txtd']."','".$_POST['txtv']."','".$_POST['txta']."','".date("Y-m-d")."','".$_SESSION['user']."')";
 if(setData($q))
 {
  echo "Submitted";
 }
 }
?>