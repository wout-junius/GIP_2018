<?php
session_start();
if (isset($_SESSION["name"])) {
    if ($_SESSION["role"] == 0) {
        echo ('Excist 0');
    } else if ($_SESSION["role"] == 1) {
        echo ('Excist 1');
    } else if ($_SESSION["role"] == 2){
        echo ('Excist 2');
    }else{
        echo ('geen rol');
    }
} else {
    echo ('nope');
}
?>