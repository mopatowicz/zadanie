<form method="post" action="">
	<input type="submit" name="dk" value="Dodaj 10 losowych kodów">
	<input type="submit" name="pk" value="Pokaż wsszystkie kody">
	<input type="submit" name="uk" value="Usuń kody">
	<input type="hidden" name="ok"> 
</form>

<?php
require_once("st/obs.php");
$v = new Page();
if(isset($_POST["ok"]))
{
	
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
		?>
		<form method="post" action="">
			<textarea name="kody" style="width: 400px; height: 300px;" placeholder="Wprowadź kody"></textarea>
			<br>
			<input type="submit" name="usun">
		</form>
		<?php
	}
}
if(isset($_POST["usun"]))
{
	$v->tab_usun = $_POST["kody"];
	$v->usun();
}
?>