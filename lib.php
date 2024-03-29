<?php

//Define Environment
define('ENVIRONMENT', 'development');
/*
 *---------------------------------------------------------------
 * ERROR REPORTING
 *---------------------------------------------------------------
 * Different environments will require different levels of error reporting.
 * By default development will show errors but testing and live will hide them.
 */
if (defined('ENVIRONMENT'))
{
	switch (ENVIRONMENT)
	{
		case 'development':
		error_reporting(E_ALL);
		break;
		
		case 'testing':
		case 'production':
		error_reporting(0);
		break;

		default:
		exit('The application environment is not set correctly.');
	}
}

function mysql_con($host, $user, $password, $dbname)	{
	global $con;
	$con = mysql_connect($host, $user, $password);
	if (!$con)	{
		die ("Could not connect to MySQL database ".mysql_error());
	}

	global $con_db;
	$con_db = mysql_select_db($dbname, $con);
	if (!$con_db) {
		die ("Could not select database ".$dbname." ".mysql_error());
	}

}

function localhost_con($dbname) {
	global $con;
	$con = mysql_connect("localhost", "root", "");
	if (!$con)	{
		die ("Could not connect to MySQL database ".mysql_error());
	}
	global $con_db;
	$con_db = mysql_select_db($dbname,$con);
	if (!$con_db) {
		die ("Could not select database ".$dbname." ".mysql_error());
	}
}

function mysql_fix_string($string)	{
	if (get_magic_quotes_gpc()) $string = stripslashes($string);
	return mysql_real_escape_string($string);
}

function mysql_enteries_fix_string($string) {
	return htmlentities(mysql_fix_string($string));
}

function oddOrEven($num)
{
	if($odd = $num%2 ) return(0); //Odd number
	else return(1); //Even number
}

function getBrowser()
{
	if(strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== FALSE) 
		$browser = 'Internet explorer';

	elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Firefox') !== FALSE) 
		$browser = 'Firefox';
		
	elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Chrome') !== FALSE) 
		$browser = 'Chrome';

	elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Opera') !== FALSE)
		$browser = 'Opera';

	elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Safari') !== FALSE)
		$browser = 'Safari';

	elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'SeaMonkey') !== FALSE)
		$browser = 'SeaMonkey';

	elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Flock') !== FALSE)
		$browser = 'Flock';

	elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Prism') !== FALSE)
		$browser = 'Prism';

	elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Deepnet Explorer') !== FALSE)
		$browser = 'Deepnet Explorer';

	elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Maxthon') !== FALSE)
		$browser = 'Maxthon';

	elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'SeaMonkey') !== FALSE)
		$browser = 'SeaMonkey';

	else
		$browser = 'Undefined';

	return $browser;
}

$salt1 = "/*5t12?";
$salt2 = "45¤¤5j";
?>