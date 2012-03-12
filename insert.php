<?php
if(isset($_POST['skole']))
{
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

	$school = trim($_POST['skole']);
	$class = trim($_POST['klasse']);
	$sql = "SELECT * FROM schools WHERE name='$school'";
	$result = mysql_query($sql);
	$numrows = mysql_num_rows($result);
	
	//Insert school
	$sql="INSERT INTO schools (rowID,name) VALUES (NULL,'$school')";
	if (!mysql_query($sql)) {
	  	die('Error: ' . mysql_error());
	}
	$schoolCount = ++$numrows;

	//Insert class
	$sql="INSERT INTO classes (rowID ,schoolID, class) VALUES (NULL, $schoolCount, '$class')";
	if (!mysql_query($sql)) die('Error: ' . mysql_error());

	$sql = "SELECT * FROM classes WHERE rowID=$classCount";
	$result = mysql_query($sql);
	$numrows = mysql_num_rows($result);
	$classCount = ++$numrows;

	$studCount = $_POST['count'];
	
	while ($studCount >= 1)
	{
		$sql = "INSERT INTO students (rowID, schoolID, classID, name)
		VALUES (NULL, $schoolCount, $classCount, '$_POST[name]')";
		$result = mysql_query($sql);
		--$studCount;
	}
	//redirect to homepage
	header('Location: index.php?page=main&school='.$schoolCount.'&class='.$classCount.'');
	die();
}
?>
