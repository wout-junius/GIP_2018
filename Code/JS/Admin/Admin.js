$(function() {
  $.post("../PHP/SessionCheck.php", {}, function(data) {
    if (data != "Excist 2") {
      window.location.href = "../Home.php";
    }
  });
  $(document).ready(function() {});
  //Acc kader
  $("#Acc").load("AJAX/Accountkader.php #AccountBox", function() {
    $("#Acc").fadeIn(0);
  });

  $.post("../PHP/Admin/AdminGet.php", function(data) {
    $("#fill").html(data);
  });
});

function Rol(id, roll) {
  var sql =
    "UPDATE gebruiker SET UserRol = " + roll + " WHERE User_ID = " + id + ";";
  sendsql(sql);
}

function Reset(id) {
  //'wachtwoord' is resetted wachtwoord
  var sql =
    'UPDATE gebruiker SET Wachtwoord = "701f33b8d1366cde9cb3822256a62c01" WHERE User_ID = ' +
    id +
    ";";
  sendsql(sql);
}

function Active(id, status) {
  if (status == 1) {
    var sql = "UPDATE gebruiker SET Active = 0 WHERE User_ID = " + id + ";";
  } else {
    var sql = "UPDATE gebruiker SET Active = 1 WHERE User_ID = " + id + ";";
  }
  sendsql(sql);
}

function sendsql(sql) {
  $.post(
    "../PHP/Admin/AdminSend.php",
    {
      sql: sql
    },
    function(data) {
      if (data == true) {
        location.reload();
      } else {
        alert("Je laatste verandering is niet opgeslagen");
      }
    }
  );
}

$(document).on("click", "#Logout", function() {
  $.post("../PHP/logout.php", function(data) {
    alert(data);

    window.location.reload(true);
  });
});
