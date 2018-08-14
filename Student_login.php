<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
<h1>student Login</h1>
<form method="post">
<table>
 <tr>
 <td>Username</td>
 <td><input type="text" name="txtuname" requied />
 </tr>
 <tr>
 <td>Password</td>
 <td><input type="password" name="txtpswd" requied />
 </tr>
 <tr>
 <td><input type="submit" name="btn" value="Login"  />
 </tr>

</table>
</form>
</body>
</html>
<?php
 include("DB_connection.php");
 if(isset($_POST['btn']))
 {
 $q="select * from student_signup where reg='".$_POST['txtuname']."' and pass='".$_POST['txtpswd']."'";
 $data=getData($q);
 if(count($data)>0)
 {
 session_start();
 foreach($data as $v)
 {
 $_SESSION['user']=$v[0];
 header("location:Student/Home.php");
 }
 }
 else
 {
 ?>
 <script>
 alert("Invalid Username or Password");
 </script>
 <?php
 }
 }
?>
