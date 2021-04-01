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
            a.document.write('<body > ');
            a.document.write(divContents);
            a.document.write('</body></html>');
            a.document.close();
            a.print();
        }
    </script>
<br>
<h1 class="h1">Your QR-Code</h1>


<br /><br />
<div id="GFG" style="background-color: green;">
          
          <iframe id="printf" src="inc/qrgen.php?code=<?php echo $schnitzel_qrcode; ?>"></iframe>
        
      <button class="btn btn-success"><input type="button" value="click" onclick="printDiv()"></button>
<br /><hr /><br /><br /><br />
<button class="btn btn-info" onclick="goBack()">Back</button>

<script>
function goBack() {
  window.history.back();
}
</script>
</center>