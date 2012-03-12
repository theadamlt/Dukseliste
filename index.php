<?php

if(!isset($_GET['page']))
{
	header('Location: ?page=main');
	die();
}
else
{
	$page=$_GET['page'];
	require('www/header.php');
	require("www/text/$page.html");
	if ($page == 'main') require('main.php');
	if ($page == 'insert') require('new.php');
	require('www/footer.php');
}
?>
