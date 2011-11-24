<?php

$db_host       = "localhost";
$db_user       = "root";
$db_pass       = "";
$database      = "dukseliste";
$table_school  = "schoolsID";
$table_class   = "classesID";
$table_student = "studentsID";

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

$result = mysql_query($sql,$con);

echo "<form action='index.php' method='get' name='f1'>";
echo "<input type='hidden' name='page' value='".$_GET['page']."' />";
echo "<select name='school'>";
while ($row = mysql_fetch_array($result)) {
	echo '<option ';
  	echo 'value="'.$row['rowID'].'">';
	echo $row['name'];
	echo "</option>";
	}
echo "</select>";
echo "<br />";
echo "<br />";
echo "<input type='submit' value='Næste' />";
echo "</form>";
echo "<br />";



/*
for ($num; $num > 0; $num--)	{
	$output = mysql_result($result,$num-1,"school");

	echo '<option value="';
	echo $output;
	echo '">';
	echo $output;
	echo ' </option>';
}
*/


echo "<br />";
echo "<br />";

if (!$_GET['school'])	{
		
}  else {
	$schoolGet = $_GET['school'];
}



/*
if (trim($schoolGet)) {
	$sql = "SELECT * from students where school='$schoolGet'";

	$result = mysql_query($sql,$con);
	$num    = mysql_numrows($result);

	echo "<select>";
	for ($num; $num > 0; $num--)	{
	$output = mysql_result($result,$num-1,"student");
	echo '<option value="';
	echo $output;
	echo '">'; 
	echo $output;
	echo ' </option>';
	}
echo "</select>";

}
*/

?>