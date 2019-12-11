<?php
include '../Connection.php';

$sql = "SELECT * FROM gebruiker";
$result = mysqli_query($conn, $sql);
$UsernameHTML = '<div style="width:25%; float:left; margin-left:5%;margin-bottom:2%;" id="Username">
<div style="color: #46913E;"> Naam </div>';

$RolHTML = '<div style="width:25%; float:right;" id="Rol">
<div style="color: #46913E;"> Rol </div>';

$ResetHTML = '<div style="width:15%; float:right; id="Reset">
<div style="color: #46913E;"> Reset </div>';

$ActiveHTML = '<div style="width:15%; float:right; margin-right:15px;" id="Active">
<div style="color: #46913E;"> Active </div>';

if ($result->num_rows > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $UsernameHTML .= '<div class="AdminBtn">' . $row['UserName'] . '</div>';

        if ($row['UserRol'] == 0) {
            $RolHTML .= '<div><button class="AdminBtn Rollbtn" id="Ro' . $row['User_ID'] . '1" onclick="Rol(' . $row['User_ID'] . ',0);" style="background: green;">1</button>
                     <button class="AdminBtn Rollbtn" id="Ro' . $row['User_ID'] . '2" onclick="Rol(' . $row['User_ID'] . ',1);">2</button>
                     <button class="AdminBtn Rollbtn" id="Ro' . $row['User_ID'] . '3" onclick="Rol(' . $row['User_ID'] . ',2);">3</button></div>';
        } else if ($row['UserRol'] == 1) {
            $RolHTML .= '<div><button class="AdminBtn Rollbtn" id="Ro' . $row['User_ID'] . '1" onclick="Rol(' . $row['User_ID'] . ',0);">1</button>
                     <button class="AdminBtn Rollbtn" id="Ro' . $row['User_ID'] . '2" onclick="Rol(' . $row['User_ID'] . ',1);" style="background: green;">2</button>
                     <button class="AdminBtn Rollbtn" id="Ro' . $row['User_ID'] . '3" onclick="Rol(' . $row['User_ID'] . ',2);">3</button></div>';
        } else if ($row['UserRol'] == 2) {
            $RolHTML .= '<div><button class="AdminBtn Rollbtn" id="Ro' . $row['User_ID'] . '1" onclick="Rol(' . $row['User_ID'] . ',0);">1</button>
                     <button class="AdminBtn Rollbtn" id="Ro' . $row['User_ID'] . '2" onclick="Rol(' . $row['User_ID'] . ',1);">2</button>
                     <button class="AdminBtn Rollbtn" id="Ro' . $row['User_ID'] . '3" onclick="Rol(' . $row['User_ID'] . ',2);" style="background: green;" >3</button></div>';
        }


        $ResetHTML .= '<div><button class="AdminBtn" id="Re' . $row['User_ID'] . '" onclick="Reset(' . $row['User_ID'] . ');">Reset</button></div>';

        if($row['Active'] == 1){
            $ActiveHTML .= '<div><button class="AdminBtn" id="Ac' . $row['User_ID'] . '" onclick="Active(' . $row['User_ID'] . ',1);">Active</button></div>';
        }else{
            $ActiveHTML .= '<div><button class="AdminBtn" id="Ac' . $row['User_ID'] . '" onclick="Active(' . $row['User_ID'] . ',2);">Inacitve</button></div>';
        }
    }
    $UsernameHTML .= '</div>';
    $RolHTML .= '</div>';
    $ResetHTML .= '</div>';
    $ActiveHTML .= '</div>';

    $HTML = $UsernameHTML . $RolHTML . $ResetHTML . $ActiveHTML;

    echo $HTML;
}

?>