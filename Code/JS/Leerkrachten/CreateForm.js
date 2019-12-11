var size;
var usednaam;
function Naamcheck() {
  usednaam = $("#naam").val();
  var jaar = $("#jaar").val();
  var vorm = $("#vorm").val();
  var vak = $("#vak").val();
  size = $("#size").val();
  $.post(
    "../PHP/Leerkrachten/CreateGame.php",
    {
      naam: usednaam,
      jaar: jaar,
      vorm: vorm,
      vak: vak
    },
    function(data) {
      if (data == "taken") {
        alert("Naam al in gebruik");
        return false;
      } else if (data == "Created") {
        alert("Oefening aangemaakt");

        $("#Menu").fadeOut(0, function() {
          $("#Menu").load("vraaginput.php #Optie", function() {
            var Fouthtml = "<div>Fout</div>";
            var Juisthtml = "<div>Juist</div>";
            var vraaghtml = "<div>Vraag</div>";
            for (var i = 0; i < size; i++) {
              vraaghtml +=
                '<div><input style="width: 90%;" type="text"/ id="' +
                i +
                'vraag"></div>';
              Juisthtml +=
                '<div><input style="width: 90%;" type="text"/ id="' +
                i +
                'juist"></div>';
              Fouthtml +=
                '<div><input style="width: 90%;" type="text"/ id="' +
                i +
                'fout"></div>';
            }
            $("#vraag").html(vraaghtml);
            $("#juist").html(Juisthtml);
            $("#fout").html(Fouthtml);

            $("#Menu").fadeIn(0);
          });
        });
      }
    }
  );
}
function input() {
  var sql = "INSERT INTO opties(juist, fout, vraag, Game_ID) VALUES";
  var id;
  $.post(
    "../PHP/Leerkrachten/GetGameID.php",
    {
      Naam: usednaam
    },
    function(data) {
      id = data;
      
      sql +=
        ' ("' +
        $("#0juist").val() +
        '","' +
        $("#0fout").val() +
        '","' +
        $("#0vraag").val() +
        '",'+ id + ')';

      for (var i = 1; i < size; i++) {
        sql +=
          ' ,("' +
          $("#" + i + "juist").val() +
          '","' +
          $("#" + i + "fout").val() +
          '","' +
          $("#" + i + "vraag").val() +
          '",' +
          id +
          ')';
      }

      $.post(
        "../PHP/Leerkrachten/CreateOpties.php",
        {
          sql: sql
        },
        function(data) {
          if (data == "Created") {
            alert("Created");
            window.location.href = "../home.php";
          } else {
            alert("Something whent wrong");
          }
        }
      );
    }
  );
}

$(document).on("click", "#Logout", function() {
  $.post("../PHP/logout.php", function(data) {
    alert(data);

    window.location.reload(true);
  });
});
