 <form action="step.php" method="post">
Skole: <input type="text" name="skole" value="Skole" title="Navn på skole"/><br /> <br />
Klasse: <input type="text" name="klasse"  value="Klasse" title="Klassetrin (komma) spor" /><br /> <br />
Antal elever: <select name="elever">
<?php
for ($i=1; $i<=50; ++$i){
	echo "<option name='$i'>$i</option>";
}
?>
</select>
<!--<input type="text" name="elever" value="Antal elever" /><br /> <br />-->
<br />
<br />
<input type="submit" value="Submit" />
</form>
