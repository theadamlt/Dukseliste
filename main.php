<?php

$db_host="localhost";
$db_user="root";
$db_pass="";
$database = "dukseliste";
$table = "students";

$con=mysql_connect($db_host, $db_user, $db_pass);

if (!$con)  {
die ('Could not connect to MySQL database' . mysql_error());
}

$con_db=  mysql_select_db($database);

if (!$con_db)   {
 die ("Could not connect to database $database" . mysql_error()); 
}



?>
