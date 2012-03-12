<?php
require("lib.php");
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$database = "dukseliste";
$table_school = "schools";
$table_class = "classes";
$table_student = "students";

localhost_con($database);
//mysql_con($db_host, $db_user, $db_pass, $database);

$sql = "SELECT * FROM $table_school"; 
$result = mysql_query($sql);
//Print schools output
echo "<form action='index.php' method='get' name='f1'>
	<input type='hidden' name='page' value='" . $page . "' />
	<select name='school'>";
while ($row = mysql_fetch_array($result))
{
    echo '<option value="' . $row['rowID'] . '">';
    echo $row['name'];
    $schoolStr = $row['name'];
    echo "</option>";
}
echo "</select>
	<br /><br />
	<input type='submit' value='Næste' />
	</form><br /><br /><br />";




if (isset($_GET['school']))
{
    $schoolGet = $_GET['school'];
    $sql = "SELECT * FROM $table_class WHERE schoolID=$schoolGet"; 
    $result = mysql_query($sql);

    echo "<form action='index.php' method='get' name='f2'>
		<input type='hidden' name='page' value='" . $page . "' />
		<input type='hidden' name='school' value='" . $schoolGet . "' />
		<select name='class'>";
    while ($row = mysql_fetch_array($result))
    {
        echo '<option ';
        echo 'value="' . $row['rowID'] . '">';
        echo $row['name'];
        $classStr = $row['name'];
        echo "</option>";
    }
    echo "</select>
		<br /><br />
		<input type='submit' value='Næste' /></form>
		<br /><br /><br />";
}

if (isset($schoolGet) && isset($classGet))
{
    $sql = "SELECT * from schools WHERE rowID=$schoolGet";
    $result = mysql_query($sql);
    $row = mysql_fetch_array($result);
    $schoolStr = $row['name'];
    $sql = "SELECT * FROM classes WHERE schoolID=$schoolGet AND rowID=$classGet";
    $result = mysql_query($sql);
    $row = mysql_fetch_array($result);
    $classStr = $row['name'];
}

if (isset($_GET['class']))
{
    $classGet = $_GET['class'];
    $sql = "SELECT * FROM $table_student WHERE schoolID=$schoolGet AND classID=$classGet"; // Find students with matching school and classID
    $result = mysql_query($sql);
    echo "<h2>Elever i $classStr på $schoolStr</h2><br />";
    echo "<table border='1'>";
    echo "<th>Elevnavn</th>
		<th>Antal gange</th>"; 
    while ($row = mysql_fetch_array($result))
    {
        echo "<tr>";
        echo '<td>' . $row['name'] . '</td>';
        echo '<td>' . $row['times'] . '</td>';
        echo "</tr>";
    }
    echo "</table>";
}
?>
