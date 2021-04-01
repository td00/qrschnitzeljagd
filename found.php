<?php

include 'preview.php';
//update the counter

$statement = $pdo->prepare("UPDATE codes SET schnitzel_counter = :schnitzel_counter WHERE id = :schnitzel_id");
 $result = $statement->execute(array('schnitzel_id'=> $schnitzel_id, 'schnitzel_counter'=> $schnitzel_counter ));
