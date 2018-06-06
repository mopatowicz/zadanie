<?php
try
{
	$pdo = new PDO('mysql:host=localhost;dbname=zadanie;charset=utf8', 'root', '');
}
catch(PDOException $e)
{
	echo 'Wystąpił błąd podczas połączenia z bazą. Spróbuj ponownie później.<br>';
	echo "Błąd:".$e->getMessage(); //Tylko dla dev...
}
?>