<?php


$db_host       = "localhost";
$db_user       = "root";
$db_pass       = "";
//Table and database name
$database      = "dukseliste";
$table_school  = "schools";
$table_class   = "classes";
$table_student = "students";

//Connect to DB
$con=mysql_connect($db_host, $db_user, $db_pass);
//Select DB
$con_db =  mysql_select_db($database, $con);

//Get rowID from schools
$sql = "SELECT max(rowID) FROM schools";
$schoolCount = mysql_query($sql,$con);
if (!mysql_query($sql,$con)) {
	die ("Error" . mysql_error());
	}
//Insert school
$sql="INSERT INTO schools (rowID,name) VALUES ('$_POST[skole], $schoolCount')";
if (!mysql_query($sql,$con)) {
  	die('Error: ' . mysql_error());
	}

//Get rowI from schools
$sql = "SELECT max(rowID) from classes";
$classCount = mysql_query($sql,$con);
if (!mysql_query($sql,$con)) {
	die ("Error" . mysql_error());
 	}

//Insert class
$sql = "INSERT INTO classes (rowID, schoolID, class) VALUES ($classCount, $schoolCount, '$_POST[klasse]')";
if (!mysql_query($sql,$con))	{
	die("Error: ".mysql_error());
}

$studCount = $_POST['count'];

while ($studCount >= 1)	{
	$sql = "INSERT INTO students (rowID, schoolID, classID, name) VALUES (rowID, $schoolCount, $classCount, '$_POST[elev".$studCount."]')";
	--$studCount;
	}



//redirect to homepage
header('Location: index.php?page=main&school='.$schoolCount.'&class='.$classCount.'');
?>
