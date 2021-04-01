<?php
include 'inc/header.php';

$schnitzel_qrcode = $_GET['code'];

$statement = $pdo->prepare("SELECT * FROM codes WHERE schnitzel_qrcode = :schnitzel_qrcode"); //check if the qrcode is already registered
$result = $statement->execute(array('schnitzel_qrcode' => $schnitzel_qrcode));
$user = $statement->fetch();

echo $user;

?>