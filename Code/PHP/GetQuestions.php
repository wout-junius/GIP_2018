<?php
include 'Connection.php';

$id = $_POST["id"];
$sql = 'SELECT * FROM `opties` WHERE Game_ID = '.$id.';';
$questions = array();

$result= mysqli_query($conn,$sql);
while($row = mysqli_fetch_assoc($result)){
    $questions[] = $row;
}
echo json_encode($questions);
?>