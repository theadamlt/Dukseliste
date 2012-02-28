<?php
if(!isset($_POST['skole']))
{
	echo <<< _END
	<form action="?page=insert" method="post">
		Skole: <input type="text" name="skole" value="Skole" title="Navn på skole"/><br /> <br />
		Klasse: <input type="text" name="klasse" value="Klasse" title="Klassetrin (komma) spor" /><br /> <br />
		Antal elever: <select name="elever">
_END;
		for ($i=1; $i<=50; ++$i)
		{
			echo "<option name='$i'>$i</option>";
		}
	echo <<<_END
		</select>
		<br />
		<br />
		<input type="submit" value="Submit" />
	</form>
_END;
}

elseif(isset($_POST['skole']))
{
	$school = $_POST['skole'];
	$class  = $_POST['klasse'];
	$elever = $_POST['elever'];

	if (is_string($school)) $school = ucfirst($school);
	echo '<form action="?page=insert" method="post">
	Skole:  <input type="text" name="skole2" value="'.$school.'" /><br /><br />
	Klasse: <input type="text" name="klasse2" value="'.$class.'"/><br />
	<br />';
	$count = 1;
	//echo '<form action="insert.php" method="post">';
	while ($count <= $elever)
	{
		echo "Elev $count: <input type='text' name='elev".$count."' value='Elevnavn ".$count."' /><br />";
		++$count;
		echo "<br />";
	}
	echo '<input type="hidden" name="count" value="'.$count.'" />
	<input type="submit" value="Færdig!" /></form>';
}

elseif(isset($_POST['skole2']))
{
	require('insert.php');
}
?>