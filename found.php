<?php
include 'inc/header.php';

$schnitzel_qrcode = $_GET['code'];

$statement = $pdo->prepare("SELECT * FROM codes WHERE schnitzel_qrcode = :schnitzel_qrcode"); //check if the qrcode is already registered
$result = $statement->execute(array('schnitzel_qrcode' => $schnitzel_qrcode));
$user = $statement->fetch();

$schnitzel_from = $user['schnitzel_from'];
$schnitzel_text = $user['schnitzel_text'];
$schnitzel_to = $user['schnitzel_to'];
$schnitzel_location = $user['schnitzel_location'];
$schnitzel_id = $user['id'];
$schnitzel_old_counter = $user['schnitzel_counter'];
$schnitzel_counter = $schnitzel_old_counter + 1;

echo $schnitzel_counter;

echo "<br>";

echo $schnitzel_old_counter;
echo "<hr>";
//update the counter

$statement = $pdo->prepare("UPDATE codes SET schnitzel_counter = :schnitzel_counter WHERE id = :schnitzel_id");
 $result = $statement->execute(array('schnitzel_id'=> $schnitzel_id, 'schnitzel_counter'=> $schnitzel_counter ));

 $statement = $pdo->prepare("SELECT * FROM codes WHERE schnitzel_qrcode = :schnitzel_qrcode"); //check if the qrcode is already registered
 $result = $statement->execute(array('schnitzel_qrcode' => $schnitzel_qrcode));
 $user = $statement->fetch();
 $schnitzel_old_counter = $user['schnitzel_counter'];

 echo $schnitzel_counter;

echo "<br>";

echo $schnitzel_old_counter;

echo "<hr>";


echo '<div class="alert alert-info" role="alert">Found Schnitzel No:'.$schnitzel_id.'</div>';
echo "<br/>";
//lets build a table with infos:
echo '<table class="table table-dark table-striped" style="width:30%">';
echo "<tr>";
echo "<td>";
echo "From:";
echo "</td>";
echo "<td>";
echo $schnitzel_from;
echo "</td>";
echo "</tr>";
echo "<tr>";
echo "<td>";
echo "To:";
echo "</td>";
echo "<td>";
echo $schnitzel_to;
echo "</td>";
echo "</tr>";
echo "<tr>";
echo "<td>";
echo "Message:";
echo "</td>";
echo "<td>";
echo $schnitzel_text;
echo "</td>";
echo "</tr>";
echo "<tr>";
echo "<td>";
echo "Location:";
echo "</td>";
echo "<td>";
echo $schnitzel_location;
echo "</td>";
echo "</tr>";
echo "<tr>";
echo "<td>";
echo "Already found:";
echo "</td>";
echo "<td>";
if ($schnitzel_old_counter == 0) { //if not admin, print "User" in green
    echo '<p class="text-success"><b>No<b></p><br>';
}
else { 
    echo '<p class="text-danger"><b>Yes<b> <i>('.$schnitzel_old_counter.' times)</i></p>';
}
echo "</td>";
echo "</tr>";
?>
</table>
<br /> <br /><br />

</table>
<br>
<br/>
<br>
<a href="index.php"><button class="btn btn-info">Back</button></a>
<br/>
<br>
<!--<a href="rawdata.php"><button class="btn btn-black">Raw Data</button></a>-->
<br/>

<br/>

<a href="mailto:abuse+schnitzel@thiesmueller.de"><button class="btn btn-danger">Delete this!</button></a>
</body>
</html>
