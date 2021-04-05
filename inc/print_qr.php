<?php
include 'header.php';
$schnitzel_qrcode = $_GET['code'];


?>
<html>
<body><center> <iframe frameBorder="0" src="/inc/qrgen.php?code=<?php echo $schnitzel_qrcode; ?>"></iframe>
<script>
print();
</script>
</center></body></html>
