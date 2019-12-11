<?php
include '../Connection.php';
$sql = $_POST['sql'];

if (mysqli_query($conn, $sql)) {
    echo true;
} else {
    echo("Error description: " . mysqli_error($conn));
}


?>