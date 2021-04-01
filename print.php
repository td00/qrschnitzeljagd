<?php
include 'inc/header.php';
$schnitzel_qrcode = $_GET['code'];

?>
<center>
<script>
window.onload = function() {
    var body = 'src="inc/qrgen.php?code=<?php echo $schnitzel_qrcode; ?>"';
    var newWin = document.getElementById('printf').contentWindow;
    newWin.document.write(body);
    newWin.document.close(); //important!
    newWin.focus(); //IE fix
    newWin.print();
}
</script>

<iframe id="printf"></iframe>

<br /><br /><br /><hr /><br /><br /><br />
<button class="btn btn-info" onclick="goBack()">Back</button>

<script>
function goBack() {
  window.history.back();
}
</script>
</center>