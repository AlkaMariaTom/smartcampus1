<option value="">select</option>
<?php
include("../DB_connection.php");
session_start();
$q="select * from subject_tb where semester='".$_GET['sem']."' and faculty='".$_SESSION['user']."'";
$data=getData($q);
foreach($data as $v)
{
?>
<option value="<?php echo $v[0];?>"><?php echo $v['subject'];?></option>
<?php
}
?>
