<html>
<body>

<style>
body { font-family: sans-serif; font-size: 12px; text-align: center; }
table { border-collapse: collapse; margin: auto; }
th,td { padding: 5px 10px; text-align: left; }
th { background: dodgerblue; color: white; }
</style>
<h1>All the available column fractions in LemonLace as decimals, ordered by their size</h1>
<h2>Typical col-xs-1, col-xs-2, etc size columns are highlighted</h2>

<?php
$columns = array();
for ($den=1; $den <= 12; $den++) {
for ($num=1; $num <= 12; $num++) {
	$dec = round($num / $den, 8);
		if ($dec <= 1) {
		#echo $dec.'<br />';
		// make sure it adds the simplest fractions, i.e. 1/2 not 6/12
		if (empty($columns['"'.$dec.'"'])) {
			$columns['"'.$dec.'"']['num'] = $num;
			$columns['"'.$dec.'"']['den'] = $den;
		}
	}
} }

ksort($columns);
#print_r($columns);

echo '<table>';
echo '<tr><th>Fraction</th><th>Class Example</th><th>Decimal</th></tr>';
foreach ($columns as $dec => $fraction) {
	echo '<tr';
		// if a main col class, col-xs-1, 2, etc, embolden it
		if (is_integer(12/$fraction['den'])) {
			echo ' style="font-weight:bold"';
		}
	echo '>';
		echo '<td>'.$fraction['num'].'/'.$fraction['den'].'</td>';
		#echo '<td>'.(12/$fraction['den']).'</td>';
		echo '<td><div contenteditable>col-xs-'.$fraction['num'].'_'.$fraction['den'].'</div></td>';
		echo '<td>'.str_replace('"','',$dec).'</td>';
	echo '</tr>';
}
echo '</table>';

?>

</body>
</html>