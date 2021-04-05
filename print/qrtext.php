<?php
include '/inc/header.php';

$schnitzel_qrcode = $_GET['code'];
echo "";


$statement = $pdo->prepare("SELECT * FROM codes WHERE schnitzel_qrcode = :schnitzel_qrcode"); //check if the qrcode is already registered
$result = $statement->execute(array('schnitzel_qrcode' => $schnitzel_qrcode));
$user = $statement->fetch();

$schnitzel_from = $user['schnitzel_from'];
$schnitzel_text = $user['schnitzel_text'];
$schnitzel_to = $user['schnitzel_to'];
$schnitzel_location = $user['schnitzel_location'];
$schnitzel_id = $user['id'];
$schnitzel_old_counter = $user['schnitzel_counter'];

?>
<html>
<h1>Schnitzel from <?php echo $schnitzel_from; ?></h1>
<i>Just scan the QR Code below to get more Info:</i><br><br>
<body><center> <iframe src="/inc/qrgen.php?code=<?php echo $schnitzel_qrcode; ?>"></iframe>

<br><br>
<b>This QR Code is for <?php echo $schnitzel_to; ?></b>
<br>
<a>It was created on https://<?php echo $_SERVER["SERVER_NAME"];?>/</a>
<br>
<br>
<b>This QR Code should be here: <i><?php echo $schnitzel_location; ?></i></b>
<br>
<script>
print();
</script>
</center></body></html>

