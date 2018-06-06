<?php
try
{
	$serwer = "localhost";
	$baza = "zadanie";
	$uzytkownik = "root";
	$haslo = "";
	$pdo = new PDO('mysql:host='.$serwer.';dbname='.$baza.';charset=utf8', $uzytkownik, $haslo);
}
catch(PDOException $e)
{
	echo 'Wystąpił błąd podczas połączenia z bazą. Spróbuj ponownie później.<br>';
	echo "Błąd:".$e->getMessage(); //Tylko dla dev...
}
?>