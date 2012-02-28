<?php
$page=$_GET["page"];
if (!$page) $page = "main";

require("www/header.php");
require("www/text/$page.html");
if ($page == "main") require("main.php");
if ($page == "insert") require("new.php");
require("www/footer.php");
?>
