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


//Insert school
$sql="INSERT INTO schools (name) VALUES ('$_POST[skole]') WHERE name NOT IN (SELECT name FROM schools)";

if (!mysql_query($sql,$con)) {
  die('Error: ' . mysql_error());
 }

//Get rowID from schools
$sql = "SELECT max(rowID) FROM `schools`";
$schoolCount = mysql_query($sql,$con);
if (!mysql_query($sql,$con)) {
die ("Error" . mysql_error());
	}


//Insert class
$sql="INSERT INTO classes IF NOT EXIST (schoolID, class)
VALUES ($schoolCount, '$_POST[klasse]')";


//Insert class
$sql="INSERT INTO schools (schoolID, class)
VALUES ($schoolCount, '$_POST[klasse]') WHERE name NOT IN (SELECT class FROM class)";
//Get rowID from classes
$sql = "SELECT max(rowID) FROM `classes`";

$classCount = mysql_query($sql,$con);
if (!mysql_query($sql,$con)) {
die ("Error" . mysql_error());
 }


//redirect to homepage
header('Location: index.php?page=main&school='.$schoolCount.'&class='.$classCount.'');
?>
