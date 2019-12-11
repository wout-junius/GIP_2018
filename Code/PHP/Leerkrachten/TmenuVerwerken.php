<?php
//        error_reporting(0);
//        ini_set('display_errors', null);
session_start();
include '../Connection.php';

$id = $_SESSION['id'];


$sql = 'SELECT Game_Name, Game_URL, Game_ID FROM games WHERE Leerkracht_ID =  ' . $id . ' && Active = true;';

$result = mysqli_query($conn, $sql);

$html1 = '<div id="Naam"style="font-size: 60%; width:50%; padding-top: 15px; float:left;">';
$html2 = '<div style="width:50%; float:right;">';

if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {

                $html1 .= '<div class="NaamO">' . $row['Game_Name'] . "</div>";
                $html2 .= '<div><a onclick = "loadGame('.$row['Game_ID'].',\''.$row['Game_URL'].'\')"><img src="img/Button1.png" height="30" width="30" style="margin-right: 3px;"></a>
                <a onclick = "ScoreGame('.$row['Game_ID'].')"><img src="img/Button2.png" height="30" width="30" style="margin-right: 3px;"></a>
                <a onclick = "EditGame('.$row['Game_ID'].',\''.$row['Game_Name'].'\')"> <img src="img/Button4.png" height="30" width="30"></div> </a>';
        }
}
$html1 .= '<div style="padding-top: 23px;"><a href="Leerkracht/NewGameForm.php"><img src="img/Button3.png" height="30" width="30"></a></div>';
$html1 .= '</div>';
$html2 .= '</div>';

echo($html1.$html2);
mysqli_close($conn);
?>
 