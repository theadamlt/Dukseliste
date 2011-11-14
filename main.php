 <?php

$db_host       ="localhost";
$db_user       ="root";
$db_pass       = "";
$database      = "dukseliste";
$table_school  = "schools";
$table_class   = "classes";
$table_student = "students";

 
$con=mysql_connect($db_host, $db_user, $db_pass);

if (!$con)  {
die ('Could not connect to MySQL database' . mysql_error());
}

$con_db =  mysql_select_db ($database, $con);

if (!$con_db)   {
 die ("Could  not connect to database $database " . mysql_error()); 
}




// Read Schools
$sql = " SELECT * from schools";

$result = mysql_query($sql,$con);
$num    = mysql_numrows($result);

echo "<select>";
for ($num; $num > 0; $num--)	{
	$output = mysql_result($result,$num-1,"school");
	echo '<option value="'; echo $output; echo '">'; echo $output; echo ' </option>';
}
echo "</select>";


$schoolGet = $_GET['school'];

if (trim($schoolGet)) {
	$sql = " SELECT * from student where school='$schoolGet'";

$result = mysql_query($sql,$con);
$num    = mysql_numrows($result);

echo "<select>";
for ($num; $num > 0; $num--)	{
	$output = mysql_result($result,$num-1,"student");
	echo '<option value="'; echo $output; echo '">'; echo $output; echo ' </option>';
}
echo "</select>";
}

?>
