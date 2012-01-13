<?php
//Request page, save in $page
$page=$_GET["page"];
	//If no, $page=main
	if (!$page) $page = "main";

//Require header of webpage
require("www/header.php");
//Require $page including text for page
require("www/text/$page.html");
//Require main.php, if page is main
if ($page == "main") require("main.php");
if ($page == "insert") require("new.php");
//Require footer of webpage
require("www/footer.php");
?>
