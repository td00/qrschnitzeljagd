<?php
include 'inc/header.php';
$schnitzel_qrcode = $_GET['code'];

?>
<center>
<script>
        function printDiv() {
            var divContents = document.getElementById("GFG").innerHTML;
            var a = window.open('', '', 'height=500, width=500');
            a.document.write('<html>');
            a.document.write('<body><center> <iframe src="inc/qrgen.php?code=<?php echo $schnitzel_qrcode; ?>"></iframe>');
            a.document.write('<center></body></html>');
            await delay(2000);
            a.document.close();
            a.print();
        }
    </script>
<br>
<h1 class="h1">Your QR-Code</h1>


<br /><br />
<div id="GFG" style="">
          <hr />
          <iframe src="inc/qrgen.php?code=<?php echo $schnitzel_qrcode; ?>"></iframe>
        <br /><br />
      <input class="btn btn-success" type="button" value="Print" onclick="printDiv()">
<br /><hr /><br />
<button class="btn btn-info" onclick="goBack()">Back</button>

<script>
function goBack() {
  window.history.back();
}
</script>
</center>