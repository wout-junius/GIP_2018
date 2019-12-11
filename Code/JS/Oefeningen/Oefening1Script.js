//var done = [];
var result = {};
var question = {};

var wrong = [];
var right = [];

var score;
var total;
//Declareren vraag counter
$.post("PHP/SessionCheck.php", {}, function(data) {
  if (data != "Excist 1" && data != "Excist 0") {
    window.location.href = "Home.php";
  }
  $(document).ready(function() {});
  //Acc kader
  $("#Acc").load("AJAX/Accountkader.php #AccountBox", function() {
    $("#Acc").fadeIn(0);
  });

  //php uitvoeren
  $.post(
    "PHP/GetQuestions.php",
    {
      id: localStorage.getItem("id")
    },
    function(data) {
      //data opslitsen in een array
      result = JSON.parse(data);
      total = result.length;
      next();
    }
  );
});

function Optionbutton(sender) {
  score = parseInt(document.getElementById("Score").innerHTML);
  //value halen
  if (sender == 1) {
    var option = document.getElementById("Option1").value;
  } else if (sender == 2) {
    var option = document.getElementById("Option2").value;
  }

  //########//
  //#Cheken#//
  //########//
  if (option == "1") {
    if (sender == 1) {
      document.getElementById("Option1").style.backgroundColor = "#5aaa1d";
      right.push(question);
    } else {
      document.getElementById("Option2").style.backgroundColor = "#5aaa1d";
      right.push(question);
    }
    score++;
  } else {
    if (sender == 1) {
      document.getElementById("Option1").style.backgroundColor = "red";
      wrong.push(question);
    } else {
      document.getElementById("Option2").style.backgroundColor = "red";
      wrong.push(question);
    }
  }

  //###############//
  //#display score#//
  //###############//
  document.getElementById("Score").innerHTML = score;
  disableOptions();
  document.getElementById("Nextbutton").style.display = "inline";
}

function next() {
  if (result.length == 0) {
    done();
    return;
  }
  var id;
  id = Math.floor(Math.random() * result.length);

  question = result[id];

  //opvullen
  document.getElementById("Option1").style.backgroundColor = "lightgrey";
  document.getElementById("Option2").style.backgroundColor = "lightgrey";

  document.getElementById("Nextbutton").style.display = "none";
  enebleOptions();

  // check de ID uniek

  document.getElementById("vraag").innerHTML = question.vraag;

  var rdm = Math.floor(Math.random() * 2 + 1);

  if (rdm == 1) {
    document.getElementById("Option1").innerHTML = question.juist;
    document.getElementById("Option1").value = "1";
    document.getElementById("Option2").innerHTML = question.fout;
    document.getElementById("Option2").value = "2";
  } else {
    document.getElementById("Option1").innerHTML = question.fout;
    document.getElementById("Option1").value = "2";
    document.getElementById("Option2").innerHTML = question.juist;
    document.getElementById("Option2").value = "1";
  }
  var index = result.findIndex(function(e) {
    return e.choise_ID == question.choise_ID;
  });
  if (index > -1) {
    result.splice(index, 1);
  }
}

function done() {
  $("#body").fadeOut("slow", function() {
    $("#body").load("AJAX/Result.html #Result", function() {
      document.getElementById("punten").innerHTML = score;
      if (wrong.length > 0) {
        //fouten weergeven
        var htmlVraag;
        var htmlAntwoord;
        var even = 0;
        if (wrong.length < total / 3) {
          document.getElementById("Comentaar").innerHTML =
            "Goed zo nog een beetje oefenen!";
        } else if (wrong.length < total / 2) {
          document.getElementById("Comentaar").innerHTML = "nog wat oefenen.";
        } else {
          document.getElementById("Comentaar").innerHTML =
            "Leer dit toch maar eens opnieuw.";
        }
        htmlAntwoord =
          '<div class="Title" style="color: #46913E;">Antwoord</div>';
        htmlVraag = '<div class="Title" style="color: #46913E;">Vraag</div>';
        wrong.forEach(b => {
          if (even % 2 == 1) {
            htmlVraag += '<div style="color: #E6B743;">' + b.vraag + "</div>";
            htmlAntwoord +=
              '<div style="color: #E6B743;">' + b.juist + "</div>";
          } else {
            htmlVraag += "<div>" + b.vraag + "</div>";
            htmlAntwoord += "<div>" + b.juist + "</div>";
          }
          even++;
        });
        document.getElementById("vraagList").innerHTML = htmlVraag;
        document.getElementById("antwoordList").innerHTML = htmlAntwoord;
      } else {
        document.getElementById("Lijst").innerHTML =
          "Goed zo je hebt geen foute!";
      }
      if (rol == 0){
        $.post(
          "PHP/SetScore.php",
          { score: score, gameID: localStorage.getItem("id") },
          function(data) {
            localStorage.clear();
          }
        );
      }

      $("#body").fadeIn("slow");
    });
  });
}

function disableOptions() {
  document.getElementById("Option1").disabled = true;
  document.getElementById("Option2").disabled = true;
}

function enebleOptions() {
  document.getElementById("Option1").disabled = false;
  document.getElementById("Option2").disabled = false;
}
$(document).on("click", "#Logout", function() {
  $.post("PHP/logout.php", function(data) {
    alert(data);
    window.location.reload(true);
  });
});
