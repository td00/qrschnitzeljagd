<?php
include 'inc/header.php';

$qrcode = $_GET['code'];

$statement = $pdo->prepare("SELECT * FROM codes WHERE qrcode = :qrcode"); //check if the qrcode is already registered
$result = $statement->execute(array('qrcode' => $qrcode));
$user = $statement->fetch();

echo $user;

?>