<?PHP
// Renaldo Zynique
echo "<h2>Cleaning Schedule</h2>";

$date = date_create();

echo "<h3>".date('F Y')."</h3>"."<br/>";

/*echo (date('z') + 1)."<br/>";
echo (date('W') + 1)."<br/>";
// CURRENT DAY, 1-7 (mon - sun)
echo date('N')."<br/>";
// FIRST DAY OF YEAR. 1-7 (mon - sun)
echo date('N',strtotime(date('Y-01-01')))."<br/>";
echo date('F Y')."<br/>";
echo date('Y-m-01')."<br/>";
echo date('N',strtotime(date('Y-m-01')))."<br/>";
echo date('z',strtotime(date('Y-m-01')))."<br/>";
echo date("t")."<br/>";*/

//$cleaners = ['Renaldo', 'Zynique', 'Maurice', 'Dominic', 'Steve', 'Emile', 'Etienne', 'James', 'Giovanni', 'Jack'];
$cleaners = ['Dominic', 'Stephan', 'Steve', 'Emile', 'Etienne', 'James', 'Giovanni', 'Jack', 'Jordan', 'Renaldo', 'Zynique', 'Maurice'];

echo "<table>";
echo "<tr>";
echo "<td>Monday</td>";
echo "<td>Tuesday</td>";
echo "<td>Wednesday</td>";
echo "<td>Thursday</td>";
echo "<td>Friday</td>";
echo "<td>Saturday</td>";
echo "<td>Sunday</td>";
echo "</tr>";

$startDate = "2017-08-01";
$testMonth = date("m");

$currentDay = 1;
$offset = date('N',strtotime(date('Y-'.$testMonth.'-01')));
while ($offset > 1) {
	echo "<td></td>";
	$offset--;
}

$diffDays = 0;

$date1 = new DateTime($startDate);
$date2 = new DateTime(date("Y")."-".$testMonth."-01");
$diff = $date2->diff($date1)->format("%a");
//echo "diff: ".$diff."</br>";
//echo "blah: ".date('N',strtotime($startDate))."</br>"; 
$startOffset = 7 - (date('N',strtotime($startDate)) - 1);
//echo "startOffset: ".$startOffset."</br>"; 
$endOffset = date('N',strtotime(date("Y-".$testMonth."-01"))) - 1;
//echo "endOffset: ".$endOffset."</br>";
$diff = $diff - ($startOffset + $endOffset);
//echo "diff: ".$diff."</br>";
$diffDays = $diff - (2 * floor($diff / 7));
$diffDays = $diffDays + ($startOffset > 2 ? $startOffset - 2 : 0) + ($endOffset > 5 ? 5 : $endOffset);
//echo "workDays: ".$diffDays."</br>";

$count = 0;
while ($currentDay < date('t',strtotime(date('Y-'.$testMonth.'-01')))+1) {

	if (date('N',strtotime(date('Y-'.$testMonth.'-'.$currentDay))) >= 6) {
		echo "<td>".$currentDay."</td>";
	} else {
		echo "<td>".$currentDay.": ".$cleaners[($diffDays + $count) % count($cleaners)]."</td>";
		$count++;
	}

	if (date('N',strtotime(date('Y-'.$testMonth.'-'.$currentDay))) % 7 == 0) {
		echo "</tr>";
		echo "<tr>";
	}
	$currentDay++;
}
echo "</tr>";
echo "</table>";

echo "<p><b>Cleaner Responsibilities:</b> Wash coffee machine parts, leave the milk system parts in the cleaning liquid. Load up and run the dish washer. Take out the rubbish if the bin is full, or if it's Friday.</p>";

?>