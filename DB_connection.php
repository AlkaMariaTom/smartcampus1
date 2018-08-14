<?php
$con=mysqli_connect("localhost","root","","time_table");

/*
|-------------------------------------------------
|The below function used for insert,update and
|delete queries
|-------------------------------------------------
*/

function setData($q)
{
 global $con;
 mysqli_query($con,$q);
 if(mysqli_affected_rows($con)>0)
 {
 return true;
 }
}

/*
|-------------------------------------------------
|The below function used for select data from 
|databse table
|-------------------------------------------------
*/

function getData($q)
{
 global $con;
 $data=mysqli_query($con,$q);
 $arr=array();
 while($a=mysqli_fetch_array($data))
 {
 $arr[]=$a;
 }
 return $arr;
}

/*
|-------------------------------------------------
|The below function used to chnage the name of file you
|choosed,if folder contain a file with same name
|-------------------------------------------------
*/

function checkFilename($name,$dir)
{
$actual_name = pathinfo($name,PATHINFO_FILENAME);
$original_name = $actual_name;
$extension = pathinfo($name, PATHINFO_EXTENSION);

$i = 1;
while(file_exists($dir.$actual_name.".".$extension))
{           
    $actual_name = (string)$original_name.$i;
    $name = $actual_name.".".$extension;
    $i++;
}
return $name;
}
