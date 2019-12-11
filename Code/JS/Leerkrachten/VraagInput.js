$(document).ready(function() {
  var Fouthtml = "<div>Fout</div>";
  var Juisthtml = "<div>Juist</div>";
  var vraaghtml = "<div>Vraag</div>";
  for (var i = 0; i < length; i++) {
    vraaghtml +=
      '<div><input style="width: 90%;" type="text"/ id="' + i + 'vraag"></div>';
    Juisthtml +=
      '<div><input style="width: 90%;" type="text"/ id="' + i + 'juist"></div>';
    Fouthtml +=
      '<div><input style="width: 90%;" type="text"/ id="' + i + 'fout"></div>';
  }
  $("#vraag").html(vraaghtml);
  $("#juist").html(Juisthtml);
  $("#fout").html(Fouthtml);
});

$('#fill').submit(function (){
  
});

$(document).on("click", "#Logout", function() {
  $.post("../PHP/logout.php", function(data) {
    alert(data);

    window.location.reload(true);
  });
});