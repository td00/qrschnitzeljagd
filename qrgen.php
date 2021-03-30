<?php
    //Include the necessary library for Ubuntu
    include('/usr/share/phpqrcode/qrlib.php');
    //Set the data for QR
    $qrcode = $_GET["data"];
    $server = $_SERVER["SERVER_NAME"];
    $code = "https://".$server."/found.php?code=".$qrcode;
    //check the class is exist or not
    if(class_exists('QRcode'))
    {
        //Generate QR
        QRcode::png($code);
    }else{
        //Print error message
        echo 'class is not loaded properly';
    }

    echo $qrcode;
    echo "<br>";
    echo $server;
    echo "<br>";
    echo $code;
    echo "<br><hr><br>";
?>
<!-- display the QR image -->
<img src="qrgen.php" />
