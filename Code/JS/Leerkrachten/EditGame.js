$(function() {
  var result = {};
  var ids = {};
  var sql = "";
  var total;
  var Gameid = localStorage.getItem("id");
  var name = localStorage.getItem("name");
  $.post(
    "../PHP/GetQuestions.php",
    {
      id: Gameid
    },
    function(data) {
      //data opslitsen in een array
      result = JSON.parse(data);
      total = result.length;

      var Fouthtml = "<div>Fout</div>";
      var Juisthtml = "<div>Juist</div>";
      var vraaghtml = "<div>Vraag</div>";

      for (var i = 0; i < total; i++) {
        var index = result[i];
        ids[i] = index.choise_ID;
        vraaghtml +=
          '<div> <input style="width: 90%;" type="text"/ id="' +
          i +
          'vraag" value="' +
          index.vraag +
          '"></div>';
        Juisthtml +=
          '<div><input style="width: 90%;" type="text"/ id="' +
          i +
          'juist" value="' +
          index.juist +
          '"></div>';
        Fouthtml +=
          '<div><input style="width: 90%;" type="text"/ id="' +
          i +
          'fout" value="' +
          index.fout +
          '"></div>';
      }

      $("#vraag").html(vraaghtml);
      $("#juist").html(Juisthtml);
      $("#fout").html(Fouthtml);
      localStorage.clear();
    }
  );

  $("#save").click(function() {
    for (var i = 0; i < total; i++) {
      sql +=
        "UPDATE `opties` SET " +
          "`juist` = '" + $("#" + i + "juist").val() + "', " +
          "`fout` = '" + $("#" + i + "fout").val() + "', " +
          "`vraag` = '" + $("#" + i + "vraag").val() + "' " +
          "WHERE `choise_ID`= " + ids[i] + ";\n";
    }
    $.post("../PHP/Leerkrachten/EditOpties.php", { sql: sql }, function(
      data
    ) {
      if (data == "Created") {
        alert("updated");
        localStorage.setItem("id", Gameid);
        localStorage.setItem("name", name);
        location.reload();
      } else {
        console.log(data);
      }
    });
  });

  $("#remove").click(function() {
    sql = "UPDATE games SET Active = 0 WHERE Game_ID = " + Gameid + ";";
    $.post("../PHP/Leerkrachten/EditOpties.php", { sql: sql }, function(
        data
      ) {
        if (data == "Created") {
          alert("removed");
          
        } else {
          console.log(data);
        }
      });
  });

  $("#cancel").click(function() {
      window.location.href = "../home.php";
  });
});

$(document).on("click", "#Logout", function() {
  $.post("../PHP/logout.php", function(data) {
    alert(data);

    window.location.reload(true);
  });
});