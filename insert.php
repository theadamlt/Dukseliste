<?php
require("lib.php");
//DB credentials
$db_host       = "localhost";
$db_user       = "root";
$db_pass       = "";
//Table and database name
$database      = "dukseliste";
$table_school  = "schools";
$table_class   = "classes";
$table_student = "students";

localhost_con($database);
// Function for when site goes live: mysql_con($db_host, $db_user, $db_pass, $database);

$school = $_POST["skole"];
$sql = "SELECT * FROM schools WHERE name='$school'";
if (!($rowSchool=mysql_query($sql,$con))) {
	//Get rowID from schools
	$sql = "SELECT max(rowID) FROM schools";
	$schoolCount = mysql_query($sql,$con);
	++$schoolCount;
	if (!mysql_query($sql,$con)) {
		die ("Error" . mysql_error());
		}
	//Insert school
	$sql="INSERT INTO schools (rowID,name) VALUES ($schoolCount,'$school')";
	if (!mysql_query($sql,$con)) {
	  	die('Error: ' . mysql_error());
		}
	$sql = "SELECT * FROM schools WHERE rowID=$schoolCount";
	$rowSchool = mysql_query($sql,$con);
} 
$schoolCount = $rowSchool['rowID'];

if (isset($_POST["klasse"])) {
	$class =  $_POST["klasse"];
	$sql = "SELECT * FROM classes WHERE schoolID=$schoolCount AND name='$class'";
	if (!($rowClass=mysql_query($sql,$con))) {
		//Get rowID from classes
		$sql = "SELECT max(rowID) FROM classes";
		$classCount = mysql_query($sql,$con);
		++$classCount;
		if (!mysql_query($sql,$con)) {
			die ("Error" . mysql_error());
			}
		//Insert class
		$sql="INSERT INTO classes (rowID,schoolID,class) VALUES ($classCount,$schoolCount,'$class')";
		if (!mysql_query($sql,$con)) {
		  	die('Error: ' . mysql_error());
			}
		$sql = "SELECT * FROM classes WHERE rowID=$classCount";
		$rowclass = mysql_query($sql,$con);
	} 
	$classCount = $rowClass['rowID'];

	// --- elever....
}


$studCount = $_POST['count'];
/*
while ($studCount >= 1)	{
	$sql = "INSERT INTO students (rowID, schoolID, classID, name) VALUES (rowID, $schoolCount, $classCount, '".$_POST["elev".$studCount]."')";
	--$studCount;
	}
	*/
//redirect to homepage
//header('Location: index.php?page=main&school='.$schoolCount.'&class='.$classCount.'');
?>
