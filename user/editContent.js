$(document).ready(function(){
  $("#content-edit").click(function(){
    $("#content-edit").text("Save");
    $("#content-edit").click(function(){
      $("#content-edit").text("Edit");
      $("#content-head").attr("contenteditable","true");
      $("#content-text").attr("contenteditable","false");
    });
    $("#content-head").attr("contenteditable","true");
    $("#content-text").attr("contenteditable","true");

  });
});
