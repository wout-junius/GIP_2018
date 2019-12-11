<?php
//        error_reporting(0);
//        ini_set('display_errors', null);
        
        include 'Connection.php';
        

        $jaar               = $_POST['Jaar'];
        $vorm               = $_POST['Vorm'];
        $vak                = $_POST['Vak'];   


        $sql = 'SELECT Game_Name, Game_URL, Game_ID FROM games WHERE Jaar = \''.$jaar.'\' && vorm = "'.$vorm.'" && Active = true;';
            
        $result = mysqli_query($conn,$sql);
        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)){
    
                //     echo "<button id=\"button".$row['Game_Name']."\" onclick = \"loadGame(".$row['Game_ID'].",\"".$row['Game_URL']."\")\"> ".$row['Game_Name']."</button><br>";
                echo '<button id="button" style="margin-bottom: 8px;" onclick = "loadGame('.$row['Game_ID'].',\''.$row['Game_URL'].'\')">' .$row['Game_Name'].'</button><br>';
            }
        }else{
            echo 'Geen oefening voor jou.';
        }
        mysqli_close($conn);
?>