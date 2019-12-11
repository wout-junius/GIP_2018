//session check
$(document).ready(function() {
  $.post("PHP/SessionCheck.php", {}, function(data) {
    if (data == "Excist 0" /*Leerling*/) {
      LoadMenu();
    } else if (data == "Excist 1" /*Leerkracht*/) {
      LoadTMenu();
      $("#body").fadeOut(0, function() {
        $("#Acc").load(
          "AJAX/Leerkrachten/AccountkaderLeerkracht.php #AccountBox",
          function() {
            $("#Acc").fadeIn(0);
          }
        );
      });
    } else if (data == "Excist 2" /*Admin*/) {
      window.location.href = "Admin/Adminpage.php";
    }
  });
});

// login menu
$(document).on("click", "#Login", function() {
  $("#body").fadeOut("slow", function() {
    $("#body").load("AJAX/login.html #logindiv", function() {
      $("#body").fadeIn("slow");
    });
  });
});

//Logging in
$(document).on("click", "#login", function() {
  var usernaam = $("#username").val();
  var password = $("#password").val();

  $.post(
    "PHP/Login.php",
    {
      naam: usernaam,
      password: password
    },
    function(data) {
      if (data == "Logged in 0") {
        LoadMenu();
      } else if (data == "Logged in 1") {
        LoadTMenu();
      } else if (data == "Logged in 2") {
        window.location.href = "Admin/Adminpage.php";
      } else {
        alert(data);
      }
    }
  );
});

// logout
$(document).on("click", "#Logout", function() {
  $.post("PHP/logout.php", function(data) {
    window.location.reload(true);
  });
});

//create acc
$(document).on("click", "#Create", function() {
  $("#body").fadeOut("slow", function() {
    $("#body").load("AJAX/Regestratie.html #Register", function() {
      $("#body").fadeIn("slow");
    });
  });
});
//create an acount
$(document).on("click", "#registerbutton", function() {
  if ($("#Paswoord").val() == $("#Confirm").val()) {
    var naam = $("#Naam      ").val();
    var voornaam = $("#Voornaam  ").val();
    var email = $("#email     ").val();
    var Password = $("#Paswoord  ").val();
    var jaar = $("#jaar option:selected").val();
    $.post(
      "PHP/CreateAcc.php",
      {
        naam: naam,
        voornaam: voornaam,
        email: email,
        password: Password,
        jaar: jaar
      },
      function(data) {
        if (data == "Account Created") {
          alert(data);
          $("#body").fadeOut("slow", function() {
            $("#body").load("AJAX/login.html #logindiv", function() {
              $("#body").fadeIn("slow");
            });
          });
        } else {
          alert(data);
        }
      }
    );
  } else {
    alert("Wachtwoord is niet bevestigd");
  }
});

/*
  ############
  ##GameMenu##
  ############
*/
// Ajax form menu verwerken
function LoadMenu() {
  $("#body").fadeOut("slow", function() {
    $("#body").load("AJAX/selectform.html #Select", function() {
      $("#body").fadeIn("slow");
    });
  });
  $("#body").fadeOut(0, function() {
    $("#Acc").load("AJAX/Accountkader.php #AccountBox", function() {
      $("#Acc").fadeIn(0);
    });
  });
}

//Ajax en php Next button
$(document).on("click", "#Next", function() {
  $("#body").fadeOut("slow", function() {
    $("#body").load("AJAX/OefeningMenu.html #Menu", function() {
      $("#body").fadeIn("slow");
    });
  });
  var jaar = $("#jaar option:selected").val();
  var vorm = $("#vorm option:selected").val();
  var vak = $("#vak  option:selected").val();
  setTimeout(function() {
    $("div#buttons").fadeOut(1);

    $.post(
      "PHP/menuverwerken.php",
      {
        Jaar: jaar,
        Vorm: vorm,
        Vak: vak
      },
      function(data) {
        $("div#buttons").html(data);
        $("div#buttons").fadeIn();
      }
    );
  }, 1000);
});

// Ajax back button
$(document).on("click", "#Backbuttonmenu", function() {
  $("#body").load("AJAX/selectform.html #Select", function() {
    $("#body").fadeIn("slow");
  });
});

function loadGame(id, url) {
  localStorage.setItem("id", id);
  window.location.href = url;
}

/*
  ################
  ##Leerkrachten##
  ################
*/
function LoadTMenu() {
  $.post("PHP/Leerkrachten/TmenuVerwerken.php", {}, function(data) {
    var htmlkeder =
      '<div class="bodyBack" style="top:35%;" id="Select"> <div class="bodytext" style="margin-top: 20px; margin-bottom: 20px;">Jouw oefeningen <br>';
    htmlkeder += data;
    htmlkeder += "</div></div>";
    $("#body").fadeOut("slow", function() {
      $("#body").html(htmlkeder);
      $("#body").fadeIn("slow");
    });
    $("#Acc").fadeOut(0, function() {
      $("#Acc").load(
        "AJAX/Leerkrachten/AccountkaderLeerkracht.php #AccountBox",
        function() {
          $("#Acc").fadeIn(0);
        }
      );
    });
  });
}

$(document).on("click", "#Ttest", function() {
  $.post("PHP/Leerkrachten/TmenuVerwerken.php", {}, function(data) {
    $("#kader").html(data);
    $("#kader").fadeIn();
  });
});

function EditGame(id, name) {
  localStorage.setItem("id", id);
  localStorage.setItem("name", name);
  window.location.href = "Leerkracht/EditGame.php";
}

function ScoreGame(id) {
  localStorage.setItem("id", id);
  window.location.href = "Leerkracht/Scorepage.php";
}
