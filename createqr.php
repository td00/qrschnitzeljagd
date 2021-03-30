
<?php 

/*
author: Thies Müller
contact: contactme@td00.de
source: https://github.com/td00/loginpagefoo
license: AGPL 3.0
*/
session_start(); //everytime we want to use $_SESSION or features regarding a valid session we need to start this
include 'db.inc.php'; //this is used to establish database connections thruout the app

/*
after this were building the default html page
We're using some bootstrap stuff here and later on for design purposes. Otherwise this pages would look like shit.
*/


$showFormular = true; //default: render the form



if(isset($_GET['createqr'])) { //checking if "?createqr=1" is set in the url. used to have the registration on the same page
    $error = false; //per default no error.
    $from = $_POST['from']; //get the variable for the email
    $to = $_POST['to']; //same for username
    $text = $_POST['text']; //same for givenName
    $location = $_POST['location']; //same for lastName
    $qrcode = $_POST['']; //same for password
    $password_confirm = $_POST['password_confirm']; //same for password_confirm
    
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
    

    if(!$error) { //if no error uccored until now do the following:
        $statement = $pdo->prepare("SELECT * FROM users WHERE email = :email"); //check if the email address is already registered
        $result = $statement->execute(array('email' => $email));
        $user = $statement->fetch();
        
        if($user !== false) { //if the query above does return something in the $user array, print an error
            echo '<div class="alert alert-danger" role="alert">already a user here</div><br>';
            $error = true;
        }    
    }

    if(!$error) { 
        $statement = $pdo->prepare("SELECT * FROM users WHERE username = :username"); //check if the username is already registered
        $result = $statement->execute(array('username' => $username));
        $user = $statement->fetch();
        
        if($user !== false) { //if the query above does return something in the $user array, print an error
            echo 'already a user here<br>';
            $error = true;
        }    
    }
    
    if(!$error) {    //if no error occured until now, proceed
        $password_hash = password_hash($password, PASSWORD_DEFAULT); //lets hash the password with the default php function. this suffices for now.
        
        //this is the giant mysql statement placing everything from the user input in the database:
        //(also we're placing "isadmin"="0" & "activated"="0" at this point.)
        $statement = $pdo->prepare("INSERT INTO users (email, username, givenName, activated, isadmin, lastName, password) VALUES (:email, :username, :givenName, '0', '0', :lastName, :password)");
        $result = $statement->execute(array('email' => $email, 'username' => $username, 'givenName' => $givenName, 'lastName' => $lastName, 'password' => $password_hash));
        
        if($result) {        
            echo '<div class="alert alert-success" role="alert">successfull registered. <a href="login.php">Login</a></div><meta http-equiv="refresh" content="1; URL=login.php">'; //if this was successfull, go to the login page.
            $showFormular = false; //also dont print the form again, if we're registered.
        } else {
            echo 'Error. Please try again!<br>'; //else, print the form and try again
        }
    } 
}
 
if($showFormular) { //this prints the form which begins after the closing brackets of php
?>
<script src="ressources/js/bootstrap.min.js"></script>
<div class="jumbotron jumbotron-fluid">
  <div class="container">
<form action="?register=1" method="post">

<div class="form-group">
<label for="email">Email address</label>
<input type="email" class="form-control" size="40" id="email" placeholder="invalid@example.com" name="email">
</div>

<div class="form-group">
<label for="username">Username</label>
<input type="text" class="form-control" size="40" id="username" placeholder="Username" name="username">
</div>

<div class="form-group">
<label for="givenName">Given Name</label>
<input type="text" class="form-control" size="40" id="givenName" placeholder="Martha" name="givenName">
</div>
<div class="form-group">
<label for="lastName">Family Name</label>
<input type="text" class="form-control" size="40" id="lastName" placeholder="Musterfrau" name="lastName">
</div>

<div class="form-group">
<label for="password">Password</label>
<input type="password" class="form-control" size="40" id="password" placeholder="Please enter password" name="password">
</div>

<div class="form-group"> 
<label for="password_confirm">Password (again):</label>
<input type="password" class="form-control" id="password_confirm" size="40" name="password_confirm" placeholder="Please confirm password">
</div>
 
<button type="submit" class="btn btn-primary">Register</button>

</form>
 </div></div>
<?php
} //we need to close the if statement again.
?>
 
</body>
</html>
