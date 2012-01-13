<?php
require("lib.php"); //Require lib
//DB credentials
$db_host       = "localhost";
$db_user       = "root";
$db_pass       = "";
//Table and database name
$database      = "dukseliste";
$table_school  = "schools";
$table_class   = "classes";
$table_student = "students";
localhost_con($database); //Mysql connection function
// Function for when site goes livemysql_con($db_host, $db_user, $db_pass, $database);
$sql = "SELECT * FROM $table_school"; //Read list of schools from DB
$result = mysql_query($sql,$con); //Run query
//Print schools output
echo "<form action='index.php' method='get' name='f1'>
<input type='hidden' name='page' value='".$page."' />
<select name='school'>";
//Print output as HTML option
while ($row = mysql_fetch_array($result)) { //Create array
	echo '<option value="'.$row['rowID'].'">';
	echo $row['name']; //Echo schoolname
	$schoolStr = $row['name']; //Save schoolname as string for later use
	echo "</option>"; //exit option
	}
//Close HTML from and create button and linebreaks
echo "</select>
<br /><br />
<input type='submit' value='Næste' />
</form><br /><br /><br />";




if (!empty($_GET['school']))	{ //Check if getSchool is not empty
	$schoolGet = $_GET['school']; //Save getSchool
	$sql = "SELECT * FROM $table_class WHERE schoolID=$schoolGet"; //Find classes with matching schoolID
	$result = mysql_query($sql,$con); //Run query
	//Print class output
	echo "<form action='index.php' method='get' name='f2'>
	<input type='hidden' name='page' value='".$page."' />
	<input type='hidden' name='school' value='".$schoolGet."' />
	<select name='class'>";
	//Print output as HTML option
	while ($row = mysql_fetch_array($result)) { //Create array
		echo '<option ';
	  	echo 'value="'.$row['rowID'].'">';
		echo $row['name']; //Echo classname
		$classStr = $row['name']; //Save classname as string for later use
		echo "</option>";
		}		
	//Close HTML from and create button and linebreaks
	echo "</select>
	<br /><br />
	<input type='submit' value='Næste' /></form>
	<br /><br /><br />";
	}

if (!empty($schoolGet)) $classGet = $_GET['class'];

if (!empty($schoolGet) && !empty($classGet))	{ //If none empty, run code
	$sql = "SELECT * from schools WHERE rowID=$schoolGet";
	$result = mysql_query($sql,$con);
	$row = mysql_fetch_array($result);
	$schoolStr = $row['name'];
	//classString
	$sql = "SELECT * FROM classes WHERE schoolID=$schoolGet AND rowID=$classGet";
	$result = mysql_query($sql,$con);
	$row = mysql_fetch_array($result);
	$classStr = $row['name'];
	}

if (!empty($classGet))	{ //If classGet not empty
	$sql = "SELECT * FROM $table_student WHERE schoolID=$schoolGet AND classID=$classGet"; // Find students with matching school and classID
	$result = mysql_query($sql,$con); //Run query
	echo "<h2>Elever i $classStr på $schoolStr</h2><br />";
	echo "<table border='1'>"; //Start table
	echo "<th>Elevnavn</th>
	<th>Antal gange</th>"; //Table header
	while ($row = mysql_fetch_array($result)) { //Create array
		echo "<tr>";
		echo '<td>'.$row['name'].'</td>';
		echo '<td>'.$row['times'].'</td>';
		echo "</tr>";
		}
	echo "</table>";
}

?>
