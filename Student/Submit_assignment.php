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
<form method="post" enctype="multipart/form-data">
Upload Assignment<input type="file" name="txtf" />
<input type="submit" value="Upload" name="btn" />
</form>
</body>
</html>
<?php
if(isset($_POST['btn']))
{
include("../DB_connection.php");
 /*********** check file name ***********/
 
 $name=$_FILES['txtf']['name'];
 $dir="../Assignment/";
 $updated_name=checkFileName($name,$dir);

 /************* end ********************/
 
 $source_path=$_FILES['txtf']['tmp_name'];
 $destination_path=$dir.$updated_name;
 $fullpath="Assignment/".$updated_name;

$q="insert into submitted_assignment values(0,'$fullpath','".$_SESSION['user']."','".$_GET['id']."','".date("Y-m-d")."')";
if(setData($q))
{
move_uploaded_file($source_path,$destination_path);
 echo "inserted";
}
}