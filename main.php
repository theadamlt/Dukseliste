<?php

//DB credentials
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

//Human readable error
if (!$con)  {
die ('Kunne ikke tilslutte til MySQL database ' . mysql_error(). " Kontakt venligst administratoren");
}
//Select DB
$con_db =  mysql_select_db($database, $con);

//Human readable error
if (!$con_db)   {
 die ("Kunne ikke tilslutte til $database " . mysql_error(). " Kontakt venligst administratoren"); 
}


// Read Schools
$sql = "SELECT * from $table_school";
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
echo "</select>
<br />
<br />
<input type='submit' value='Næste' />
</form>
<br />
<br />
<br />";


//Is $_GET school empty?
if (!empty($_GET['school']))	{
	$schoolGet = $_GET['school'];

//Read classes

	//SQL
	$sql = "SELECT * FROM $table_class WHERE schoolID=$schoolGet";
	//Run query
	$result = mysql_query($sql,$con);

//Print class output
echo "<form action='index.php' method='get' name='f2'>";
echo "<input type='hidden' name='page' value='".$page."' />";
echo "<input type='hidden' name='school' value='".$schoolGet."' />";
echo "<select name='class'>";
//Print output as HTML option
while ($row = mysql_fetch_array($result)) {
	echo '<option ';
  	echo 'value="'.$row['rowID'].'">';
	echo $row['class'].mysql_error();
	echo "</option>";
}
//Close HTML from and create button and linebreaks
echo "</select>
<br />
<br />
<input type='submit' value='Næste' />
</form>
<br />
<br />
<br />";
}

if (!empty($schoolGet)) $classGet = $_GET['class'];


if (!empty($classGet))	{
	$sql = "SELECT * FROM $table_student WHERE schoolID=$schoolGet and classID=$classGet";

	$result = mysql_query($sql,$con);
	while ($row = mysql_fetch_array($result)) {
	echo '<p>';
  	echo $row['name'];
	echo '</p>';
}
}
?> 
