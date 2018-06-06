<form method="post" action="">
	<input type="submit" name="dk" value="Dodaj 10 losowych kodów">
	<input type="submit" name="pk" value="Pokaż wsszystkie kody">
	<input type="submit" name="uk" value="Usuń kody">
	<input type="hidden" name="ok"> 
</form>

<?php
if(isset($_POST["ok"]))
{
	require_once("st/obs.php");
	$v = new Page();
	
	if(isset($_POST["dk"]))
	{
		$v->dodaj();
	}
	
	if(isset($_POST["pk"]))
	{
		$v->wyswietl();
	}
	
	if(isset($_POST["uk"]))
	{
		
	}
}
?>