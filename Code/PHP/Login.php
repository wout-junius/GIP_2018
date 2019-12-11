<?php
include 'Connection.php';

$Naam = $_POST['naam'];
$password = md5($_POST['password']);

$sql = 'SELECT DISTINCT * FROM `gebruiker` WHERE UserName = "' . $Naam . '";';

$result = mysqli_query($conn, $sql);
if ($result->num_rows > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        if ($row['Wachtwoord'] == $password) {
            session_start();
            $naam = $row['Voornaam'];
            $lvl = $row['Lvl'];
            $role = $row['UserRol'];
            $id = $row['User_ID'];


            $_SESSION['name'] = $naam;
            $_SESSION['role'] = $role;
            $_SESSION['id'] = $id;
            echo "Logged in " . $role;
        } else {
            echo "password wrong";
        }
    }
} else {
    echo "Account not known";
}
mysqli_close($conn);
?>