<!DOCTYPE HTML>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../Stijlhome.css">
    <link href="https://fonts.googleapis.com/css?family=Acme" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Chicle" rel="stylesheet">
    </head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="../JS/Leerkrachten/Score.js"></script>   

    <body>
        <div class="bodyBack" id="Menu"  style="top:30%; padding-bottom:20px">
            <div class="bodytext" style="margin-top: 20px; font-size: 200%;">
                <div id="fill">

                </div>
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
 