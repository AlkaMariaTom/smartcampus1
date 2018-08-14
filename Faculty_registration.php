<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
<form method="post" enctype="multipart/form-data">
<table width="200">
  <tr>
    <td>Name</td>
    <td><input name="txtname" type="text" required  /></td>
  </tr>
  <tr>
    <td>Gender</td>
    <td><input type="radio" value="Male" required name="gender" />Male<input type="radio" value="Female" required name="gender"/>Female</td>
  </tr>
  <tr>
    <td>Age</td>
    <td><input name="txtage" type="text" required/></td>
  </tr>
  <tr>
    <td>Address</td>
    <td><textarea name="txtaddr" required></textarea></td>
  </tr>
  <tr>
    <td>Qualification</td>
    <td><input type="text" name="txtqual" required /></td>
  </tr>
  <tr>
    <td>Experience(Year)</td>
    <td>
	<select name="exp" required>
	<option value="">Select</option>
	<option>Fresher</option>
	<?php
	for($i=1;$i<=10;$i++)
	{
	?>
	<option><?php echo $i;?></option>
	<?php
	}
	?>
	<option>More</option>
	</select>
	</td>
  </tr>
  <tr>
    <td>College</td>
    <td><input name="txtcollege" type="text" required/></td>
  </tr>
  <tr>
    <td>Email</td>
    <td><input name="txtemail" type="email" required/></td>
  </tr>
  <tr>
    <td>Mobile Number</td>
    <td><input name="txtmob" type="text" required/></td>
  </tr>
  <tr>
    <td>Photo</td>
    <td><input name="txtfile" type="file" required/></td>
  </tr>
  <tr>
    <td>Username</td>
    <td><input name="txtuname" type="text" required/></td>
  </tr>
  <tr>
    <td>Password</td>
    <td><input name="txtpswd" type="password" required  onchange="txtvpswd.pattern=this.value"/></td>
  </tr>
  <tr>
    <td>Verify Password</td>
    <td><input name="txtvpswd" id="txtvpswd" type="password" required/></td>
  </tr>
  <tr>
    
    <td><input name="btn" type="submit" value="Submit" /></td>
  </tr>
</table>

</form>
</body>
</html>
<?php
 if(isset($_POST['btn']))
 {
 include("DB_connection.php");

 /*********** check file name ***********/

 $name=$_FILES['txtfile']['name'];
 $dir='Faculty Photos/';
 $updated_name=checkFileName($name,$dir);

 /************* end ********************/
 
 $source_path=$_FILES['txtfile']['tmp_name'];
 $destination_path="Faculty Photos/".$updated_name;

 $q="insert into faculty_tb values(0,'".$_POST['txtname']."','".$_POST['gender']."','".$_POST['txtage']."','".$_POST['txtaddr']."','".$_POST['txtqual']."','".$_POST['exp']."','".$_POST['txtcollege']."','".$_POST['txtemail']."','".$_POST['txtmob']."','$updated_name','".$_POST['txtuname']."','".$_POST['txtpswd']."')";
 if(setData($q))
 {

 move_uploaded_file($source_path,$destination_path);
 echo "inserted";
 }
 
 }
?>
