<?PHP
// Renaldo Zynique
echo "<h2>Cleaning Schedule</h2>";

$date = date_create();

echo "<h3>".date('F Y', strtotime('first day of +1 month'))."</h3>"."<br/>";

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

$cleaners = ['Giovanni', 'Shiradz', 'Jack', 'Jordan', 'Renaldo', 'Zynique', 'Wesley', 'Lee', 'Stephan', 'Ameen', 'Steve', 'Emile', 'Etienne', 'James', ];

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
$testMonth = date('m', strtotime('first day of +1 month'));

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

echo "<h3>Cleaner Responsibilities:</h3>";
echo "<h4>Dishes</h4>";
echo "<ul>";
echo "<li>Pack and start dishwasher.</li>";
echo "<li><b>On Friday pack and start the dishwasher early</b> enough so it is done before the last person walks out. This way the dishwasher can be opened before the weekend.</li>";
echo "<li>Wash everything that does not fit in the dishwasher.</li>";
echo "</ul>";
echo "<h4>Bins</h4>";
echo "<ul>";
echo "<li><b>Empty small bin in back office.</b></li>";
echo "<li><b>Empty small bin in front office.</b></li>";
echo "<li>If recycling bin is full, please take it out.</li>";
echo "<li>If normal bin is full, please take it out.</li>";
echo "<li>If it is Friday, you have to clean out all bins.</li>";
echo "</ul>";
echo "<h4>Coffee Machine</h4>";
echo "<ul>";
echo "<li><b>Wipe off coffee machine.</b></li>";
echo "<li><b>Clean coffee machine nozzles.</b></li>";
echo "<li>Remove coffee machine milk system, clean thoroughly and <b>leave in solution</b>.</li>";
echo "<li>Wash coffee machine drip tray, ground container and metal mesh.</li>";
echo "</ul>";
echo "<h4>Other</h4>";
echo "<ul>";
echo "<li><b>Empty and rinse water machine drip tray.</b></li>";
echo "<li><b>Check geyser overflow and empty if there is water in the bottle.</b></li>";
echo "<li><b>Wipe down kitchen counters.</b></li>";
echo "</ul>";

?>