<?php
      //Include the necessary library for Ubuntu
      include('/usr/share/phpqrcode/qrlib.php');
      $qrcode = $_GET["data"];
      $server = $_SERVER["SERVER_NAME"];
      $code = "https://".$server."/found.php?code=".$qrcode;
      //Set the data for QR
      $text = $code;
      //Set the filename with unique id
      $filename = $qrcode.".png";
      //Set the error correction Level('L')
      $e_correction = 'L';
      //Set pixel size
      $pixel_size = 12;
      //Set the frame size
      $frame_size = 8;
      //Generates QR image
      QRcode::png($text, $filename, $e_correction, $pixel_size, $frame_size);
      //Display the QR image
      echo "<img src='".$filename."'>";

    echo $qrcode;
    echo "<br>";
    echo $server;
    echo "<br>";
    echo $code;
    echo "<br><hr><br>";
?>

