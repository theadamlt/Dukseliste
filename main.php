<?php

$db_host       = "localhost";
$db_user       = "root";
$db_pass       = "";
$database      = "dukseliste";
$table_school  = "schools";
$table_class   = "classes";
$table_student = "students";

//Connect to DB
$con=mysql_connect($db_host, $db_user, $db_pass);

//Human readable error
if (!$con)  {
die ('Could not connect to MySQL database' . mysql_error());
}
//Select DB
$con_db =  mysql_select_db($database, $con);

//Human readable error
if (!$con_db)   {
 die ("Could  not connect to database $database " . mysql_error()); 
}


// Read Schools
$sql = "SELECT * from schools";
//Run mysql query
$result = mysql_query($sql,$con);
//Print schools output
echo "<form action='index.php' method='get' name='f1'>";
echo "<input type='hidden' name='page' value='".$page."' />";
echo "<select name='school'>";
//Print output as HTML option
while ($row = mysql_fetch_array($result)) {
	echo '<option ';
  	echo 'value="'.$row['rowID'].'">';
	echo $row['name'];
	echo "</option>";
	}
//Close HTML from and create button and linebreaks
echo "</select>";
echo "<br />";
echo "<br />";
echo "<input type='submit' value='Næste' />";
echo "</form>";
echo "<br />";
echo "<br />";
echo "<br />";


//Is $_GET school empty?
if (!empty($_GET['school']))	{
	$schoolGet = $_GET['school'];

//Is ! $_GET class empty?
if (empty($_GET['class'])) {
	//_GET class
	$classGet=$_GET['class'];
	//SQL
	$sql = "SELECT * from classes where rowID='$classGet'";
	//Run query
	$result = mysql_query($sql,$con);



	 //Print class output
echo "<form action='index.php' method='get' name='f2'>";
echo "<input type='hidden' name='page' value='".$page."' />";
echo "<select name='class'>";
//Print output as HTML option
while ($row = mysql_fetch_array($result)) {
	echo '<option ';
  	echo 'value="'.$row['rowID'].'">';
	echo $row['name'];
	echo "</option>";
}
//Close HTML from and create button and linebreaks
echo "</select>";
echo "<br />";
echo "<br />";
echo "<input type='submit' value='Næste' />";
echo "</form>";
echo "<br />";
echo "<br />";
echo "<br />";
} else {}
} else{}





/*
if (trim($schoolGet)) {
	$sql = "SELECT * from students where school='$schoolGet'";
	$result = mysql_query($sql,$con);
	$num = 0;
	$output = mysql_result($result,$num-1,"student");

	while ($row = mysql_fetch_array($result)) {
	echo '<p> '.$row['rowID'].'">';
	echo $row['name'];
	echo "</p>";
	}
} */

?>
