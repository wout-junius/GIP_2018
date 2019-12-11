<!DOCTYPE HTML>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../Stijlhome.css">
    <link href="https://fonts.googleapis.com/css?family=Acme" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Chicle" rel="stylesheet">
    </head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="../JS/Leerkrachten/EditGame.js"></script>   
    <body>
        <div class="bodyBack" id="Menu"  style="top:30%; padding-bottom:20px">
            <div class="bodytext" style="margin-top: 20px; font-size: 200%;">
                <form id="fill">

                    <div style="width:33%; float:left;" id="vraag">
                    <!-- Hier komt de vraag kolom (via JS)-->
                    </div>

                    <div style="width:33%; float:right;" id="fout">
                        <!-- Hier komt de Fouten kolom (via JS)-->
                    </div>

                    <div style="width:33%; float:right;" id="juist">
                        <!-- Hier komt de Juisten kolom (via JS)-->
                    </div>

                    <!-- <input type="submit" value="Create" > -->
                    <!-- alle Inserts maken in Javascript en als 1 doorsturen naar php -->
                </form>
                <button id="cancel">Annuleer</button>
                <button id="save">Opslaan</button>
                <button id="remove">Verwijder</button>
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
 