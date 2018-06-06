<?php
class Page
{
	public $tab_usun;
	
	public function _set($n, $w)
	{
		$this->$n = $w;
	}
	
	public function dodaj()
	{
		require("db.php");
		for($i=0; $i<10; $i++)
		{
			$random = substr(md5(rand()), 0, 5);
			$date = date("Y-m-d H:i:s");
			$zapytanie = $pdo->query("SELECT kod FROM kody WHERE kod = '$random'");
			$w = $zapytanie->rowCount();
			if($w==0)
			{
				$pdo->query("INSERT INTO kody VALUES ('$random', '$date')");
			}
			else
				$i--;
		}
		echo "<p color=\"green\">10 losowych kodów zostało dodanych.</p>";
	}
	
	public function wyswietl()
	{
		require("db.php");
		$zapytanie = $pdo->query("SELECT * FROM kody");
		?>
		<table>
			<tr>
				<th>Kod</th>
				<th>Data dodania<th>
			</tr>
			<?php
			while($r = $zapytanie->fetch())
			{
			?>
			<tr>
				<td><?php echo $r[0];?></td>
				<td><?php echo $r[1];?></td>
			</tr>
			<?php
			}		
			?>
		</table>
		<?php
	}
	
	public function usun()
	{
		
	}
}
?>