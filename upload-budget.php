<?php

$incomeNames 	= $_POST["incomeIN"];
$incomeValues	= $_POST["incomeIV"];

$expenseNames	= $_POST["expenseIN"];
$expenseValues	= $_POST["expenseIV"];

for($i = 1;$i < count($incomeNames);$i++) {
	echo "<p>" . $incomeNames[$i] . "</p>";
}