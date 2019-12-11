<?php
include '../Connection.php';
$Game_ID = $_POST['id'];

$sql = 'SELECT S.Score_ , U.UserName FROM score S, gebruiker U WHERE Game_ID = ' . $Game_ID . ' && S.User_ID = U.User_ID;';

$htmlNaam = '<div style="width:44%; float:left;" id="Leerling">
             <div style="color: #46913E;"> Score </div>';
$htmlScore = '<div style="width:44%; float:right;" id="score">
              <div style="color: #46913E;"> Score </div>';
$result = mysqli_query($conn, $sql);
if ($result->num_rows > 0) {
    $even = 0;
    while ($row = mysqli_fetch_assoc($result)) {
        if ($even % 2 == 1) {
            $htmlNaam .= '<div style="color: #E6B743;"> ' . $row['UserName'] . ' </div>';
            $htmlScore .= '<div style="color: #E6B743;"> ' . $row['Score_'] . ' </div>';
        } else{
            $htmlNaam .= '<div> ' . $row['UserName'] . ' </div>';
            $htmlScore .= '<div> ' . $row['Score_'] . ' </div>';
        }
        $even ++;
    }
    $htmlNaam .= '</div>';
    $htmlScore .= '</div>';

    $html = $htmlNaam . $htmlScore;
    echo $html;
} else {
    echo "No Score";
}

?>