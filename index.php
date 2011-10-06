<?php

$page = $_SERVER["QUERY_STRING"];
if (!$page) $page = "main";

require("www/header.php");
require("www/text/$page.html");
require("www/footer.php");
?>
