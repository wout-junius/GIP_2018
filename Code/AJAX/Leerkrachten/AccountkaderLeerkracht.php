<html>
<body>
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