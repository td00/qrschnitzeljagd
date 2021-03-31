
<?php 

/*
author: Thies Müller
contact: contactme@td00.de
source: https://github.com/td00/loginpagefoo
license: AGPL 3.0
*/
session_start(); //everytime we want to use $_SESSION or features regarding a valid session we need to start this
include 'inc/db.php'; //this is used to establish database connections thruout the app

/*
after this were building the default html page
We're using some bootstrap stuff here and later on for design purposes. Otherwise this pages would look like shit.
*/


$showFormular = true; //default: render the form

    //this function has worked in the past. why should it fail me now?!
    function random_string() {
        if(function_exists('random_bytes')) {
            $bytes = random_bytes(16);
            $str = bin2hex($bytes); 
        } else if(function_exists('openssl_random_pseudo_bytes')) {
            $bytes = openssl_random_pseudo_bytes(16);
            $str = bin2hex($bytes); 
        } else if(function_exists('mcrypt_create_iv')) {
            $bytes = mcrypt_create_iv(16, MCRYPT_DEV_URANDOM);
            $str = bin2hex($bytes); 
        } else {
           //this should be a unique string. if we use this in prod we should change this.
            $str = md5(uniqid('thisisnotreallyrandombutthisstringheresomakethislongandmaybewith12345numberskthxbye', true));
        } 
    return $str;
   }

if(isset($_GET['createqr'])) { //checking if "?createqr=1" is set in the url. used to have the registration on the same page
    $error = false; //per default no error.
    $from = $_POST['from']; //get the variable for the email
    $to = $_POST['to']; //same for username
    $text = $_POST['text']; //same for givenName
    $location = $_POST['location']; //same for lastName
    $qrcode = random_string();

   if(!$error) { //if no error uccored until now do the following:
    $statement = $pdo->prepare("SELECT * FROM codes WHERE qrcode = :qrcode"); //check if the qrcode is already registered
    $result = $statement->execute(array('qrcode' => $qrcode));
    $user = $statement->fetch();
    
    if($user !== false) { //if the query above does return something in the $user array, print an error
        echo '<div class="alert alert-danger" role="alert">QRCode already in use</div><br>';
        $error = true;
    }    
}

   
    if(!$error) {    //if no error occured until now, proceed
        $qrcode = password_hash($password, PASSWORD_DEFAULT); //lets hash the password with the default php function. this suffices for now.
        
        
    } 
}
 if (!$error) {
        $statement = $pdo->prepare("INSERT INTO codes (qrcode, from, to, text, location, counter) VALUES (:qrcode, :from, :to, :text, :location, '0')");
        $result = $statement->execute(array('qrcode' => $qrcode, 'from' => $from, 'to' => $to, 'text' => $text, 'location' => $location));
        
        if($result) {        
            echo '<div class="alert alert-success" role="alert">successfull registered. <a href="found.php?code='.$qrcode.'">Look at the result</a></div><meta http-equiv="refresh" content="1; URL=fround.php?code='.$qrcode.'">'; //if this was successfull, go to the login page.
            $showFormular = false; //also dont print the form again, if we're registered.
        } else {
            echo 'Error. Please try again!<br>'; //else, print the form and try again
        }
 }
if($showFormular) { //this prints the form which begins after the closing brackets of php
?>
<script src="ressources/js/bootstrap.min.js"></script>
<div class="jumbotron jumbotron-fluid">
  <div class="container">
<form action="?register=1" method="post">

<div class="form-group">
<label for="from">from</label>
<input type="text" class="form-control" size="40" id="from" placeholder="Your Name" name="from">
</div>

<div class="form-group">
<label for="to">to</label>
<input type="text" class="form-control" size="40" id="to" placeholder="Receipients Name" name="to">
</div>

<div class="form-group">
<label for="givenName">text</label>
<input type="text" class="form-control" size="40" id="text" placeholder="You found the qr code! Jay!" name="text">
</div>
<div class="form-group">
<label for="lastName">location</label>
<input type="text" class="form-control" size="40" id="location" placeholder="Under the kitchen sink" name="location">
</div>
 
<button type="submit" class="btn btn-primary">Create</button>

</form>
 </div></div>
<?php
} //we need to close the if statement again.
?>
 
</body>
</html>
