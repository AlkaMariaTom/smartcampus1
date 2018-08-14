<?php
include("DB_connection.php");
$q="select * from subject_tb where semester='".$_GET['sem']."' and lower(subject)='".strtolower($_GET['subject'])."'";
$data=getData($q);
if(count($data)>0)
{
echo "yes";
}
?>