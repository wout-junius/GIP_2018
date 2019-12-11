<?php
include 'Connection.php';
session_start();
    unset($_SESSION['name']);
    unset($_SESSION['lvl']);
    echo "Logged out";
    session_destroy();
mysqli_close($conn);
?>