$(document).ready(function(){
  $("#submitCommentid").click(function(){
    var reply = $("#commentId").text();
    var id = $("#containID").text();
    var user = $("#containUser").text();
    $.post("../write/insertCommentReply.php",
    {
        input: "reply",
        data: reply,
        id: id,
        user: user
    },
    function(error1){
        alert("Error inserting reply: " + error1);
    });
});
});
