<?php
      $qrcode = $_GET["data"];
      $server = $_SERVER["SERVER_NAME"];
      $code = "https://".$server."/found.php?code=".$qrcode;
?>
<div id="qrcode"></div>
<script type="text/javascript" src="/res/js/qrcode.js"></script>
<script type="text/javascript">
var qrcode = new QRCode(document.getElementById("qrcode"), {
	text: "<?php echo $code; ?>",
	width: 128,
	height: 128,
	colorDark : "#000000",
	colorLight : "#ffffff",
	correctLevel : QRCode.CorrectLevel.L
});
</script>
<br /> <br /><hr /><br />
<?php
echo $code;
?>