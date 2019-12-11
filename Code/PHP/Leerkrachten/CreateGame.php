<?php

include '../Connection.php';
session_start();
$Naam = $_POST['naam'];
$jaar = $_POST['jaar'];
$vorm = $_POST['vorm'];
$vak = $_POST['vak'];

$sql = 'SELECT * FROM games WHERE Game_Name = "'.$Naam.'"';

$result = mysqli_query($conn, $sql);
// var_dump($result);

if ($result->num_rows <= 0) {

    $sql = 'INSERT INTO `games`(`Game_Name`,`Active`, `Game_URL`, `Jaar`, `vorm`, `vak`, `Leerkracht_ID`, `uitleg`) 
        VALUES ("' . $Naam . '",1,"2Opties.php","' . $jaar . '","' . $vorm . '","' . $vak . '",' . $_SESSION['id'] . ',"")';

    if (mysqli_query($conn, $sql)) {
         echo "Created";
    } else {
        echo $sql;
    }
}else{
    echo "taken";
    
}

?>