$(document).ready(function() {
  var GameID = localStorage.getItem("id");
  $.post(
    "../PHP/Leerkrachten/getScore.php",
    {
      id: GameID
    },
    function(data) {
      $('#fill').html(data);
    }
  );
});

$(document).on("click", "#Logout", function() {
  $.post("../PHP/logout.php", function(data) {
    alert(data);

    window.location.reload(true);
  });
});
