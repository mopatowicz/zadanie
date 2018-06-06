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
		echo "<p style=\"color:green\">10 losowych kodów zostało dodanych.</p>";
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
		require("db.php");
		$tab = [];
		$kody = str_replace(' ', '', $this->tab_usun);
		$kody = explode("\r\n", $kody);
		foreach($kody as $r)
		{
			if(!empty($r))
			{
				array_push($tab, $r);
			}
		}
		$arr = [];
		$zapytanie = $pdo->query("SELECT kod FROM kody");
		while($row = $zapytanie->fetch())
		{
			array_push($arr, $row[0]);
		}
		$wynik = array_diff($tab, $arr);
		
		if(empty($wynik))
		{
			echo "<p style=\"color: green;\">Podane kody zostały usunięte.</p>";
			foreach($tab as $r)
			{
				$pdo->query("DELETE FROM kody WHERE kod='$r'");
			}
		}
		else
		{
			echo "<p style=\"color: red;\">Podane kody nie zostały usunięte. Błędne kody:</p>";
			foreach($wynik as $r)
			{
				echo $r."<br>";
			}
		}
		
			
	}
}
?>