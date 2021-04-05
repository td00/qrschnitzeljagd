<?php
include 'header.php';
$schnitzel_qrcode = $_GET['code'];


?>
<html>
<body><center> <iframe src="/inc/qrgen.php?code=<?php echo $schnitzel_qrcode; ?>"></iframe>
<script>
print();
</script>
</center></body></html>
