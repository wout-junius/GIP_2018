<?php

include '../Connection.php';
session_start();
$Naam = $_POST['Naam'];
$sql = 'SELECT * FROM games WHERE Game_Name = "' . $Naam . '"';

$result = mysqli_query($conn, $sql);

if ($result->num_rows >= 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo $row['Game_ID'];
    }
}
?>