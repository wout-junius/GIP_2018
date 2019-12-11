<!DOCTYPE HTML>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../Stijlhome.css">
    <link href="https://fonts.googleapis.com/css?family=Acme" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Chicle" rel="stylesheet">
    </head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="../JS/Leerkrachten/CreateForm.js"></script>   
    <body>
        <div class="bodyBack" id="Menu"  style="top:30%; padding-bottom:20px">
            <div class="bodytext" style="margin-top: 20px; font-size: 200%;">
                <form id="CForm">
                    Oefening: <input type="text" id="naam" name="Naam"/> <br>
                    Studiejaar:
                    <select id="jaar">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                    </select>
                    <br>
                    Opleidingsvorm: 
                    <select id="vorm">
                        <option value="ASO">ASO</option>
                        <option value="TSO">TSO</option>
                        <option value="BSO">BSO</option>
                        <option value="KSO">KSO</option>
                    </select>
                    <br>
                    Vak
                    <select id="vak">
                        <option value="Frans">Frans</option>
                        <option value="Nederlands">Nederlands</option>
                        <option value="Engels">Engels</option>
                        <option value="Wiskunde">Wiskunde</option>
                    </select>
                    <br>
                    Aantal vragen: <input type="number" id="size" size="10"><br>
                </form>
                <button style="font-size: 100%;" onclick="Naamcheck();"> Volgende </button>
            </div>
        </div>
       
             <div id="AccountBox">
    <div class="Account">
        <?php
        session_start();
        $naam  = $_SESSION['name'];
    ?>
            <div class="Naam">
                <?php echo $_SESSION['name'];  ?> <br>
                <?php if($_SESSION['role'] == 0){
                    echo 'student';
                }elseif($_SESSION['role'] == 1){
                    echo 'Leerkracht';
                }elseif($_SESSION['role'] == 2){
                    echo 'Admin';
                }  ?><br>
                <button id="Logout"> LogOut</button>
            </div>
        </div>
    </div>

    </body>
</html>
