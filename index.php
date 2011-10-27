<?php

//Request query string, save in $page
$page = $_SERVER["QUERY_STRING"];
	#If no query string, $page=main
	if (!$page) $page = "main";


//Require header of webpage
require("www/header.php");
//Require $page (Query string) including text for page
require("www/text/$page.html");
//Require main.php
require("main.php");
//Require footer of webpage
require("www/footer.php");
//

?>