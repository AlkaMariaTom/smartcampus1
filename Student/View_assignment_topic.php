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
<?php
 include("../DB_connection.php");
 $q="select * from assignment where batch=(select batch from student_signup where id='".$_SESSION['user']."') ";
 $data=getData($q);
 if(count($data)>0)
 {
 ?>
 <table cellpadding="10">
 <tr>
 <th>Title</th>
 <th>Last date for Submission</th>
 </tr>
 <?php
 foreach($data as $v)
 {
 ?>
 <tr>
 <td><?php echo $v[2];?></td>
  <td><?php echo $v['dead'];?></td>
  <td><?php
  if($v['date']<=date("Y-m-d")&&$v['dead']>=date("Y-m-d"))
  {
  ?>
  <a href="Submit_assignment.php?id=<?php echo $v[0];?>">Submit Assignment Now</a>
  <?php
  }
  ?></td>
 </tr>
 <?php
 }
 ?>
 </table>
 <?php
 }
?>

</body>
</html>
