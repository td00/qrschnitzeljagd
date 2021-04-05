<?php
include 'inc/header.php';
$schnitzel_qrcode = $_GET['code'];
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
<center>
<script>
        function printQR() {
            var divContents = document.getElementById("QR").innerHTML;
            var a = window.open('', '', 'height=500, width=500');
            a.document.write('<html>');
            a.document.write('<body><center> <iframe src="inc/qrgen.php?code=<?php echo $schnitzel_qrcode; ?>"></iframe>');
            a.document.write('</center></body></html>');
            a.document.close();
            a.print();
        }
    </script>
    <script>
      function printQRText() {
          var divContents = document.getElementById("QRText").innerHTML;
          var a = window.open('', '', 'height=500, width=500');
            a.document.write('<html>');
            a.document.write('<body><center> <iframe src="inc/qrgen.php?code=<?php echo $schnitzel_qrcode; ?>"></iframe>');
            a.document.write('<br>');
            a.document.write('Hi <?php echo $schnitzel_to; ?>!<br>');
            a.document.write('Just scan the QR Code above! :)')
            a.document.write('</center></body></html>');
            a.document.close();
            a.print();
      }
<br>
<h1 class="h1">Your QR-Code</h1>


<br /><br />
<div id="QR" style="">
</div>
<div id="QRText" style="">
</div>
          <hr />
          <iframe src="inc/qrgen.php?code=<?php echo $schnitzel_qrcode; ?>"></iframe>
        <br /><br />
      <input class="btn btn-success" type="button" value="Print QR Only" onclick="printQR()">
      <br>
      <input class="btn btn-success" type="button" value="Print QR & Text" onclick="printQRText()">
<br /><hr /><br />
<button class="btn btn-info" onclick="goBack()">Back</button>

<script>
function goBack() {
  window.history.back();
}
</script>
</center>