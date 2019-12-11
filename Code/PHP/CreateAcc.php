<?php
    $Naam       = $_POST['naam'];
    $Voornaam   = $_POST['voornaam'];
    $Email      = $_POST['email'];
    $Password   = $_POST['password'];
    
    $Password = md5($Password);

    include 'Connection.php';
    
    $sql = 'INSERT INTO gebruiker(UserName,Naam,Voornaam,UserRol, Wachtwoord, email) VALUES ("'.$Voornaam.'.'.$Naam.'","'.$Naam.'","'.$Voornaam.'",0,"'.$Password.'","'.$Email.'");';

    if (mysqli_query($conn, $sql)){
        echo"Account Created";
    } else {
        echo "Error: ". $sql . "<br>" . mysqli_error($conn);
    }
    mysqli_close($conn);
?>
