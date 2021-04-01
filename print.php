<?php
include 'inc/header.php';
$schnitzel_qrcode = $_GET['code'];
?>
<iframe src="qrgen.php?code=<?php echo $schnitzel_qrcode; ?>" />