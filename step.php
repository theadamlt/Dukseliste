<?php
require("www/header.php");
$school = $_POST['skole'];
$class = $_POST['klasse'];
$elever = $_POST['elever'];

/*
if (!is_string($school))	{
	echo '<script type="javascript" language="javascript">
	alert("Det skolenavn du indtastede er ikke tekst. Prøv igen");
	</script>';
}
*/

echo '<pre>
<form action="insert.php" method="post">
Skole:  <input type="text" name="skole" value="'.$school.'" /><br />
Klasse: <input type="text" name="klasse"  value="'.$class.'"/><br />
<br />
</pre>';
$count = 1;
//echo '<form action="insert.php" method="post">';
while ($count <= $elever)	{
	echo "Elev $count: <input type='text' name='elev' value='Elevnavn ".$count."' /><br />";
	++$count;
}
echo '<input type="submit" value="Færdig!" />
</form>';
require("www/footer.php");
?>