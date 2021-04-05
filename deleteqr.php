
<?php 

/*
author: Thies Müller
contact: contactme@td00.de
source: https://github.com/td00/loginpagefoo
license: AGPL 3.0
*/
include 'inc/header.php'; //this is used to establish database connections thruout the app

/*
after this were building the default html page
We're using some bootstrap stuff here and later on for design purposes. Otherwise this pages would look like shit.
*/


$schnitzel_id = $_GET['sid'];

$statement = $pdo->prepare("SELECT * FROM codes WHERE id = :schnitzel_id"); //check if the qrcode is already registered
$result = $statement->execute(array('schnitzel_id' => $schnitzel_id));
$user = $statement->fetch();

$schnitzel_from = $user['schnitzel_from'];
$schnitzel_qrcode = $user['schnitzel_qrcode'];
$schnitzel_text = $user['schnitzel_text'];
$schnitzel_to = $user['schnitzel_to'];
$schnitzel_location = $user['schnitzel_location'];
$schnitzel_old_counter = $user['schnitzel_counter'];

?>



$showFormular = true; //default: render the form

   
if(isset($_GET['deleteqr'])) { //checking if "?deleteqr=1" is set in the url. used to have the registration on the same page
        //this function has worked in the past. why should it fail me now?!


 if (!$error) {
     $statement = $pdo->prepare("DELETE FROM codes WHERE id=:schnitzel_id");
     $result = $statement->execute(array('schnitzel_id' => $schnitzel_id));
     
    if($result) {        
        echo '<div class="alert alert-success" role="alert">successfull deleted. <a href="/">Go Home</a></div><meta http-equiv="refresh" content="0.5; URL=/">'; //if this was successfull, go to the login page.
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
<form action="?generate=1" method="post">




<h1>Delete?</h1>
<h3>Do you really want to delete Schnitzel <?php echo $schnitzel_id; ?> with the following content: </h3>
<br>

<?php
echo "<br/>";
//lets build a table with infos:
echo '<table class="table table-dark table-striped" style="width:30%">';
echo "<tr>";
echo "<td>";
echo "From:";
echo "</td>";
echo "<td>";
echo $schnitzel_from;
echo "</td>";
echo "</tr>";
echo "<tr>";
echo "<td>";
echo "To:";
echo "</td>";
echo "<td>";
echo $schnitzel_to;
echo "</td>";
echo "</tr>";
echo "<tr>";
echo "<td>";
echo "Message:";
echo "</td>";
echo "<td>";
echo $schnitzel_text;
echo "</td>";
echo "</tr>";
echo "<tr>";
echo "<td>";
echo "Location:";
echo "</td>";
echo "<td>";
echo $schnitzel_location;
echo "</td>";
echo "</tr>";
echo "<tr>";
echo "<td>";
echo "Already found:";
echo "</td>";
echo "<td>";
if ($schnitzel_old_counter == 0) { //if not admin, print "User" in green
    echo '<p class="text-success"><b>No<b></p><br>';
}
else { 
    echo '<p class="text-danger"><b>Yes<b> <i>('.$schnitzel_old_counter.' times)</i></p>';
}
echo "</td>";
echo "</tr>";
?>
</table>

<br /> <br /><br />

</table>







<button type="submit" class="btn btn-danger">Delete</button>

<a href="javascript:history.back()"><button class="btn btn-info">Dont Delete</button></a>

</form>
 </div></div>
<?php
echo $qrcode;
} //we need to close the if statement again.
?>
 
</body>
</html>
