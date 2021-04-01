<?php
include 'inc/header.php';
$schnitzel_qrcode = $_GET['code'];

?>
<script>
var body = "dddddd"    
var script = "<script>window.print();</scr'+'ipt>";

var newWin = $("#printf")[0].contentWindow.document; 
newWin.open();
newWin.close();

$("body",newWin).append(body+script);

</script>

<center>
<iframe id="printf" src="qrgen.php?code=<?php echo $schnitzel_qrcode; ?>" >

<br /><br /><br /><hr /><br /><br /><br />
<button class="btn btn-info" onclick="goBack()">Back</button>

<script>
function goBack() {
  window.history.back();
}
</script>
</center>