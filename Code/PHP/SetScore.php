<?php
include 'Connection.php';
session_start();
$score =$_POST['score'];
$UserID = $_SESSION['id'];
$gameID =$_POST['gameID'];

$sql = "SELECT * FROM score WHERE Game_ID = ".$gameID." && User_ID = ".$_SESSION['id'].";";                                                                                                                                    
$result = mysqli_query($conn,$sql);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        if($row['Score_'] < $score){

            $sql = 'UPDATE `score`SET Score_ = '.$score.' WHERE Score_ID = '.$row['Score_ID'].';';
            if (mysqli_query($conn, $sql)){
                echo"Score Set";
            } else {
                echo "Error: ". $sql . "<br>" . mysqli_error($conn);
            }
        }
    }
}else{
    $sql = 'INSERT INTO `score`(`Score_`, `Game_ID`, `User_ID`) VALUES ('.$score.','.$gameID.','.$UserID.');';
    if (mysqli_query($conn, $sql)){
        echo"Score Set";
    } else {
        echo "Error: ". $sql . "<br>" . mysqli_error($conn);
    }
}
?>