<html>
    <head>
        <link rel="stylesheet" type="text/css" href="Stijlhome.css">
        <link href="https://fonts.googleapis.com/css?family=Acme" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Chicle" rel="stylesheet">
        <?php session_start(); ?>
    </head>
<body>
    <div id="body">
        <div class="Oefening">
        <p id="vraag">Test</p>
            
        <button class="button" id="Option1" onclick="Optionbutton(1)"  style="margin-top: 20px; margin-bottom: 20px;"> </button>
            
        <button class="button" id="Option2" onclick="Optionbutton(2)" > </button><br>
            
        <button class="button" id="Nextbutton" onclick="next()" style="display: none; margin-bottom: 20px;">Next</button>
        <p id="Score">0</p>
            </div>
    </div>
    
    <div id="Acc"></div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
var rol = <?php echo($_SESSION['role'])?> ;
</script>
<script src="JS/Oefeningen/Oefening1Script.js"></script>

</body>
</html>